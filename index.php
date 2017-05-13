<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Imageupload CSS -->
    <link href="css/bootstrap-imageupload.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/produits.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
if (!ISSET($_SESSION)) {
    session_start();
    $_SESSION["categorie"] = "Tout";
}

include_once('/controleurs/ActionBuilder.class.php');
if (ISSET($_REQUEST["action"])) {
    $vue = ActionBuilder::getAction($_REQUEST["action"])->execute();
} else {
    $vue = ActionBuilder::getAction("")->execute();
}
?>

<body>
     <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Bootstrap Imageupload JavaScript -->
    <script src="js/bootstrap-imageupload.js"></script>

    <?php
    //<!-- PHP Classes -->
    include_once('/classes/ProduitDAO.class.php');
    //<!-- Vues -->
    include_once('/vues/navbar.php'); // Navigation
    include_once('/vues/'.$vue.'.php'); // Vue Principale
    include_once('/vues/footer.php'); // Footer
    //<!-- Modals -->
    include_once('/vues/produitModal.php');
    ?>

</body>

</html>
