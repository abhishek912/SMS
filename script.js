$("document").ready(function(){
  $("#email").change(function(){
    var email=$("#email").val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          
    if(!regex.test(email))
    {
      $("#emailerror").append("Email Format Incorrect");
    }
    else
    {
      $("#emailerror").html("");
    }
  });	

  $("#contact").change(function(){
    var contact=$("#contact").val();
    var regex = /^([0-9])/;
    if(!regex.test(contact))
    {
      $("#contacterror").show().html("Contact should contain only digits(0-9)!!!");
    }
    else
    {
      if(contact.length!=10)
      {
        $("#contacterror").html("Contact should be of 10 digits!!!");
      }
      else
      {
      	$("#contacterror").html("");
      }
    }
  });
});






  //send form data using ajax failed...
  /*$('#add_teacher').click(function(){
    e.preventDefault();
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = $(this).serialize(); //Encode form elements for submission
  
    $.ajax({
      url : post_url,
      type: request_method,
      data : form_data
      }).done(function(response){ //
        alert("Teacher Added");
      //$("#server-results").html(response);
    });
    var name            = $("#name").val();
    var dob             = $("#dob").val();
    var enrol           = $("#enrol").val();
    var contact         = $("#contact").val();
    var email           = $("#email").val();
    var qualification   = $("#qualif").val();
    var address         = $("#address").val();
    var status          = $('input[name="t_status"]:checked').val();
    var cls="";
    var sec="";
    if(t_status=="CT"){
      cls = $("#t_class").val();
      sec = $("#t_section").val();
    }
    $.ajax({
          type: "POST",
          url: "/add_teacher.php",
          dataType: "json",
          data: {t_name:name, t_dob:dob, t_enrol_no:enrol, t_contact:contact, t_email:email, t_qualification:qualification, t_address:address,
                 t_status:status, t_class:cls, t_section:sec},
          success : function(data){
                    if(data.code == "200"){
                      alert("Success: " +data.msg);
                    }else{
                      $(".display-error").html("<ul>"+data.msg+"</ul>");
                      $(".display-error").css("display","block");
                    }
                  }
          });
    });*/