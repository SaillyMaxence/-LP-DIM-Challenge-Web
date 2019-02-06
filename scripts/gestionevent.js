$(function() {
    var add = document.getElementById("addEvent");

    add.addEventListener("click",addNewEvent);

    function addNewEvent(){
        console.log("clique");
        var picture = document.getElementById("pictureToGet");
        var title   = document.getElementById("titreevent");
        var dateDeb = document.getElementById("datedeb");
        var dateFin = document.getElementById("datefin");
        var description = document.getElementById("description");

        console.log(dateDeb);
        var titleElement   =  title.value;
        var dateDebElement = dateDeb.value;
        var dateFinElement = dateFin.value;
        var descriptionElement = description.value;
    
        console.log(dateDebElement);
        if(titleElement == "" || dateDebElement == "" || dateFinElement == "" || descriptionElement == ""){
            if(titleElement == ""){

            }
            if(dateDebElement == ""){

            }
            if(dateFinElement == ""){

            }
            if(descriptionElement == ""){

            }
        }else{
            console.log(new Date());

            dateDebElement =  moment(dateDebElement).format('YYYY-MM-DD');
            dateFinElement =  moment(dateFinElement).format('YYYY-MM-DD');

//            var data = [titleElement,descriptionElement,dateDebElement,dateFinElement];

            $.ajax({
                type: "POST",
                data:{
                    title : titleElement,
                    message : descriptionElement,
                    start : dateDebElement,
                    end : dateFinElement
                },
                url: "../controler/addEvent.php",
                dataType: "json",
                success: function(data) {
        
                }
            }); 


        }



    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function (e) {
                $('#picture')
                    .attr('src', e.target.result);
            };
    
            reader.readAsDataURL(input.files[0]);
        }
    }

});