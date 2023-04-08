<?php
    include_once(dirname(__FILE__)."/../src/datas/user.php");
?>
 <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
<a class="btn btn-success m-2" href="../index.php?page=ajouter">Ajouter</a>
<a class="btn btn-primary m-2" href="./src/datas/users.csv" download="export.csv">Télécharger le fichier CSV</a>
<?php } ?>
<table class='table table-dark table-striped'>
    <thead>
        <th scope='col'>Nom</th>
        <th scope='col'>Prénom</th>
        <th scope='col'>Email</th>
        <th scope='col'>Editer</th>
    </thead>
    <?php
            foreach ($tab as $user) {
                ?>
                <tr>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['prénom'] ?></td>
                    <td><?= $user['nom'] ?></td>
                    <td>
                    <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
                    <a class="text-danger" href="../index.php?page=supprimer">Supprimer</a>
                    <a class="text-danger" href="../index.php?page=modifier">Modifier</a>
                    <?php } ?>
                    </td>
                </tr>
                <?php
            }
            ?>
</table>