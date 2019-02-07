$(function () {
    $(function () {
        $("#slider1").responsiveSlides({
            maxwidth: 800,
            speed: 800
        });
    })

    $.ajax({
        type: "POST",
        url: "../controler/getEventActive.php",
        dataType: "json",
        success: function (data) {
            console.log(data);
        }

    });

});