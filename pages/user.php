<?php require "../includes/header.php"?>
        <div class="grp1">
	        <div id="table"></div>
			<br>
        	<a href="gestionuser.php" id="newevent">Nouvel utilisateur</a>
	</div>

<!-- Modal -->        
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="myModal" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
      </div>
      <div class="modal-body" id="modalBody">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="dismiss">Annuler</button>
        <button type="button" class="btn btn-primary"   id="saveIt">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>        
<!-- Fin Modal -->   
<script src="../scripts/user.js"></script>
<?php require "../includes/footer.php" ?>