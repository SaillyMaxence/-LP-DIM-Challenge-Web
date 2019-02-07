$("#deconnexion").click(function(){
    $.post("../controler/deconnexion.php",
	  {
			message: "deco",
	  },
	  function(data, status){
            document.location.href="../index.php";
	    });
});