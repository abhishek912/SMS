<?php
require 'config.php';
include("dashboard_admin.php");
$id = $_GET["id"];
try {
    $stmt = $conn->prepare("SELECT *FROM student WHERE s_admin_no='$id'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $itr = $stmt->fetchAll();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

  <div class="form_container">
    <form method="POST" action="update_student.php" enctype="multipart/form-data">
      <div>
        <div class="heading">
          <label for="heading">Modify Student Details</label>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Student's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="name" name="s_name" value="<?php echo $itr[0]['s_name']?>" required>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="dob">Student's (DOB) *</label>
        </div>
        <div class="col">
          <input type="date" id="dob" name="s_dob" value="<?php echo $itr[0]['s_dob']?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Father's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="fname" name="s_fname" value="<?php echo $itr[0]['s_fname']?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Mother's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="mname" name="s_mname" value="<?php echo $itr[0]['s_mname']?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="enrol">Admission Number *</label>
        </div>
        <div class="col">
          <input type="text" id="admin" name="s_admin_no" value="<?php echo $itr[0]['s_admin_no']?>" style="background-color: #DCDCDC;" readonly>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="enrol">Student Status *</label>
        </div>
        <div class="col" style="width: 75%;">
          <input type="text" id="class" name="s_class" value="<?php echo $itr[0]['s_class']?>" required style="width: 100px;">
          <input type="text" id="section" name="s_section" value="<?php echo $itr[0]['s_section']?>" required style="width: 100px;">
          <input type="text" id="roll" name="s_roll" value="<?php echo $itr[0]['s_roll']?>" required style="width: 100px;">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="contact">Contact *</label>
        </div>
        <div class="col">
          <input type="text" id="contact" name="s_contact" value="<?php echo $itr[0]['s_contact']?>" required>
          <span class="error" id="contacterror"></span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="email">Email Address *</label>
        </div>
        <div class="col">
          <input type="text" id="email" name="s_email" value="<?php echo $itr[0]['s_email']?>" required>
          <span class="error" id="emailerror"></span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="address">Address *</label>
        </div>
        <div class="col">
          <textarea id="address" name="s_address" style="height:100px;"  required><?php echo $itr[0]['s_address']?></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="image">Photo</label>
        </div>
        <div class="col">
          <input type="file" id="image" name="s_image">
        </div>
        <div class="col" id="show_img">
        </div>
      </div>      

		<div class="row">
        	<div class="col" style="width: 210px">
        		<input type="submit" value="Update" name="update" id="update_student">
        	</div>
        	<div class="col" style="width: 200px">
        		<input type="submit" value="Cancel" name="cancel" id="cancel_update">
        	</div>
        	<div class="col" style="width: 200px">
        		<input type="submit" value="Remove" name="remove" id="remove_student">
        	</div>
      </div>
    </form>
  </div>
<?php
include("footer.php");
?>