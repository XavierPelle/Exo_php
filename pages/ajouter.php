<form action="" method="post">
    <label class="text-black" for="newEmail">Entrez l'adresse e-mail :</label></br>
    <input type="email" name="newEmail" id="newEmail"></br></br>
    <label class="text-black" for="newMotDePasse">Entrez le mot de passe :</label></br>
    <input type="password" name="newMotDePasse" id="newMotDePasse"></br></br>
    <label class="text-black" for="newPrenom">Entrez le nom :</label></br>
    <input type="text" name="newPrenom" id="newPrenom"></br></br>
    <label class="text-black" for="newNom">Entrez le prénom :</label></br>
    <input type="text" name="newNom" id="newNom"></br></br>
    <input type="submit" value="Ajouter">
</form>

<?php

if (isset($_POST['newEmail']) && isset($_POST['newMotDePasse']) && isset($_POST['newPrenom']) && isset($_POST['newNom'])) {

    $newEmail = $_POST['newEmail'];
    $newMotDePasse = $_POST['newMotDePasse'];
    $newPrenom = $_POST['newPrenom'];
    $newNom = $_POST['newNom'];

    $hashedPassword = password_hash($newMotDePasse, PASSWORD_DEFAULT);

    $inputFile = './src/datas/users.csv';

    $newUser = [$newEmail, $hashedPassword, $newPrenom, $newNom];

    $isEmpty = filesize($inputFile) === 0;

    file_put_contents($inputFile, ($isEmpty ? "" : "\n") . implode(",", $newUser), FILE_APPEND);
}
