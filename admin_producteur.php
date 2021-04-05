<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin_producteur.css">

</head>
<body>
<div class="menu">
        <img  src="logo_Timarche.png" width="100px">
        <li> <a>Acceuil</a></li>
        <li> <a>Ajout de produit</a></li>
        <li> <a >Deconnexion</a></li>
    </div>

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
$bdd = new PDO('mysql:host=localhost;dbname= id15062692_marche;charset=utf8', ' id15062692_abel', 'cr^$|x7<UsrkpkZ8', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
echo "<br>\n";
echo '<a class="modifier" href="modifier_producteur.php?id=' .$donnees['id']. '">modifier</a> n';
echo "<br>\n";
echo '<a class="supprimer" href="supprimer_producteur.php?id=' .$donnees['id']. '">supprimer</a> ';
echo "<form method='post'>";
echo "</form>";
echo '</div>';
}

?>
</body>
</html>
