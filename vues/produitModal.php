<div id="produitModal" class="modal fade" role="dialog">
    <input type="hidden" name="action" value="novalue" />
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class='value'></span> un produit:</h4>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" class="form-control" id="produitID" value="1">
                    
                    <div class="row">
                        <div class="form-group col-xs-6"> 
                            <label for="1">Nom: </label>
                            <input type="text" class="form-control" id="produitNom" placeholder="">
                            <br>
                            <label for="1">Catégorie: </label>
                            <input class="form-control" list="produitCategorie">
                            <datalist id="produitCategorie">
                                <option value="Categorie 1"></option>
                                <option value="Categorie 2"></option>
                                <option value="Categorie 3"></option>
                                <option value="Categorie 4"></option>
                                <option value="Categorie 5"></option>
                            </datalist>
                        </div>
                        
                        <div class="form-group col-xs-6"> 
                            <label for="1">Image: </label>
                            <textarea class="form-control" rows="6" id="produitImage" placeholder="*some image selection mechanism*"></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-xs-4"> 
                            <label for="1">Prix: </label>
                            <input type="text" class="form-control" id="produitPrix" placeholder="0.00">
                        </div>
                        <div class="form-group col-xs-4"> 
                            <label for="1">Rabais $: </label>
                            <input type="text" class="form-control" id="produitRabaisAbs" placeholder="0.00">
                        </div>
                        <div class="form-group col-xs-4"> 
                            <label for="1">Rabais %: </label>
                            <input type="text" class="form-control" id="produitRabaisPct" placeholder="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="1">Description: </label>
                        <textarea class="form-control" rows="3" id="produitDescription" placeholder="*this should be multilines*"></textarea>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left">Supprimer *product name*</button>
                <button type="button" class="btn btn-primary">Ajouter</button>
                <button type="button" class="btn btn-primary">Modifier</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>

    </div>
</div>

<script>
$('#produitModal').on('show.bs.modal', function(e) {
  var action = e.relatedTarget.dataset.action;
  console.log(action);
  $(".value").html(action);
});
</script>
