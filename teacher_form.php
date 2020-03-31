<!DOCTYPE html>
<html>
<head>
  <script src="jquery-3.4.1.slim.js"></script>
  <script src="script.js"></script>

  <script>
    $(document).ready(function(){
      $('input[name="t_status"]').change(function(){
        var container = $(document.createElement('div'));
        if(this.value == "CT")
        {
          $(container).append("<table><tr><td><label>Class</label></td><td> : </td><td><input type='text' name='t_class' id='t_class'></td></tr><tr><td><label>Section</label></td><td> : </td><td><input type='text' name='t_section' id='t_section'></td></tr></table>");
          $("#status").append($(container));
        }
        else if(this.value == "RT")
        {
          $("#status div").remove();
        }
      });
    });
  </script>
  <link rel="stylesheet" href="design.css">
</head>

<body>
  <div class="form_container">
    <form action="add_teacher.php" method="post" enctype="multipart/form-data">
      <div>
        <div class="heading">
          <label for="heading">Register Teacher</label>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="name">Teacher's Name *</label>
        </div>
        <div class="col">
          <input type="text" id="name" name="t_name" placeholder="Your name.." required>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <label for="dob">Teacher's (DOB) *</label>
        </div>
        <div class="col">
          <input type="date" id="dob" name="t_dob" placeholder="dd/mm/yyyy" required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="enrol">Enrol Number *</label>
        </div>
        <div class="col">
          <input type="text" id="enrol" name="t_enrol_no" placeholder="Enrol Number.." required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="contact">Contact *</label>
        </div>
        <div class="col">
          <input type="text" id="contact" name="t_contact" placeholder="Contact Number.." required>
          <span class="error" id="contacterror"></span>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="email">Email Address *</label>
        </div>
        <div class="col">
          <input type="text" id="email" name="t_email" placeholder="Email Address.." required>
          <span class="error" id="emailerror"></span>
        </div>
      </div>
  
      <div class="row">
        <div class="col">
          <label for="qualif">Qualification *</label>
        </div>
        <div class="col">
          <input type="text" id="qualif" name="t_qualification" placeholder="Teacher's Qualification.." required>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="address">Address *</label>
        </div>
        <div class="col">
          <textarea id="address" name="t_address" placeholder="Teacher's Address.." style="height:100px;" required></textarea>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <label for="status">Status *</label>
        </div>
        <div class="col" id="status">
          <label for="class_teacher">Class Teacher</label>
          <input type="radio" id="class_teacher" name="t_status" value="CT" required>
        </div>
        <div class="col">
          <label for="regular_teacher">Regular Teacher</label>
          <input type="radio" id="reg_teacher" name="t_status" value="RT" required>
        </div>
      </div>

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
        <input type="submit" value="Add Teacher" name="add_member" id="add_teacher">
      </div>
    </form>
  </div>
</body>
</html>
