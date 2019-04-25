$(function () {
    
    
    // -----------------------------------------------
	// Clique sur le bouton d'ajout d'un utilisateur
	// -----------------------------------------------
	$("body").on("click","#addUser",function(){
		var UserName = $('#username').val();
		ajoutUtilisateur(UserName);
	})
    
    
    // ---------------------------------
    // Fonction d'ajout d'un utilisateur
    // ---------------------------------
    
    function ajoutUtilisateur(UserName)
	{
		$.ajax({
			type : "POST",
			url: "../controler/addUser.php",
			datatype : "json",
			data : { 
					 user : UserName
					},
			success : function(data)
			{
                data = JSON.parse(data);
			    if(data == 0) 
			    // Si c'est un professeur
			    // ----------------------
			    { 
                    var alertElement = document.getElementById("alert");
                    alertElement.style.display = "block";
                    setTimeout(function(){
                        // location reload
                    },3000)
                }
                else if (data == 1) 
                // Si ce n'est pas un professeur
                // -----------------------------
                { 
                        $("#err").css("color", "red"); 
                        $("#err").text("Ce n'est pas un professeur !"); 
                } 
                else if (data == 2) 
                // Si l'utilisateur a déja été créé
                // --------------------------------
                { 
                    console.log("222222222222")
                        $("#err").css("color", "red");
                        $("#err").text("L'utilisateur a déjà été ajouté"); 
                }
			    
				// ----------------------------
				// Remise à null du champ texte
				// ----------------------------
				$('#username').val(null);

			}
		});
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