$(function () {
    $("#form").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
               url: "../controler/addEvent.php",
         type: "POST",
         data:  new FormData(this),
         contentType: false,
               cache: false,
         processData:false,
         success: function(data)
            {
           // view uploaded file.
           $("#preview").html(data).fadeIn();
           $("#form")[0].reset(); 
           var resetDescription = document.getElementById("description");
           resetDescription.innerHTML = 0;
           var picture = document.getElementById("picture");
           picture.setAttribute("src","http://placehold.it/180");
            }          
          });
       });
      

    });





