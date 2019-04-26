$(function () {
    console.log("in");
    getUser();
    function getUser() {
        $.ajax({
            type: "POST",
            url: "../controler/showUser.php",
            dataType: "json",
            success: function (data) {
                var dateLength = data.length;
                console.log(data);
                if(sessionStorage.getItem("isAdmin") == 0){
                    var isAdmin =  document.getElementById("newevent")
                    isAdmin.style.display="none";
                }
                for (var i = 0; i < dateLength; i++) {
                    if (sessionStorage.getItem("isAdmin") == 0) {
                        data[i].buttonModif = '<i>';
                        data[i].buttonDelete = '<i>';
                    } else {
                        if (data[i].UserRole == 0) {
                            data[i].buttonModif = '<button  data-id="' + data[i].UserId + '" class="btn btn-success giveRole">rendre administrateur</button>';
                            data[i].buttonDelete = '<button data-id="' + data[i].UserId + '" class="btn btn-danger delete">Supprimer</button>'
                        } else if (data[i].UserRole == 1 && data[i].UserName == sessionStorage.getItem("username")) {
                            data[i].buttonModif = '<i>';
                            data[i].buttonDelete = '<i>';
                        } else {
                            data[i].buttonModif = '<button  data-id="' + data[i].UserId + '" class="btn btn-secondary removeRole">retirer administrateur</button>';
                            data[i].buttonDelete = '<button data-id="' + data[i].UserId + '" class="btn btn-danger delete">Supprimer</button>'
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
                for (var i = 0; i < grantAdmin.length; i++) {
                    grantAdmin[i].addEventListener("click", function () {
                        var id = this.getAttribute("data-id");
                        grantRole(id);
                    }, { once: true });
                }
                var deleteElement = document.getElementsByClassName("delete");
                for (var i = 0; i < deleteElement.length; i++) {
                    deleteElement[i].addEventListener("click", function () {
                        var id = this.getAttribute("data-id");
                        deleteUser(id);
                    }, { once: true })
                }

                var removeRole = document.getElementsByClassName("removeRole");
                for (var i = 0; i < removeRole.length; i++) {
                    removeRole[i].addEventListener("click", function () {
                        var id = this.getAttribute("data-id");
                        removeAdmin(id)
                    }, { once: true });
                }


            }



        });
    }


    function grantRole(id) {
        console.log(id);
        $.ajax({
            type: "POST",
            data:{id:id},
            url: "../controler/grantAdmin.php",
            dataType: "json",
            success: function (data) {
                getUser();
            }
        });



    }

    function deleteUser(id) {
        console.log(id);
        var exampleModalLabel = document.getElementById("exampleModalLabel").innerHTML = "Attention : ";
        var modalBodyElement = document.getElementById("modalBody").innerHTML = "Êtes-vous sur de vouloirs supprimer ?";
        $("#myModal").modal('show');
        
        var dismiss = document.getElementById("dismiss");
            dismiss.addEventListener("click",function(){
                $('#myModal').modal('hide');
                getUser();
            },{once:true})
            
        var saveElement = document.getElementById("saveIt");
        saveElement.addEventListener("click",function(){
            console.log(id);
             $.ajax({
            type: "POST",
            data:{id:id},
            url: "../controler/deleteUser.php",
            dataType: "json",
            success: function(data) {
               $('#myModal').modal('hide');
               getUser();
            }
                 
             });
        },{once:true})
        
        
    }

    function removeAdmin(id) {
        $.ajax({
            type: "POST",
            data:{id:id},
            url: "../controler/removeAdmin.php",
            dataType: "json",
            success: function (data) {
                getUser();
            }
        });

    }




});