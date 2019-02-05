$(function() {
    $.ajax({
        type: "POST",
        url: "../controler/showEvent.php",
        dataType: "json",
        success: function(json) {
            console.log(json);
        }
    
    });


});