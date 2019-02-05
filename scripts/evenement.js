$(function() {
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
                data: data,
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


});