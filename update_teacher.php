<?php
require "config.php";

#$details_updated=0;
$sql="";

$t_name = $_POST["t_name"];
$t_dob = $_POST["t_dob"];
$t_enrol_no = $_POST["t_enrol_no"];
$t_contact = $_POST["t_contact"];
$t_email = $_POST["t_email"];
$t_qualification = $_POST["t_qualification"];
$t_address = $_POST["t_address"];
$t_status = $_POST["t_status"];

if($_POST["update"])
{
    if($t_status=="CT")
    {
      $t_class = $_POST["t_class"];
      $t_section = $_POST["t_section"];
      $sql = "UPDATE teacher SET t_name='$t_name', t_dob='$t_dob', t_contact='$t_contact', t_email='$t_email', t_qualification='$t_qualification', t_address='$t_address', t_status='$t_status',  t_class='$t_class', t_section='$t_section' WHERE t_enrol_no='$t_enrol_no'";
    }
    else
    {
      $sql = "UPDATE teacher SET t_name='$t_name', t_dob='$t_dob', t_contact='$t_contact', t_email='$t_email', t_qualification='$t_qualification', t_address='$t_address', t_status='$t_status', t_class=NULL, t_section=NULL WHERE t_enrol_no='$t_enrol_no'";
    }
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
    echo header("Location: http://localhost/SMS/teacher_details_show.php");
  }
  else if($_POST["cancel"])
  {
    echo header("Location: http://localhost/SMS/teacher_details_show.php");
  }
  else if($_POST["remove"])
  {
    $sql="UPDATE teacher SET t_active='false' WHERE t_enrol_no='$t_enrol_no'";
    $sql1="DELETE FROM users WHERE username='$t_enrol_no'";
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
    echo header("Location: http://localhost/SMS/teacher_details_show.php");
  }
?>