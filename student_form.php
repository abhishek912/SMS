<?php
include("dashboard_admin.php");
?>
  <div class="form_container">
    <form method="POST" action="add_student.php" enctype="multipart/form-data">
      <div>
        <div class="heading">
          <label for="heading">Register Student</label>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Student's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="name" name="s_name" placeholder="Your Name.." required>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="dob">Student's (DOB) *</label>
        </div>
        <div class="col">
          <input type="date" id="dob" name="s_dob" placeholder="dd/mm/yyyy" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Father's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="fname" name="s_fname" placeholder="Father's Name.." required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Mother's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="mname" name="s_mname" placeholder="Mother's name.." required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="enrol">Admission Number *</label>
        </div>
        <div class="col">
          <input type="text" id="admin" name="s_admin_no" placeholder="Admission Number.." required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="enrol">Student Status *</label>
        </div>
        <div class="col" style="width: 70%;">
          <input type="text" id="class" name="s_class" placeholder="Class.." required style="width: 30%;">
          <input type="text" id="section" name="s_section" placeholder="Section.." required style="width: 30%;">
          <input type="text" id="roll" name="s_roll" placeholder="Roll No.." required style="width: 30%;">
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="contact">Contact *</label>
        </div>
        <div class="col">
          <input type="text" id="contact" name="s_contact" placeholder="Contact Number.." required>
          <span class="error" id="contacterror"></span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="email">Email Address *</label>
        </div>
        <div class="col">
          <input type="text" id="email" name="s_email" placeholder="Email Address.." required>
          <span class="error" id="emailerror"></span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="address">Address *</label>
        </div>
        <div class="col">
          <textarea id="address" name="s_address" placeholder="Student's Address.." style="height:100px;" required></textarea>
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
        <input type="submit" value="Submit" name="add_member" id="add_member">
      </div>
    </form>
  </div>
  <?php
  include("footer.php");
  ?>