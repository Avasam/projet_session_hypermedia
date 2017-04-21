<div class="row carousel-holder">

    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                </div>
                <div class="item">
                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                </div>
                <div class="item">
                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                </div>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

</div>

<div class="row">
    <?php
//    $listeProduits = null;
//    if (ISSET($_SESSION['categorie']))
//        $listeProduits = $produitDAO.findByCategorie($_SESSION['categorie']);
//    else
//        $listeProduits = $produitDAO.findAll();
    for ($i = 1; $i <= 10; $i++) {
    ?>
    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src='images/orangetropicana.jpg' alt="">
            <div class="caption">
                <h4 class="pull-right">$74.99</h4>
                <h4><a href="#"><?php echo $i ?>th Product</a>
                </h4>
                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="ratings">
                <p class="pull-right">31 reviews</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </p>
            </div>
        </div>
    </div>
    <?php } ?>
</div>