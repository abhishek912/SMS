<?php
require "config.php";

#$details_updated=0;
$sql="";

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

  if($_POST["update"])
  {
      $sql = "UPDATE student SET s_name='$s_name', s_dob='$s_dob', s_fname='$s_fname', s_mname='$s_mname', s_contact='$s_contact', s_email='$s_email', s_class='$s_class', s_section='$s_section', s_roll='$s_roll', s_address='$s_address' WHERE s_admin_no='$s_admin_no'";
    try 
    {
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      //echo $sql;
    }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }  
    $conn = null;
    echo header("Location: http://localhost/SMS/student_details_show.php");
  }
  else if($_POST["cancel"])
  {
    echo header("Location: http://localhost/SMS/student_details_show.php");
  }
  else if($_POST["remove"])
  {
    $sql="UPDATE student SET s_active='false' WHERE s_admin_no='$s_admin_no'";
    $sql1="DELETE FROM users WHERE username='$s_admin_no'";
    try 
    {
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $stmt = $conn->prepare($sql1);
      $stmt->execute();
    }
    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }  
    $conn = null;
    echo header("Location: http://localhost/SMS/student_details_show.php");
  }
?>