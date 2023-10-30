<?php
include("user.php");
$listeUtilisateurs =  user::consulterListeUser();

foreach ($listeUtilisateurs as $utilisateur) {
    echo "Prénom : " . $utilisateur['prenom'] . "<br>";
    echo "Nom : " . $utilisateur['nom'] . "<br><br>";

}
?>