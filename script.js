$("document").ready(function(){
        $("#email").change(function(){
          var email=$("#email").val();
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          
          if(!regex.test(email))
          {
          	$("#s_emailerror").append("Email Format Incorrect");
          }
          else
          {
          	$("#s_emailerror").html("");
          	
          }
        });	

        $("#contact").change(function(){
          var contact=$("#contact").val();
          var regex = /^([0-9])/;
          if(!regex.test(contact))
          {
            $("#s_contacterror").hide().html("Contact should contain only digits(0-9)!!!");
          }
          else
          {
            if(contact.length!=10)
            {
              $("#s_contacterror").html("Contact should be of 10 digits!!!");
            }
            else
            {
            	$("#s_contacterror").html("");
            
            }
          }
        });
        var a=$(".dropdown");
        for(var i=0;i<a.length;i++)
        $(a[i]).on("click",function(){
          event.preventDefault();
          $(this).next().toggle("hidden");

          

        });







});