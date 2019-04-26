$(function() {
console.log("oui");
if((document.getElementById("connexion")) != null){
var buttonLoginElement = document.getElementById("connexion");
buttonLoginElement.addEventListener("click",loginElement);
}



function loginElement(){
    console.log("in");

    var login = document.getElementById("user");
    var pass  = document.getElementById("password");
    var alertElement = document.getElementById("alertLogin");
    var alertLabelElement = document.getElementById("alertLabelElement");
    if(login.value == "" || pass.value == ""){
        alertElement.style.display = "block";
        alertLabelElement.innerHTML = "Veuillez renseignez les champs ci-dessus";
        
        var loginElement = document.getElementById("login");
        loginElement.setAttribute("style","height:250px;");


        if(login.value == ""){
            login.style.border = "solid 1px red";

        }
        if(pass.value == ""){
            // pass vide donc mettre border red
            pass.style.border = "solid 1px red";
        } 
    }else{
        // appel ajax
        $.ajax({
    		type: "POST",
            url: "./controler/setConnexion.php",
            data: {
              login: login.value,
              pass : pass.value  
            },
            dataType: "json",
            success: function(json) {
                console.log(json);
                if(json.return == "true"){
                    sessionStorage.setItem("username",json.UserName);
                    sessionStorage.setItem("isAdmin", json.UserRole);
                    document.location.href="pages/evenement.php";
                }
                else if(json == "badRight")
                {
                    alertElement.style.display = "block";
                    alertLabelElement.innerHTML = "Vous n'avez les droits";
                    var loginElement = document.getElementById("login");
                    loginElement.setAttribute("style","height:250px;");
                }
                else{
                    alertElement.style.display = "block";
                    alertLabelElement.innerHTML = "Nom d'utilisateur ou mot de passe incorrect";
                    var loginElement = document.getElementById("login");
                    loginElement.setAttribute("style","height:250px;");
                }
            }
        
        });



    }

}

function closeAlert(){
    var login = document.getElementById("user");
    var pass  = document.getElementById("password");
    var alertElement = document.getElementById("alert");

    login.style.borderColor = "#ccc";
    pass.style.borderColor  = "#ccc";
    alertElement.style.display = "none";
    var loginElement = document.getElementById("login");
    loginElement.setAttribute("style","height:200px;");
}
});