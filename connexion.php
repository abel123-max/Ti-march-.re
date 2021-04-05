<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <title>Connexion</title>
</head>
<body>
<div class="menu">
        <img  src="logo_Timarche.png" width="100px">
        <li> <a href="index.php">Acceuil</a></li>
        <li> <a>Nos producteur</a></li>
        <li> <a href="connexion.php">Connexion</a></li>
        <li> <a href="login.php">Inscription</a></li>
    </div>
    <div class="formulaire_login">
<form method="post">
<input type="text" name="adresse_mail_utilisateur"  placeholder="Adresse mail">

<input type="password" name="mot_de_passe_utilisateur"  placeholder="Mot de passe">

<input name="bouton_login_utilisateur" type="submit" value="Valider">
</form>
<?php 
if (isset($_POST['bouton_login_utilisateur']) & !empty($_POST["adresse_mail_utilisateur"]) & !empty($_POST["mot_de_passe_utilisateur"])) {
    $bdd = new PDO('mysql:host=localhost;dbname=id15062692_marche;charset=utf8', 'id15062692_abel', 'cr^$|x7<UsrkpkZ8', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM utilisateur WHERE  adresse_mail="' .$_POST["adresse_mail_utilisateur"] .'" ');
    while($donnees = $reponse->fetch()){
        $mdp= $donnees['pass'];
     
        }
        $verify= password_verify($_POST['mot_de_passe_utilisateur'], $mdp);
        if (!$verify) {
            echo 'mauvais mot de passe';
        }
        else {

            //Si le mot de passe correspond, crée une session et récupérer les données de l'utilisateur 
            //puis le rediriger vers la page d'espace membre
            if ($mdp) {
                session_start();
                $_SESSION['adresse_mail_utilisateur'] = $adresse_mail_utilisateur;
                
                header('location:index.php');
            } else {
                echo 'Mauvais identifiants ou mot de passe';
            }
        }
} ?>
    </div>
</body>
</html>
