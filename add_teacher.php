<?php
require 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";

$user_registered=0;

$target_dir = "Teacher_Image/";
$target_file = "";
$uploadOk = 0;
$img_given=0;

if($_POST["add_member"])
{
  $t_name = $_POST["t_name"];
  $t_dob = $_POST["t_dob"];
  $t_enrol_no = $_POST["t_enrol_no"];
  $t_contact = $_POST["t_contact"];
  $t_email = $_POST["t_email"];
  $t_qualification = $_POST["t_qualification"];
  $t_address = $_POST["t_address"];
  $t_status = $_POST["t_status"];
  $t_password = strval(rand());
  $file_name = $_FILES["t_image"]["name"];

  if($file_name)
  {
    $img_given=1;
    $temp = $target_dir . basename($_FILES["t_image"]["name"]);
    $imageFileType = strtolower(pathinfo($temp, PATHINFO_EXTENSION));
    //echo $imageFileType."\n";
    $target_file = $target_dir . basename(str_replace(' ', '', $t_name)."_".$t_enrol_no.".".$imageFileType);
    //echo "Target file : ".$target_file."\n";
    $check = getimagesize($_FILES["t_image"]["tmp_name"]);
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
    if ($_FILES["t_image"]["size"] > 500000) 
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
      if (move_uploaded_file($_FILES["t_image"]["tmp_name"], $target_file))
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

    if($t_status=="CT")
    {
      $t_class = $_POST["t_class"];
      $t_section = $_POST["t_section"];
      if($img_given==0)
      {
        $sql = "INSERT INTO teacher (t_name, t_dob, t_enrol_no, t_contact, t_email, t_qualification, t_address, t_status, t_password, t_class, t_section, t_image)VALUES ('$t_name', '$t_dob', '$t_enrol_no', '$t_contact', '$t_email', '$t_qualification', '$t_address', '$t_status', '$t_password', '$t_class', '$t_section', 'false')";
      }
      else
      {
        $sql = "INSERT INTO teacher (t_name, t_dob, t_enrol_no, t_contact, t_email, t_qualification, t_address, t_status, t_password, t_class, t_section, t_image)VALUES ('$t_name', '$t_dob', '$t_enrol_no', '$t_contact', '$t_email', '$t_qualification', '$t_address',        '$t_status', '$t_password', '$t_class', '$t_section', 'true')";
      }
    }
    else
    {
      if($img_given==0)
      {
        $sql = "INSERT INTO teacher (t_name, t_dob, t_enrol_no, t_contact, t_email, t_qualification, t_address, t_status, t_password, t_image)VALUES ('$t_name', '$t_dob', '$t_enrol_no', '$t_contact', '$t_email', '$t_qualification', '$t_address', '$t_status', '$t_password', 'false')";
      }
      else
      {
        $sql = "INSERT INTO teacher (t_name, t_dob, t_enrol_no, t_contact, t_email, t_qualification, t_address, t_status, t_password, t_image)VALUES ('$t_name', '$t_dob', '$t_enrol_no', '$t_contact', '$t_email', '$t_qualification', '$t_address', '$t_status', '$t_password', 'true')";
      }
    }

    try 
    {
      $conn->exec($sql);
      $sql = "INSERT INTO users (username, password, status)VALUES ('$t_enrol_no', '$t_password', 'teacher')";
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

      $mail->addAddress($t_email, "Recepient Name");

      $mail->isHTML(true);

      $msg = "<b>Username : ".$t_enrol_no."</b><br><b>Password : ".$t_password."</b>";
      $mail->Subject = "Login Credientials";
      $mail->Body = $msg;

      if(!$mail->send()) 
      {
        echo "Mailer Error: " . $mail->ErrorInfo;
      } 
      else 
      {
        echo header("Location: http://localhost/SMS/teacher_details_show.php");
      }
    }
  }
}
?>