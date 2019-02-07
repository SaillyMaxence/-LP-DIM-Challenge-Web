$(function () {
    getEvent();

    $("#form").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
               url: "../controler/updateEvent.php",
         type: "POST",
         data:  new FormData(this),
         contentType: false,
               cache: false,
         processData:false,
         success: function(data)
            {
                alert(data);
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

    function findGetParameter(parameterName) {
        var result = null,
            tmp = [];
        location.search
            .substr(1)
            .split("&")
            .forEach(function (item) {
              tmp = item.split("=");
              if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
            });
        return result;
    }

    function formatDate(date) {
        var dateN;
        console.log(date.length);
        if (date.length == 9) {
            if ((date.lastIndexOf("-")) - (date.indexOf("-")) < 3) {
                dateN = date.substr(0, 5).concat("0", date.substr(5, 8));
            }
            else {
                dateN = date.substr(0, 8).concat("0", date.substr(8, 8));
            }
        }
        if (date.length == 8) {
            var an = date.substr(0, 5);
            var mois = "0".concat(date.substr(5, 2));
            var jour = "0".concat(date.substr(7, 8));
            dateN = an.concat(mois, jour);
        }
        if(date.length==10){
            dateN=date;
        }
        return dateN;
    }

    function getEvent() {
        var datedeb;
        var datefin;
        $.ajax({
            type: "POST",
            data: {
                id : findGetParameter("id")
            },
            url: "../controler/getEventUpdate.php",
            dataType: "json",
            success: function (data) {
                $.each(data, function(i, item) {
                    $("#titreevent").val(item.EventTitre);
                    $(".richText-editor").text(item.EventMessage);
                    datedeb = item.EventDateDebut;
                    datedeb = datedeb.split(' ')[0];
                    $("#datedeb").val(formatDate(datedeb));
                    datefin = item.EventDateFin;
                    datefin = datefin.split(' ')[0];
                    $("#datefin").val(formatDate(datefin));
                    $("#eventid").val(item.EventId);
                    if(item.photo != '') {
                        $("#imgpresent").val("true");
                        $("#picture").attr("src", item.photo);
                    }
                });
            }
        });
    }
});