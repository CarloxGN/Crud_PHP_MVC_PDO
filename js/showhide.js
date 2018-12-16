$(document).ready(function(){
  var divdisplay = false;
   $("#register").click(function(e){
      if (divdisplay == false){
         $("#formregister").css("display", "block");
         divdisplay = true;
      }else{
         $("#formregister").css("display", "none");
         divdisplay = false;
      }
   });

   $("#lostpass").click(function(e){
      if (divdisplay == false){
         $("#form_recover_pass").css("display", "block");
         divdisplay = true;
      }else{
         $("#form_recover_pass").css("display", "none");
         divdisplay = false;
      }
   });
});

