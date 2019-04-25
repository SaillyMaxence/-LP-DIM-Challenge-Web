<?php require "../includes/header.php"; ?>

        <div class="grp1">
        <form id="form" action="../addEvent.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="eventid">
            <input type="text" name="titreevent" id="titreevent" placeholder="Titre de l'évènement">
            <div class="zone-image">
                <img id="picture" src="http://placehold.it/180" alt="your image" />
                <input type='file' name="pic"id="pictureToGet" onchange="readURL(this);" />
                <input type="hidden" name="imgpresent" id="imgpresent" value="false">
            </div>
            <textarea class="content description" id="description" name="description"></textarea>
            <div class="lesdates">
            <span>Date début :</span><input type="date" name="datedeb" id="datedeb"><span>Date Fin :</span>
                <input type="date" name="datefin" id="datefin">
            </div>
            
        </div> <div class="grp2">
            <button id="addEvent" type="submit" class="submit"> Modifier </button>
        </div>
    </div>
    </form>
<?php require "../includes/footer.php" ?>