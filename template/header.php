<?php session_start() ?>
<header>
<nav>
    <ul class="list-unstyled d-flex justify-content-center gap-5 m-4">
        <li><a class="btn btn-danger" href="../index.php">Accueil</a></li>
        <li><a class="btn btn-danger" href="../index.php?page=qui">Qui somme nous ?</a></li>
        <li><a class="btn btn-danger" href="../index.php?page=membre">Membre</a></li>
        <?php if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) { ?>
        <li><a class="btn btn-warning" href="../index.php?page=connexion">Connexion</a></li>
        <?php } ?>
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
        <li><a class="btn btn-warning" href="../index.php?page=deconnecter">Déconnection</a></li>
        <?php } ?>
    </ul>
</nav>
</header>