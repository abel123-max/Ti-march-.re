<?php
if (isset($_POST['modifier']) || isset($_POST['valider'])) {
    header('location:admin_producteur.php');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="admin_producteur.css">
</head>
<body>
<div class="container">
    <form class="formulaire"  method="post">
    <input name="agriculteur" type="text" placeholder="Agriculteur">
    <input name="produit" type="text" placeholder="Produit">
    <input name="miniature" type="text" placeholder="Image">
    <input name="prix" type="number" placeholder="Prix">

<select name="secteur">
<option selected="true" disabled="disabled">Secteur</option>
<option value="nord">nord</option>
<option value="sud">sud</option>
<option value="ouest">ouest</option>
<option value="est">est</option>
</select>


<select name="valeur">
<option selected="true" disabled="disabled">Unité</option>
<option value="kilo">KG</option>
<option value="botte">botte</option>
<option value="unité">unité</option>
<option value="peinte">peinte</option>
<option value="barquette">barquette</option>
<option value="paquet">paquet</option>
<select name="unité">

</select>

    <input name="modifier" type="submit" value="Mofifier">
    </form>
  </div>
</body>
<?php 
 $bdd = new PDO('mysql:host=localhost;dbname=id15062692_marche;charset=utf8', 'id15062692_abel', 'cr^$|x7<UsrkpkZ8', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if (isset($_POST['modifier'])) {
    

$requete = 'UPDATE producteur SET agriculteur="' . $_POST['agriculteur'] . '", produit="' . $_POST['produit'] . '",miniature="' . $_POST['miniature'] . '",prix="' . $_POST['prix'] . '",secteur="' . $_POST['secteur'] . '",valeur="' . $_POST['valeur'] . '" WHERE id="' . $_GET['id'] . '"';
echo $requete;
$resultat = $bdd->query($requete);
}
?>
</html>
