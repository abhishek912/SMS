<?php
include("dashboard_admin.php");
require 'config.php';
$id = $_GET["id"];
try {
    $stmt = $conn->prepare("SELECT *FROM teacher WHERE t_enrol_no='$id'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $itr = $stmt->fetchAll();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

  <script >
    var t_status=0;
    $(document).ready(function(){
      $('input[name="t_status"]').change(function(){
        if(this.value == "CT")
        {
          if(t_status==0)
          {
            var container = $(document.createElement('div'));
            $(container).append("<table><tr><td><label>Class</label></td><td> : </td><td><input type='text' name='t_class' id='t_class'></td></tr><tr><td><label>Section</label></td><td> : </td><td><input type='text' name='t_section' id='t_section'></td></tr></table>");
            $("#status").append($(container));
          }
          else
          {
            $("#status div").show();
          }
        }
        else if(this.value == "RT")
        {
          $("#status div").hide();
        }
      });
    });
  </script>
  

  <div class="form_container">
    <form action="update_teacher.php" method="post" enctype="multipart/form-data">
      <div>
        <div class="heading">
          <label for="heading">Modify Teacher Details</label>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Teacher's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="name" name="t_name" value="<?php echo $itr[0]['t_name']?>" required>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="dob">Teacher's (DOB) *</label>
        </div>
        <div class="col">
          <input type="date" id="dob" name="t_dob" value="<?php echo $itr[0]['t_dob']?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="enrol">Enrol Number *</label>
        </div>
        <div class="col">
          <input type="text" id="enrol" name="t_enrol_no" value="<?php echo $itr[0]['t_enrol_no']?>" style="background-color: #DCDCDC;" readonly>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="contact">Contact *</label>
        </div>
        <div class="col">
          <input type="text" id="contact" name="t_contact" value="<?php echo $itr[0]['t_contact']?>" required>
          <span class="error" id="contacterror"></span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="email">Email Address *</label>
        </div>
        <div class="col">
          <input type="text" id="email" name="t_email" value="<?php echo $itr[0]['t_email']?>" required>
          <span class="error" id="emailerror"></span>
        </div>
      </div>
  
      <div class="row">
        <div class="col">
          <label for="qualif">Qualification *</label>
        </div>
        <div class="col">
          <input type="text" id="qualif" name="t_qualification" value="<?php echo $itr[0]['t_qualification']?>" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="address">Address *</label>
        </div>
        <div class="col">
          <textarea id="address" name="t_address" style="height:100px;" required><?php echo $itr[0]['t_address']?></textarea>
        </div>
      </div>

      <?php 
      if($itr[0]['t_status']=='CT')
      {
      ?>  
      <script>t_status=1;</script>
      <div class="row">
        <div class="col">
          <label for="status">Status *</label>
        </div>
        <div class="col" id="status">
          <label for="class_teacher">Class Teacher</label>
          <input type="radio" id="class_teacher" name="t_status" value="CT" checked>
          <div>
            <table>
              <tr>
                <td><label>Class</label></td>
                <td> : </td>
                <td><input type='text' name='t_class' id='t_class' value="<?php echo $itr[0]['t_class']?>"></td>
              </tr>
              <tr>
                <td><label>Section</label></td>
                <td> : </td>
                <td><input type='text' name='t_section' id='t_section' value="<?php echo $itr[0]['t_section']?>"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col">
          <label for="regular_teacher">Regular Teacher</label>
          <input type="radio" id="reg_teacher" name="t_status" value="RT">
        </div>
      </div>
      <?php
        }
        else
        {
      ?>
        <div class="row">
          <div class="col">
            <label for="status">Status *</label>
          </div>
          <div class="col" id="status">
            <label for="class_teacher">Class Teacher</label>
            <input type="radio" id="class_teacher" name="t_status" value="CT">
          </div>
          <div class="col">
            <label for="regular_teacher">Regular Teacher</label>
            <input type="radio" id="reg_teacher" name="t_status" value="RT" checked="">
          </div>
        </div>
      <?php
        }
      ?>

      <div class="row">
        <div class="col">
          <label for="image">Photo</label>
        </div>
        <div class="col">
          <input type="file" id="image" name="t_image">
        </div>
        <div class="col" id="show_img">
        </div>
      </div>      
      <div class="row">
        <div class="col" style="width: 210px">
        <input type="submit" value="Update" name="update" id="update_teacher">
        </div>
        <div class="col" style="width: 200px">
        <input type="submit" value="Cancel" name="cancel" id="cancel_update">
        </div>
        <div class="col" style="width: 200px">
        <input type="submit" value="Remove" name="remove" id="remove_teacher">
        </div>
      </div>
    </form>
  </div>
<?php
include("footer.php");
?>