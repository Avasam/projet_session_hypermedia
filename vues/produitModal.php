<div id="produitModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span class="value"></span> un produit:</h4>
                </div>

                <div class="modal-body">
                     <div class="row">
                        <input type="hidden" name="action" id="action" value="novalue" />
                        <input type="hidden" class="form-control" name="produitID" id="produitID" value=0>

                        <div class="form-group col-xs-6"> 
                            <label for="produitNom">Nom: </label>
                            <input type="text" class="form-control" name="produitNom" id="produitNom" placeholder="" required>
                            <br>

                            <label for="produitCategorie">Catégorie: </label>
                            <input class="form-control" list="produitCategorieDatalist" name="produitCategorie" id="produitCategorie" required>
                            <datalist id="produitCategorieDatalist">
                            <?php
                            $listeCategories = ProduitDAO::findAllCategories();
                            while ($listeCategories->next()) {
                                $categorie = $listeCategories->current();
                                ?>
                                <option value="<?php echo $categorie ?>"></option>
                            <?php } ?>
                            </datalist>
                            <br>

                            <label for="produitPrix">Prix: </label>
                            <input type="number" step="0.01" class="form-control" name="produitPrix" id="produitPrix" placeholder="0.00" required>
                            <br>

                            <label for="produitRabaisAbs">Rabais $: </label>
                            <input type="number" step="0.01" class="form-control" name="produitRabaisAbs" id="produitRabaisAbs" placeholder="0.00" required>
                            <br>

                            <label for="produitRabaisPct">Rabais %: </label>
                            <input type="number" class="form-control" name="produitRabaisPct" id="produitRabaisPct" placeholder="0" required>
                        </div>

                        <!-- Image Uploader -->
                        <div class="form-group col-xs-6"> 
                            <label for="cheminImageUpload">Image: </label>
                            <div class="imageupload panel panel-default" id="cheminImageUpload">
                                <div class="panel-heading clearfix">
                                    <h3 class="panel-title pull-left">Télécharger de</h3>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-default active">Fichier</button>
                                        <button type="button" class="btn btn-default">URL</button>
                                    </div>
                                </div>
                                <div class="file-tab panel-body">
                                    <label class="btn btn-default btn-file">
                                        <span>Browse</span>
                                        <!-- The file is stored here. -->
                                        <input type="file" id="produitFichierImage">
                                    </label>
                                    <button type="button" class="btn btn-default">Remove</button>
                                </div>
                                <div class="url-tab panel-body">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Image URL">
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-default">Remove</button>
                                    <!-- The URL is stored here. -->
                                    <input type="hidden" name="produitCheminImage" id="produitCheminImage">
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-xs-12">
                            <label for="desription">Description: </label>
                            <textarea class="form-control" rows="3" name="produitDescription" id="produitDescription" placeholder="Description complète du produit." required></textarea>
                        </div>
                    </div> 
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger pull-left" id="btnSupprimer" onclick="document.getElementById('action').value='supprimerProduit'">Supprimer <span class="produit"></span></button>
                    <button type="submit" class="btn btn-primary" id="btnModifier" onclick="document.getElementById('action').value='modifierProduit';
                                                                                            if(document.getElementById('produitFichierImage').value){
                                                                                                document.getElementById('produitCheminImage').value=document.getElementById('produitFichierImage').value;
                                                                                            }">Modifier</button>
                    <button type="submit" class="btn btn-primary" id="btnAjouter" onclick="document.getElementById('action').value='ajouterProduit'">Ajouter</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
$('#produitModal').on('show.bs.modal', function(e) {
    var action = e.relatedTarget.dataset.action;
    var produit = e.relatedTarget.dataset.nom;
    console.log(action);
    console.log(produit);
    $(".value").html(action);
    $(".produit").html(produit);

    if (action==="Modifier") {
        document.getElementById("produitID").value = e.relatedTarget.dataset.noProduit;
        document.getElementById("produitNom").value = produit;
        document.getElementById("produitCategorie").value = e.relatedTarget.dataset.categorie;
        $('#cheminImageUpload').imageupload('reset');
        document.getElementById("produitPrix").value = e.relatedTarget.dataset.prix;
        document.getElementById("produitRabaisAbs").value = e.relatedTarget.dataset.rabaisAbs;
        document.getElementById("produitRabaisPct").value = e.relatedTarget.dataset.rabaisPct;
        document.getElementById("produitDescription").value = e.relatedTarget.dataset.description;
        document.getElementById("btnSupprimer").style.display = "initial";
        document.getElementById("btnModifier").style.display = "initial";
        document.getElementById("btnAjouter").style.display = "none";
    } else {
        document.getElementById("produitID").value = null;
        document.getElementById("produitNom").value = null;
        document.getElementById("produitCategorie").value = null;
        $('#cheminImageUpload').imageupload('reset');
        document.getElementById("produitPrix").value = null;
        document.getElementById("produitRabaisAbs").value = null;
        document.getElementById("produitRabaisPct").value = null;
        document.getElementById("produitDescription").value = null;
        document.getElementById("btnSupprimer").style.display = "none";
        document.getElementById("btnModifier").style.display = "none";
        document.getElementById("btnAjouter").style.display = "initial";
    }
});
</script>
