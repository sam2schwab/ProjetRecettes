<header>
    <h1 class="jumbotron text-center">Recettothèque</h1>
</header>
<nav class="navbar navbar-default">
    <div class="container container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li <?php echo ($page == 'index') ? "class='active'" : ""; ?>><a href="index.php">Accueil</a></li>
                <li <?php echo ($page == 'recherche') ? "class='active'" : ""; ?>><a href="recherche.php">Recherche</a></li>
                <li <?php echo ($page == 'menu') ? "class='active'" : ""; ?>><a href="menu.php">Menu</a></li> 
                <li <?php echo ($page == 'ajout') ? "class='active'" : ""; ?>><a href="ajout.php">Ajout</a></li> 
            </ul>
        </div>
    </div>
</nav>
