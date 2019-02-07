$("#deconnexion").click(function(){
    $.post("../controler/deconnexion.php",
	  {
			deconnexion: "deco",
	  },
	  function(data, status){
            document.location.href="../index.php";
	    });
});