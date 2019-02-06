$(function() {
   
   getEvent();
   
   var supprimer = document.getElementById("supprimer");

   $("body").on("click","#supprimer", function(){
        deleteEvent(this.getAttribute("data-id"));
   });


function getEvent(){
    $.ajax({
        type: "POST",
        url: "../controler/showEvent.php",
        dataType: "json",
        success: function(data) {
            var dateLength =  data.length;

            for(var i = 0;i<dateLength ; i++){
                
                data[i].buttonModif = '<button id="modification" data-id="'+ data[i].EventId +'">Modification</button>';
                data[i].buttonDelete = '<button id="supprimer" data-id="'+ data[i].EventId +'">Supprimer</button>';

            }

            $('#datatable').DataTable( {
                responsive: true,
                data: data,
                columnsDefs: [
                    {"name": "EventId", "target":0},
                    {"name": "EventTitre", "target":1},
                    {"name": "EventMessage", "target":2},
                    {"name": "EventDateDebut", "target":3},
                    {"name": "EventDateFin", "target":4},
                    {"name": "EventIsActiv", "target":5},
                    {"name": "ButtonModif", "target":6},
                    {"name": "ButtonDelete", "target":7},

                ],
                columns: [
                    { data: 'EventId' },
                    { data: 'EventTitre' },
                    { data: 'EventMessage' },
                    { data: 'EventDateDebut'},
                    { data: 'EventDateFin'},
                    { data: 'EventIsActiv'},
                    { data: 'buttonModif'},
                    { data: 'buttonDelete'}
                ]
            } );

        }
    
    });
}

function deleteEvent(id){
    $.ajax({
        type: "POST",
        url: "../controler/deleteEvent.php",
        data:{id : id},
        dataType: "json",
        success: function(data) {
            $(this).parent().parent().remove();
            //getEvent();
        }
    });
}



});


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