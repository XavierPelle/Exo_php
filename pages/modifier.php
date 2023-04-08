<?php
if(!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: index.php?page=connexion"); 
}
?>
<form action="" method="post">
    <label class="text-black" for="UserToEdit">Sélectionnez l'utilisateur à éditer :</label></br>
    <select name="UserToEdit" id="UserToEdit">
        <?php
        $inputFile = './src/datas/users.csv';
        $file = fopen($inputFile, 'r');
        while (($line = fgetcsv($file, 0, ',')) !== false) {
            echo '<option value="' . $line[2] . '">' . $line[2] . '</option>';
        }
        fclose($file);
        ?>
    </select></br></br>
    <label class="text-black" for="newValueEmail">Entrez la nouvelle adresse e-mail :</label></br>
    <input type="email" name="newValueEmail" id="newValueEmail"></br></br>
    <label class="text-black" for="newValueName">Entrez le nouveau nom :</label></br>
    <input type="text" name="newValueName" id="newValueName"></br></br>
    <label class="text-black" for="newValueSurname">Entrez le nouveau prénom :</label></br>
    <input type="text" name="newValueSurname" id="newValueSurname"></br></br>
    <input type="submit" value="Editer"></br>
</form>

<?php

if (isset($_POST['UserToEdit'])) {

    $itemToEdit = $_POST['UserToEdit'];
    $newValueEmail = $_POST['newValueEmail'];
    $newValueName = $_POST['newValueName'];
    $newValueSurname = $_POST['newValueSurname'];

    $inputFile = './src/datas/users.csv';
    $outputFile = './src/datas/fichier_modifie.csv';

    $file = fopen($inputFile, 'r');
    $newFile = fopen($outputFile, 'w');
    
    while (($line = fgetcsv($file, 0, ',')) !== false) {
        if ($line[2] === $itemToEdit) {
            if (!empty($newValueEmail)) {
                $line[0] = $newValueEmail;
            }
            if (!empty($newValueName)) {
                $line[2] = $newValueName;
            }
            if (!empty($newValueSurname)) {
                $line[3] = $newValueSurname;
            }
        }
        fputcsv($newFile, $line, ',');
    }

    fclose($file);
    fclose($newFile);

    unlink($inputFile);
    rename($outputFile, $inputFile);
}
