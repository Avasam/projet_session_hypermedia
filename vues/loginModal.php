<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-xs-6">
                    <a href="#" class="active" id="login-form-link">Se connecter</a>
                </div>
                <div class="col-xs-5">
                    <a href="#" id="register-form-link">S'enregistrer</a>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="panel-login panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Login Form -->
                            <form id="login-form" method="post" role="form" style="display: block;">
                                <input type="hidden" name="action" value="login">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Se connecter">
                                    </div>
                                </div>
                            </form>

                            <!-- Register Form -->
                            <form id="register-form" method="post" role="form" style="display: none;">
                                <input type="hidden" name="action" value="register">
                                <div class="form-group">
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Adresse Courriel">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Mot de passe">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmer Mot de passe">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="S'enregistrer">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>

<script>
$(function() {

    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });

});
//$('#produitModal').on('show.bs.modal', function(e) {
//    var action = e.relatedTarget.dataset.action;
//    var produit = e.relatedTarget.dataset.nom;
//    console.log(action);
//    console.log(produit);
//    $(".value").html(action);
//    $(".produit").html(produit);
//
//    if (action==="Modifier") {
//        document.getElementById("produitID").value = e.relatedTarget.dataset.noProduit;
//        document.getElementById("produitNom").value = produit;
//        document.getElementById("produitCategorie").value = e.relatedTarget.dataset.categorie;
//        $('#cheminImageUpload').imageupload('reset');
//        document.getElementById("produitPrix").value = e.relatedTarget.dataset.prix;
//        document.getElementById("produitRabaisAbs").value = e.relatedTarget.dataset.rabaisAbs;
//        document.getElementById("produitRabaisPct").value = e.relatedTarget.dataset.rabaisPct;
//        document.getElementById("produitDescription").value = e.relatedTarget.dataset.description;
//        document.getElementById("btnSupprimer").style.display = "initial";
//        document.getElementById("btnModifier").style.display = "initial";
//        document.getElementById("btnAjouter").style.display = "none";
//    } else {
//        document.getElementById("produitID").value = null;
//        document.getElementById("produitNom").value = null;
//        document.getElementById("produitCategorie").value = null;
//        $('#cheminImageUpload').imageupload('reset');
//        document.getElementById("produitPrix").value = null;
//        document.getElementById("produitRabaisAbs").value = null;
//        document.getElementById("produitRabaisPct").value = null;
//        document.getElementById("produitDescription").value = null;
//        document.getElementById("btnSupprimer").style.display = "none";
//        document.getElementById("btnModifier").style.display = "none";
//        document.getElementById("btnAjouter").style.display = "initial";
//    }
//});
</script>
