<?php require "../includes/header.php"; ?>

    <form class="form-inline">
        <div class="form-group mb-2">
            <label for="username">ID utilisateur LDAP</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div id="usercheck">
            <button class="btn btn-secondary mb-2" id="btncheck">Vérifier l'utilisateur</button>
        </div>
            <button type="submit" id="addUser" class="btn btn-primary mb-2">Ajout de l'utilisateur</button>
    </form>
    <div id="err"></div>
            <!--<div class="ajoutUser">
                <label for="username">ID utilisateur LDAP</label>
                <input type="text" name="username" id="username">
                <div id="usercheck">
                    <input type="button" id="btncheck" value="Vérifier l'utilisateur">
                    <div id="err"></div>
                </div>
            </div>
            <button id="addUser"> ajout </button> -->
            
       <?php require "../includes/footer.php"; ?>