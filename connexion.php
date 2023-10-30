<?php
include('user.php'); 

if(isset($_POST['connexion'])){
   $email=trim($_POST['email']); //trim permet de supprimer les espaces en debut et fin d'une chaine caractere
   $password=trim(md5($_POST['pasword']));

   user::connexion($email, $password);

   
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class='interface1'>

 <div class='form'>
    <form action="" method="post">
    <p><b><h2>Connexion</h2></b></p>
    <p>Votre chauffeur en un clic !</p>
    <button class='facbok' type="submit">Continuer avec Facebook</button><br>

           <div class="line">
                <div class="div1"></div>
                <span class="ou">ou</span>
                <div class="div2"></div>
            </div>

    <label for=""> Email</label>
    <input type="email" name="email" id=""><br>
    <label for=""> Mot de passe</label>
    <input type="password" name="pasword" id=""><br>
    <div>
    <button class='inscrit' type="submit" name="connexion">Connexion</button>
    </div>
    Avez vous un compte? <a href="inscription.php">s'inscrire</a>
    </form>
 </div>

</div>
</body>
</html>