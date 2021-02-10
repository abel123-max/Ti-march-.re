
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bzr</title>
</head>
<body>
    <form   method="post">
   <p>Pseudo</p> <input type="text" name="pseudo"><br>
   <p>Mot de passe</p><input type="text" name="pass"><br>
   <p>Retapez votre mot de passe</p> <input type="text" name="confirm_pass"><br>
   <p>Adresse mail</p> <input type="email" name="email"><br>
   <input name="valider" type="submit" value="Valider">
    
    </form>
    <?php 
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=bazar_de_lile;charset=utf8', 'admin', 'Simplon974*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM membres');
  if (isset($_POST['pseudo'])
  && isset($_POST['pass'])
  && isset($_POST['email'])
  ) {
    if ($_POST['pass'] == $_POST['confirm_pass']  ) {
      $mot_de_passe_crypte = password_hash($_POST['pass'], PASSWORD_DEFAULT);
      $requete ='INSERT INTO membres VALUES(NULL,
"' . $_POST['pseudo'] . '",
"' . $mot_de_passe_crypte . '",
"' . $_POST['email'] . '"
)';
$resultat = $bdd->query($requete);
session_start();
$_SESSION['pseudo'] = $_POST['pseudo'];
header('location:connextion.php');
    }

  }

    ?>
</body>
</html>