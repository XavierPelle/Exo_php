<?php
if(isset($_POST['submit'])) {

    $file = "./src/datas/users.csv";
    $fichier = fopen($file, "r");
    
    while($ligne = fgetcsv($fichier)) {
        $pseudo = $ligne[0];
        $motdepasse_crypte = $ligne[1];
        
        if($pseudo == $_POST['pseudo'] && password_verify($_POST['motdepasse'], $motdepasse_crypte)) {
            $_SESSION['login'] = true;
            header("Location: index.php"); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 class="text-primary">Connexion</h1>
    <form method="POST">
        <label class="text-black" for="pseudo">Email :</label>
        <input type="text" name="pseudo" id="pseudo">
        
        <label class="text-black" for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse" id="motdepasse">

        <input type="submit" name="submit" value="Se connecter">
    </form>
</body>
</html>
