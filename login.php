<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
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
        <p> Utilisateur <br> Inscrivez vous</p>

         <input type="text" name="nom_utilisateur" placeholder="Nom" required="required" >
   


            <input type="text" name="prenom_utilisateur" placeholder="Prenom" required="required" >
     

   
               <input type="email" name="adresse_mail_utilisateur"  placeholder="Adresse mail" required="required">
    
               <input type="text" name="adresse_utilisateur"  placeholder="Adresse" required="required">


                     <input type="password" name="mot_de_passe_utilisateur"  placeholder="Mot de passe" required="required">



                 <input type="password"name="confirmez_mot_de_passe_utilisateur"  placeholder="Confirmez mot de passe" required="required">
                 
<?php $erreur="";
 $bdd = new PDO('mysql:host=127.0.0.1;dbname=timarche;charset=utf8', 'admin', 'Simplon974*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       $reponse = $bdd->query('SELECT * FROM utilisateur');
       if (isset($_POST['nom_utilisateur'])
       && isset($_POST['prenom_utilisateur'])
       && isset($_POST['adresse_mail_utilisateur'])
       && isset($_POST['adresse_utilisateur'])
       && isset($_POST['mot_de_passe_utilisateur'])
       && isset($_POST['secteur_utilisateur'])
       && isset($_POST['siret'])
      
      
)
       {
           if ($_POST['mot_de_passe_utilisateur'] == $_POST['confirmez_mot_de_passe_utilisateur'] ){
            $mot_de_passe_crypte = password_hash($_POST['mot_de_passe_utilisateur'], PASSWORD_DEFAULT);
            $requete  = 'INSERT INTO `utilisateur` ( `nom`, `prenom`, `adresse_mail`, `adresse`, `pass`, `secteur` , `siret`) VALUES(
            "' . $_POST['nom_utilisateur'] . '",
            "' . $_POST['prenom_utilisateur'] .  '",
            "' . $_POST['adresse_mail_utilisateur']. '",
            "' . $_POST['adresse_utilisateur']. '",
            "' .$mot_de_passe_crypte  . '",
            "' . $_POST['secteur_utilisateur'] . '",
            "' . $_POST['siret'] . '"
            )';
            echo $requete;
            $resultat = $bdd->query($requete);
            
            session_start();
            $_SESSION['nom'] = $_POST['nom'];
            header('location:connexion.php');
           }
           else {

           $erreur = 'Reverifiez les mot de passe';
           echo $erreur;
          
        }
      
       }   ?>

                 <select name="secteur_utilisateur">
    <option selected="true" disabled="disabled">Selectionnez votre secteur</option>
<option value="nord">nord</option>
<option value="sud">sud</option>
<option value="est">est</option>
<option value="ouest">ouest</option>
     </select>
     
   <br>
     
   <input type="number" name="siret"  placeholder="Numero de siret">
    <input class="bouton_login_utilisateur" type="submit" value="Valider">

</div>   
    
    </form>

</body>
</html>