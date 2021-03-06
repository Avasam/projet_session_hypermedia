<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Marché Simplet</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="?action=about">À propos</a>
                </li>
                <li>
                    <a href="https://github.com/Avasam">Mon Github</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (ISSET($_SESSION["connected"])) {
                    echo "<li><a href='?action=profil'>".$_SESSION["connected"]["username"]."</a></li>";
                    echo "<li><a href='?action=logout'>Déconnexion</a></li>";
                } else {
                    echo "<li><a href='#'><span data-toggle='modal' data-target='#loginModal'>Connexion/S'enregistrer</span></a></li>";
                } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
