$(function() {
   
   getEvent();
   
    $("body").on("click","#supprimer", function(){
        deleteEvent(this.getAttribute("data-id"));
    });

    $("body").on("click", "#modification", function() {
        window.location = "updateevent.php?id=" + this.getAttribute("data-id");
    });


function getEvent(){
    $.ajax({
        type: "POST",
        url: "../controler/showEvent.php",
        dataType: "json",
        success: function(data) {
            var dateLength =  data.length;

            for(var i = 0;i<dateLength ; i++){
                
                data[i].buttonModif = '<button id="modification" data-id="'+ data[i].EventId +'">Modification <i class="fa fa-pencil"/></button>';
                data[i].buttonDelete = '<button id="supprimer" data-id="'+ data[i].EventId +'">Supprimer</button>';
                
            }
            var dataList = data;
            console.log(dataList);
            var table = new Tabulator("#example-table", {
                //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
                data:dataList, //assign data to table
                layout:"fitColumns", //fit columns to width of table (optional)
                columns:[ //Define Table Columns
                    {title:"Id", field:"EventId", width:15},
                    {title:"Titre", field:"EventTitre",},
                    {title:"Description", field:"EventMessage"},
                    {title:"Date de début", field:"EventDateDebut"},
                    {title:"Date de fin", field:"EventDateFin"},
                    {title:"Actif", field:"EventIsActiv"},
                    {title:"", field:"buttonModif", formatter:"html"},
                    {title:"", field:"buttonDelete",formatter:"html"},
                ],
           });



        
}



});
}

function deleteEvent(id){
    $.ajax({
        type: "POST",
        data:{id : id},
        url: "../controler/deleteEvent.php",
        dataType: "json",
        success: function(data) {
            getEvent();
            Location.reload();
        }
    });



}


});