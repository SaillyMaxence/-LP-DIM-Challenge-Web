$(function () {
    var add = document.getElementById("addUser");

    add.addEventListener("click", addNewUser);

    function addNewUser() {
        console.log("clique");
        var picture = document.getElementById("pictureToGet");
        var username = document.getElementById("username");

        var usernameElement = username.value;

        if (usernameElement == "") {

        } else {
            //            var data = [username];

            $.ajax({
                type: "POST",
                data: {
                    username: usernameElement
                },
                url: "../controler/addUser.php",
                dataType: "json",
                success: function (data) {

                }
            });

        }

    }
});