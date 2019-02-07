$(function () {
    $.ajax({
        type: "POST",
        url: "../controler/showRights.php",
        dataType: "json",
        success: function(data) {
            console.log(data);
            $.each(data, function(i, item) {
                $("#rights").append(
                    "<input type='checkbox' value=" + item.RightId + " name=" + item.RightType + ">",
                    "<label for=" + item.RightType + ">" + item.RightType + "</label><br>"
                );
            });
        }
    });

    var add = document.getElementById("addUser");

    add.addEventListener("click", addNewUser);

    function addNewUser() {
        console.log("clique");
        var picture = document.getElementById("pictureToGet");
        var username = document.getElementById("username");

        var usernameElement = username.value;

        if (usernameElement == "") {

        } else {
            $.ajax({
                type: "POST",
                data: {
                    username: usernameElement
                },
                url: "../controler/addUser.php",
                dataType: "json",
                success: function (data) {
                    if(data == 0) { // If it is a teacher
                        window.location = "user.php"; // Go to the users page
                    } else if (data == 1) { // If not
                        $("#err").css("color", "red"); // Set the error message's colour to red
                        $("#err").text("Ce n'est pas un professeur !"); // Message "Not a teacher"
                    } else if (data == 2) { // If it's already in the database
                        $("#err").css("color", "red"); // Red text
                        $("#err").text("L'utilisateur a déjà été ajouté"); // Message "Exists already"
                    }
                }
            });
        }
    }

    $("#btncheck").click(function() {
        // Récup de l'username
        var username = document.getElementById("username");
        var usernameElement = username.value;

        $.ajax({
            type: "POST",
            data: {
                username: usernameElement
            },
            url: "../controler/checkUser.php",
            dataType: "json",
            success: function(data) {
                if(data == 0) { // If it's a teacher
                    $("#err").css("color", "green"); // Green text
                    $("#err").text("Valide !"); // Message "VALID"
                } else if (data == 1) { // If not
                    $("#err").css("color", "red"); // Set the error message's colour to red
                    $("#err").text("Ce n'est pas un professeur !"); // Message "Not a teacher"
                } else if (data == 2) { // If it's already in the database
                    $("#err").css("color", "red"); // Red text
                    $("#err").text("L'utilisateur a déjà été ajouté"); // Message "Exists already"
                }
            }
        });
    });
});