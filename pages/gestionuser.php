<?php require "../includes/header.php"; ?>
<div id="err"></div>
<div class="alert alert-success" id="alert" style="display:none" role="alert">
  utilisateur bien inséré
</div>
<div class="ajoutUser">
    <label for="username">ID utilisateur LDAP</label>
    <input class="form-control" type="text" name="username" id="username">
    <div id="usercheck">
        <input type="button" id="btncheck" class="btn btn-primary" value="Vérifier l'utilisateur">
        <div id="err"></div>
    </div>
</div>
<button id="addUser" class="btn btn-primary"> ajout </button>
<script src="../scripts/gestionuser.js"></script>
<?php require "../includes/footer.php"; ?>