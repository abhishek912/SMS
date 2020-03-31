<?php
require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";

$user_registered=0;

$target_dir = "Student_Image/";
$target_file = "";
$uploadOk = 0;
$img_given=0;

if($_POST["add_member"])
{
  $s_name = $_POST["s_name"];
  $s_dob = $_POST["s_dob"];
  $s_fname = $_POST["s_fname"];
  $s_mname = $_POST["s_mname"];
  $s_admin_no = $_POST["s_admin_no"];
  $s_contact = $_POST["s_contact"];
  $s_email = $_POST["s_email"];
  $s_class = $_POST["s_class"];
  $s_section = $_POST["s_section"];
  $s_roll = $_POST["s_roll"];
  $s_address = $_POST["s_address"];
  $s_password = strval(rand());
  $file_name = $_FILES["s_image"]["name"];

  if($file_name)
  {
    $img_given=1;
    $temp = $target_dir . basename($_FILES["s_image"]["name"]);
    $imageFileType = strtolower(pathinfo($temp, PATHINFO_EXTENSION));
    //echo $imageFileType."\n";
    $target_file = $target_dir . basename(str_replace(' ', '', $s_name)."_".$s_admin_no.".".$imageFileType);
    //echo "Target file : ".$target_file."\n";
    $check = getimagesize($_FILES["s_image"]["tmp_name"]);
    if($check != false)
    {
      $uploadOk = 1;
    }
    else
    {
      echo "File is not an image.\n";
      $uploadOk = 0;
    }

    if (file_exists($target_file)) 
    {
      echo "File already exist.\n";
      $uploadOk = 0;
    }
    if ($_FILES["s_image"]["size"] > 500000) 
    {
      echo "Image file is too large.\n";
      $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
    {
      echo "Only JPG, JPEG, PNG files are allowed.";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) 
    {
      echo "Please select the correct file.\n";
    } 
    else 
    {
      if (move_uploaded_file($_FILES["s_image"]["tmp_name"], $target_file))
      {
        $uploadOk = 1;
      } 
      else 
      {
        echo "Sorry, there is an error uploading the image file.\n";
        $uploadOk = 0;
      }
    }
  }
  else
  {
    $uploadOk=1;
    $img_given=0;
  }

  //Image has been stored into the file system
  if($uploadOk==1)
  {
    $sql="";

    if($img_given==0)
    {
      $sql = "INSERT INTO student (s_name, s_dob, s_fname, s_mname, s_admin_no, s_contact, s_email, s_class, s_section, s_roll, s_address, s_password, s_image)VALUES ('$s_name', '$s_dob', '$s_fname', '$s_mname', '$s_admin_no', '$s_contact', '$s_email', '$s_class', '$s_section', '$s_roll', '$s_address', '$s_password',  'false')";
    }
    else
    {
      $sql = "INSERT INTO student (s_name, s_dob, s_fname, s_mname, s_admin_no, s_contact, s_email, s_class, s_section, s_roll, s_address, s_password, s_image)VALUES ('$s_name', '$s_dob', '$s_fname', '$s_mname', '$s_admin_no', '$s_contact', '$s_email', '$s_class', '$s_section', '$s_roll', '$s_address', '$s_password',  'true')";
    }

    try 
    {
      $conn->exec($sql);
      $sql = "INSERT INTO users (username, password, status)VALUES ('$s_admin_no', '$s_password', 'student')";
      $conn->exec($sql);
      $user_registered=1;
    }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }  
    $conn = null;

    if($user_registered==1)
    {
      //Email username and password
      $mail = new PHPMailer;
      $mail->SMTPDebug = 0;         
      $mail->isSMTP();                              
      $mail->Host = "smtp.gmail.com";
      $mail->SMTPAuth = true;                     
      $mail->Username = "mukeshkumarm6877302@gmail.com";                 
      $mail->Password = "9711495489";                  
      $mail->SMTPSecure = "tls";                     
      $mail->Port = 587;                                   

      $mail->From = "priyanka.mcs19.du@gmail.com";
      $mail->FromName = "Priyanka";

      $mail->addAddress($s_email, "Recepient Name");

      $mail->isHTML(true);

      $msg = "<b>Username : ".$s_admin_no."</b><br><b>Password : ".$s_password."</b>";
      $mail->Subject = "Login Credientials";
      $mail->Body = $msg;

      if(!$mail->send()) 
      {
        echo "Mailer Error: " . $mail->ErrorInfo;
      } 
      else 
      {
        echo header("Location: http://localhost/SMS/student_details_show.php");
      }
      
    }
  }
}
?>