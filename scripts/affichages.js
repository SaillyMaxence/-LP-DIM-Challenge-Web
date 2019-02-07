$(function () {
    $(function () {
        $("#slider1").responsiveSlides({
            maxwidth: 800,
            speed: 800
        });
    })

    $.ajax({
        type: "POST",
        url: "../controler/getEventActive.php",
        dataType: "json",

        success: function (data) {
            console.log(data);
            var ulElement = document.getElementById("slider1");
            for(var i=0; i<data.length ; i++){
                console.log("ici");
                var liElement = document.createElement("li");

                var divElement = document.createElement("div");
                divElement.setAttribute("class","ecran");

                var titreElement = document.createElement("h1");
                titreElement.innerHTML = data[i].EventTitre;

                var divAnnonce = document.createElement("div");
                divAnnonce.setAttribute("class","annonce");
                
                var divPhotoElement = document.createElement("div");
                divPhotoElement.setAttribute("class","photo");

                var photoElement = document.createElement("img");
                if (data[i].photo == "" || data[i].photo == null){
                photoElement.src = "../src/image/iut_logo.png"
                }
                else{
                    photoElement.src = data[i].photo
                }
                var descriptionElement = document.createElement("div");
                descriptionElement.setAttribute("class","description");
                descriptionElement.innerHTML = data[i].EventMessage;

                
                divElement.appendChild(titreElement);
                divElement.appendChild(divAnnonce);
                divAnnonce.appendChild(divPhotoElement);
                divPhotoElement.appendChild(photoElement);
                divAnnonce.appendChild(descriptionElement);
                liElement.appendChild(divElement);
                ulElement.appendChild(liElement);


            }
            
        
        
        
            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 800,
                speed: 800
            });
        
        
        
        }

    });

});