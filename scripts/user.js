$(function() {
   
   getEvent();
   
   $("body").on("click","#supprimer", function(){
        deleteEvent(this.getAttribute("data-id"));
   });


function getEvent(){
    $.ajax({
        type: "POST",
        url: "../controler/showUser.php",
        dataType: "json",
        success: function(data) {
            var dateLength =  data.length;

            for(var i = 0;i<dateLength ; i++){
                
                data[i].buttonModif = '<button id="modification" data-id="'+ data[i].UserId +'">Modification <i class="fa fa-pencil    "/></button>';
                data[i].buttonDelete = '<button id="supprimer" data-id="'+ data[i].UserId +'">Supprimer</button>';
                
            }
            var dataList = data;
            console.log(dataList);
            var table = new Tabulator("#example-table", {
                //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
                data:dataList, //assign data to table
                layout:"fitColumns", //fit columns to width of table (optional)
                columns:[ //Define Table Columns
                    {title:"Id", field:"UserId", width:15},
                    {title:"Nom d'utilisateur", field:"UserName",},
                    {title:"Photo de profil", field:"UserProfilePicture"},
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
        url: "../controler/deleteUser.php",
        dataType: "json",
        success: function(data) {
            getEvent();
            Location.reload();
        }
    });



}


});