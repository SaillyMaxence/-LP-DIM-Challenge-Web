$(function() {



    $(".form_datetime").datetimepicker({ format: 'dd-mm-yyyy hh:ii' });
    
    if(document.getElementById("addMessage") != null){
    var addMessage = document.getElementById("addMessage");

    addMessage.addEventListener("click", function() {
        insertMessage();
    });
    
    }
function insertMessage(){
        let titleElement = document.getElementById("titleEvent");
        let messageElement = document.getElementById("messageEvent");
        let dateStartElement = document.getElementById("dateStart");
        let dateEndElement = document.getElementById("dateEnd");
        let publicElement = document.getElementById("publicEvent");
        let priorityElement = document.getElementById("priorityEvent");
        let alertElement = document.getElementById("alert");
        let alertMessageElement = document.getElementById("messageAlert");


        if (titleElement.value == "" || messageElement == "" || dateStartElement.value == "" || dateEndElement == "" ){
            alertMessageElement.innerHTML = "Veuillez renseigner le(s) élément(s) obligatoire(s)"
            alertElement.style.display = "block";
            if (titleElement.value == '') {
                titleElement.style.borderColor = 'red';

                titleElement.addEventListener("click", function() {
                    titleElement.style.borderColor = '#ced4da';
                    alertElement.style.display = "none";
                }, { once: true })
            }
            if (messageElement.value == '') {
                messageElement.style.borderColor = 'red';
                messageElement.addEventListener("click", function() {
                    messageElement.style.borderColor = '#ced4da';
                    alertElement.style.display = "none";
                }, { once: true })
            }
            if (dateStartElement.value == '') {
                dateStartElement.style.borderColor = 'red';
                dateStartElement.addEventListener("click", function() {
                    dateStartElement.style.borderColor = '#ced4da';
                    alertElement.style.display = "none";
                }, { once: true })
            }
            if (dateEndElement.value == '') {
                dateEndElement.style.borderColor = 'red';
                dateEndElement.addEventListener("click", function() {
                    dateEndElement.style.borderColor = '#ced4da';
                    alertElement.style.display = "none";
                }, { once: true })
            }


        }
        else {
            if (dateEndElement.value < dateStartElement.value) {
                alertMessageElement.innerHTML = "Veuillez renseigner des dates correctes"
                alertElement.style.display = "block";

                dateStartElement.style.borderColor = 'red';
                dateStartElement.addEventListener("click", function() {
                    dateStartElement.style.borderColor = '#ced4da';
                    alertElement.style.display = "none";
                }, { once: true })

                dateEndElement.style.borderColor = 'red';
                dateEndElement.addEventListener("click", function() {
                    dateEndElement.style.borderColor = '#ced4da';
                    alertElement.style.display = "none";
                }, { once: true })
            }
            else {

                $.ajax({
                    type: "POST",
                    data: {
                        title: titleElement.value,
                        message: messageElement.value,
                        startDate: dateStartElement.value,
                        endDate: dateEndElement.value,
                        public: publicElement.value,
                        priority: priorityElement.value
                    },
                    url: "../controler/addEvent.php",
                    dataType: "json",
                    success: function(data) {
                        if (data == "true") {
                            alertElement.classList.remove("alert","alert-danger");
                            alertElement.classList.add("alert","alert-success");
                            alertMessageElement.innerHTML ="Message bien inseré";
                            alertElement.style.display ="block";
                            
                            setTimeout(function(){ document.location.href="evenement.php" }, 3000);
                            
                        }
                    }
                });
            }
        }


}
})

