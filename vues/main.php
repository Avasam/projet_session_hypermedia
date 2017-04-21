<!-- Navigation -->
<?php include_once('/vues/navbar.php'); ?>

<!-- Page Content -->
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <?php include_once('/vues/categories.php'); ?>
        </div>

        <div class="col-md-9">
            <?php 
            if (ISSET($_REQUEST["produit"])) {
               include_once('/vues/produit.php');
            } else {
               include_once('/vues/listeProduits.php');
            }
            ?>
        </div>
        
    </div>
</div>
<!-- /.container -->

<?php include_once('/vues/footer.php'); ?>
