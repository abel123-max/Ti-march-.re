
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="text" name="pseudo" placeholder="pseudo">
   
    <input type="text" name="pass" placeholder="pass">
    <input name="valider" type="submit" value="Valider">
</form>
    <?php  
 if (isset($_POST['valider']) & !empty($_POST['pseudo']) & !empty($_POST['pass'])
){

     $bdd = new PDO('mysql:host=127.0.0.1;dbname=bazar_de_lile;charset=utf8', 'admin', 'Simplon974*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT * FROM membres WHERE pseudo ="' . $_POST['pseudo'] . '"');
while($donnees = $reponse->fetch()){
$mdp= $donnees['pass'];
$pseudo= $donnees['pseudo'];
}
$verify= password_verify($_POST['pass'], $mdp);
if (!$verify) {
    echo 'mauvais mot de passe';
}
else {

    //Si le mot de passe correspond, crée une session et récupérer les données de l'utilisateur 
    //puis le rediriger vers la page d'espace membre
    if ($mdp) {
        session_start();
        $_SESSION['pseudo'] = $pseudo;
        
        header('location:index.php');
    } else {
        echo 'Mauvais identifiants ou mot de passe';
    }
}
 }
 

?>
</body>
</html>
