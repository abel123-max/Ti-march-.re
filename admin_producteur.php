<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin_producteur.css">

</head>
<body>

<div class="container">
    <form class="formulaire"  method="post">
    <input name="nom_producteur" type="text" placeholder="Agriculteur">
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

    <input name="valider" type="submit" value="Valider">
    </form>
  </div>
<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=timarché;charset=utf8', 'admin', 'Simplon974*', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$reponse = $bdd->query('SELECT * FROM producteur');
if (isset($_POST['nom_producteur'])
&& isset($_POST['produit'])
&& isset($_POST['miniature'])
&& isset($_POST['prix'])
&& isset($_POST['secteur'])
&& isset($_POST['valeur'])
) {

$requete = 'INSERT INTO producteur VALUES(NULL,
"' . $_POST['nom_producteur'] . '",
"' . $_POST['produit'] . '",
"' . $_POST['miniature'] . '",
"' . $_POST['prix'] . '",
"' . $_POST['secteur']. '",
"' . $_POST['valeur']. '"

)';
   
$resultat = $bdd->query($requete);
}
echo '<div class="container_produit">';
while ($donnees = $reponse->fetch()) {
echo '<div class="produit">';    
echo  $donnees['agriculteur'] ;
echo "<br>\n";
echo  $donnees['produit'];
echo "<br>\n";
echo  $donnees['miniature'];
echo "<br>\n";
echo  $donnees['prix'];
echo "€";
echo "<br>\n";
echo  $donnees['secteur'];
echo "<br>\n";
echo  $donnees['valeur'];
echo "<form method='post'>";
echo '<input name="supprimer" type="submit" value="supprimer"';
echo "</form>";
echo '</div>';
echo "<br>\n";
echo "<a href=\"modifier_producteur.php?id=" .$donnees['id']. "\">Modifier</a>\n";
echo "<br>\n";

if (isset($_POST['supprimer'])) {
    $requete = 'DELETE FROM producteur WHERE id="' .$donnees['id'].'"'; 
    $resultat = $bdd->query($requete);
    }
}
echo'</div>';

?>


</body>
</html>