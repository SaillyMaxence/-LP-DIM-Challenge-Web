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