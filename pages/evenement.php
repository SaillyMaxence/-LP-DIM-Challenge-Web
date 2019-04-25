<?php require "../includes/header.php";?>
<div></div>
<div id="example-table" style="display:none;"></div>
<br>
<a href="gestionevent.php" id="newevent">Nouvel événement</a>
           


<!-- div pour update message -->

<div id="updateMessage" style="display:none;">
  <div class="col-md12 text-center">
      <h2>Mettre à jour le message</h2>
      <div class="">
         <div class="col-md-8 d-inline-block">
            <div id="alert" class="alert alert-danger" style="display:none" role="alert">
              <span id="messageAlert"></span>
            </div>
         
      </div>
      
         <div class="col-md-8 d-inline-block">
            <div class="form-group">
               <label for="titleEvent"> Titre du message * </label>
               <input id="titleEvent"class="form-control" type="text" name="titleEvent" placeholder=""/>
            </div>
         
      </div>
      
         <div class="col-md-8 d-inline">
            <div class="form-group">
               <label for="messageEvent">Description du message * </label>
               <textarea style="width: 62%;
    margin: auto;
    margin-bottom: 1rem;" class="form-control" rows="5" name="messageEvent" id="messageEvent" ></textarea>
            </div>
         
      </div>
     
         <div class="col-md-3 d-inline-block">
            <div class="form-group">
               <label for="">Date de début * </label>
               <input type="text" id="dateStart"  class="form_datetime form-control" >
            </div>
         </div>
          <div class="col-md-3 d-inline-block">
            <div class="form-group">
               <label for="">Date de fin * </label>
               <input type="text"  id="dateEnd" class="form_datetime form-control" >
            </div>
         
      </div>
      
         <div class="col-md-8 d-inline-block">
            <div class="form-group">
               <label for="publicEvent">Public visé</label>
               <select id="publicEvent" name="publicEvent" class="form-control">
                  <option value="0">Tous les départements</option>
                  <option value="1">Informatique</option>
                  <option value="2">GEII</option>
                  <option value="3">GEA</option>
               </select>
            </div>
         </div>
      
      
         <div class="col-md-8 d-inline-block">
            <div class="form-group">
               <label for="priorityEvent">Priorité du message</label>
               <select id="priorityEvent" name="priorityEvent" class="form-control">
                  <option value="0">Normal</option>
                  <option value="1">Moyenne</option>
                  <option value="2">Urgent</option>
               </select>
            </div>
         </div>
      
      
         <div class="col-md-8 d-inline-block">
            <button id="buttonForUpdate" class="btn btn-primary"> Mettre à jour</button>
         </div>
      </div>
   </div>
</div>
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
   

<?php require "../includes/footer.php" ?>