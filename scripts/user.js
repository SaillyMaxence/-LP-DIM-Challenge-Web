$(function () {
    console.log("in");
    getEvent();
    function getEvent() {
        $.ajax({
            type: "POST",
            url: "../controler/showUser.php",
            dataType: "json",
            success: function (data) {
                var dateLength = data.length;
                console.log(data);
                for (var i = 0; i < dateLength; i++) {
                    if (sessionStorage.getItem("isAdmin") == 0) {
                        data[i].buttonModif = '<i>';
                        data[i].buttonDelete = '<i>';
                    } else {
                        if (data[i].UserRole == 0) {
                            data[i].buttonModif = '<button  data-id="' + data[i].UserId + '" class="btn btn-primary giveRole">rendre administrateur</button>';
                            data[i].buttonDelete = '<button data-id="' + data[i].UserId + '" class="btn btn-primary delete">Supprimer</button>'
                        } else if (data[i].UserRole == 1 && data[i].UserName == sessionStorage.getItem("username")) {
                            data[i].buttonModif = '<i>';
                            data[i].buttonDelete = '<i>';
                        } else {
                            data[i].buttonModif = '<button  data-id="' + data[i].UserId + '" class="btn btn-primary removeRole">retirer administrateur</button>';
                            data[i].buttonDelete = '<button data-id="' + data[i].UserId + '" class="btn btn-primary delete">Supprimer</button>'
                        }
                    }
                }
                var dataList = data;
                console.log(dataList);
                var table = new Tabulator("#table", {
                    //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
                    data: dataList, //assign data to table
                    layout: "fitColumns", //fit columns to width of table (optional)
                    columns: [ //Define Table Columns
                        { title: "Id", field: "UserId", width: 15 },
                        { title: "Nom d'utilisateur", field: "UserName", },
                        { title: "Administrateur", field: "UserRole" },
                        { title: "", field: "buttonModif", formatter: "html" },
                        { title: "", field: "buttonDelete", formatter: "html" },
                    ],
                });
                

                var grantAdmin = document.getElementsByClassName("giveRole");
                for(var i=0;i<grantAdmin.length;i++){
                    grantAdmin[i].addEventListener("click",function(){
                        var id = this.getAttribute("data-id");
                        grantRole(id);
                    },{once:true});
                }
                var deleteElement = document.getElementsByClassName("delete");
                for(var i = 0 ; i<deleteElement.length;i++){
                    deleteElement[i].addEventListener("click",function(){
                        var id = this.getAttribute("data-id");
                        deleteUser(id);
                    },{once:true})
                }

                var removeRole = document.getElementsByClassName("removeRole");
                for(var i =0 ;i<removeRole.length;i++){
                    removeRole[i].addEventListener("click",function(){
                        var id = this.getAttribute("data-id");
                        removeAdmin(id)
                    },{once:true});
                }


            }



        });
    }


function grantRole(id){
    console.log(id);
}

function deleteUser(id){
    console.log(id);
}

function removeAdmin(id){
    console.log(id);
}




});