<?php
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php?page=connexion"); 
}
?>
<form action="" method="post">
    <label class="text-danger" for="UsersToDelete">Sélectionnez l'utilisateur à supprimer :</label>
    <select name="UsersToDelete" id="UsersToDelete">
        <?php
        $inputFile = './src/datas/users.csv';
        $file = fopen($inputFile, 'r');
        while (($line = fgetcsv($file, 0, ',')) !== false) {
            echo '<option value="' . $line[2] . '">' . $line[2] . '</option>';
        }
        fclose($file);
        ?>
    </select>
    <input type="submit" value="Supprimer">
</form>

<?php
if (isset($_POST['UsersToDelete'])) {
    $usersToDelete = $_POST['UsersToDelete'];
    $inputFile = './src/datas/users.csv';
    $outputFile = './src/datas/fichier_modifie.csv';

    $file = fopen($inputFile, 'r');
    $newFile = fopen($outputFile, 'w');

    while (($line = fgetcsv($file, 0, ',')) !== false) {
        if ($line[2] !== $usersToDelete) {
            fputcsv($newFile, $line, ',');
        }
    }

    fclose($file);
    fclose($newFile);

    unlink($inputFile);
    rename($outputFile, $inputFile);
}
