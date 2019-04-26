$(function() {

function loadData(){
    var myDataTable = document.getElementById("example-table");
    myDataTable.style.display="block";
    var updateMessageElement = document.getElementById("updateMessage");
    updateMessageElement.style.display="none";
    $.ajax({
        type: "POST",
        url: "../controler/showEvent.php",
        dataType: "json",
        success: function(data) {
        //    console.log(data);
            for(var i = 0;i<data.length ; i++){
                if(sessionStorage.getItem("isAdmin") == 0){
                    if(sessionStorage.getItem("username") == data[i].EventCreator){
                        data[i].buttonModif = '<button  data-id="'+ data[i].EventId+'" class="btn btn-secondary update">Modifier</button>';
                        data[i].buttonDelete = '<button data-id="'+ data[i].EventId+'" class="btn btn-danger delete">Supprimer</button>';
                    }else{
                        data[i].buttonModif = '<i>';
                        data[i].buttonDelete = '<i>';
                    }
                }else{
                    data[i].buttonModif = '<button  data-id="'+ data[i].EventId+'" class="btn btn-secondary update">Modifier</button>';
                    data[i].buttonDelete = '<button data-id="'+ data[i].EventId+'" class="btn btn-danger delete">Supprimer</button>';
                }
                
                
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
                    {title:"Priorité", field:"EventPriority"},
                    {title:"Visibilité",field:"EventVisibility"},
                    {title:"Créer par",field:"EventCreator"},
                    {title:"", field:"buttonModif", formatter:"html"},
                    {title:"", field:"buttonDelete",formatter:"html"}
                ],
           });
           
           var deleteElement = document.getElementsByClassName("delete");
           for(var j=0; j<deleteElement.length;j++){
               deleteElement[j].addEventListener("click",function(){
                   var id = this.getAttribute("data-id");

                   deleteMessage(id);
               },{once:true})
           }
           var updateElement = document.getElementsByClassName("update");
           console.log(updateElement);
           for(var k=0;k<data.length;k++){
               console.log(k);
               updateElement[k].addEventListener("click",function(){
                   var id = this.getAttribute("data-id");
                   console.log(id);
                   updateMessage(id);
               },{once:true})
           }
           
           
        }

    });
}
function deleteMessage(id){
    console.log(id);
    var exampleModalLabel = document.getElementById("exampleModalLabel").innerHTML = "Attention : ";
    var modalBodyElement = document.getElementById("modalBody").innerHTML = "Êtes-vous sur de vouloirs supprimer ?";
    $("#myModal").modal('show');
    
    var dismiss = document.getElementById("dismiss");
        dismiss.addEventListener("click",function(){
            $('#myModal').modal('hide');
            loadData();
        },{once:true})
        
    var saveElement = document.getElementById("saveIt");
    saveElement.addEventListener("click",function(){
        console.log(id);
         $.ajax({
        type: "POST",
        data:{id:id},
        url: "../controler/deleteEvent.php",
        dataType: "json",
        success: function(data) {
           $('#myModal').modal('hide');
           loadData();
        }
             
         });
    },{once:true})
    
    
}


function updateMessage(id){
    console.log("in");
    let titleElement = document.getElementById("titleEvent");
    let messageElement = document.getElementById("messageEvent");
    let dateStartElement = document.getElementById("dateStart");
    let dateEndElement = document.getElementById("dateEnd");
    let publicElement = document.getElementById("publicEvent");
    let priorityElement = document.getElementById("priorityEvent");
    
    $.ajax({
        type: "POST",
        data:{id:id},
        url: "../controler/getEventUpdate.php",
        dataType: "json",
        success: function(data) {
            console.log(data);
            var updateMessageElement = document.getElementById("updateMessage");
            updateMessageElement.style.display="block";
            var myDataTable = document.getElementById("example-table");
            myDataTable.style.display="none";
            
            titleElement.value = data[0].EventTitre;
            messageElement.innerHTML = data[0].EventMessage;
            publicElement.value = data[0].EventVisibility;
            priorityElement.value = data[0].EventPriority;
            dateStartElement.value = data[0].EventDateDebut;
            dateEndElement.value = data[0].EventDateFin
                
                }
                
            })
            
            $("#buttonForUpdate").on("click", function(e){
                var titleElementToUpdate = titleElement.value;
                var messageElementToUpdate = messageElement.value;
                var publicElementToUpdate = publicElement.value;
                var priorityElementToUpdate = priorityElement.value;
                var dateStartElementToUpdate = dateStartElement.value;
                var dateEndElementToUpdate = dateEndElement.value;
                
                $.ajax({
                    type: "POST",
                    data:
                    {
                    id:id,
                    title : titleElementToUpdate,
                    message : messageElementToUpdate,
                    startDate:dateStartElementToUpdate,
                    endDate:dateStartElementToUpdate,
                    public : publicElementToUpdate,
                    priority:priorityElementToUpdate,
                    },
                    url: "../controler/updateEvent.php",
                    dataType: "json",
                    success: function(data) {
                        loadData();
                        
                        
                    }
                });
            
            
        
    });
    
    
    
    
}
loadData();


});