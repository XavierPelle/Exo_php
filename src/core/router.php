<?php
$page = 'accueil.php';
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'membre':
            $page = "membre.php";
            break;
        case 'qui':
            $page = "qui.php";
            break;
        case 'connexion':
            $page = "connexion.php";
            break;
        case 'deconnecter':
            $page = "deconnecter.php";
            break;
        case 'supprimer':
            $page = "supprimer.php";
            break;
        case 'modifier':
            $page = "modifier.php";
            break;
        case 'ajouter':
            $page = "ajouter.php";
            break;
        default:
            break;
    }
}
include_once(dirname(__FILE__).'/../../pages/'.$page);