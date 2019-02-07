$(function () {
    getEvent();

    var mod = document.getElementById("addEvent");

    mod.addEventListener("click", modEvent);

    function modEvent() {
        console.log("clique");
        var picture = document.getElementById("pictureToGet");
        var title = document.getElementById("titreevent");
        var dateDeb = document.getElementById("datedeb");
        var dateFin = document.getElementById("datefin");
        var description = document.getElementById("description");

        console.log(dateDeb);
        var titleElement = title.value;
        var dateDebElement = dateDeb.value;
        var dateFinElement = dateFin.value;
        var descriptionElement = description.value;

        console.log(dateDebElement);
        if (titleElement == "" || dateDebElement == "" || dateFinElement == "" || descriptionElement == "") {
            if (titleElement == "") {

            }
            if (dateDebElement == "") {

            }
            if (dateFinElement == "") {

            }
            if (descriptionElement == "") {

            }
        } else {
            console.log(new Date());

            dateDebElement = moment(dateDebElement).format('YYYY-MM-DD');
            dateFinElement = moment(dateFinElement).format('YYYY-MM-DD');

            //            var data = [titleElement,descriptionElement,dateDebElement,dateFinElement];

            $.ajax({
                type: "POST",
                data: {
                    id: findGetParameter("id"),
                    title: titleElement,
                    message: descriptionElement,
                    start: dateDebElement,
                    end: dateFinElement
                },
                url: "../controler/updateEvent.php",
                dataType: "json",
                success: function (data) {
                    window.location = "evenement.php";
                }
                error: function(data) {
                    window.location = "evenement.php";
                }
            });

        }
    }

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
                    datefin = datedeb.split(' ')[0];
                    $("#datefin").val(formatDate(datefin));
                });
            }
        });
    }
});