 

<?php
include('user.php'); 
 
$error=[]; 

if(isset($_POST['inscrire'])){
   $nom=htmlspecialchars($_POST['nom']);
   $prenom=htmlspecialchars($_POST['prenom']);
   $email=htmlspecialchars($_POST['email']);
   $password=htmlspecialchars(md5($_POST['password']));
   $password_con=htmlspecialchars(md5($_POST['password_con']));

   if(empty($nom)||empty($prenom)||empty($email)||empty($password)||empty($password_con)){
    $error[]="tous les champs sont obligatoires";
   }elseif(!(preg_match("/[a-zA-Zéè]$/", $_POST["nom"])) || (!preg_match("/[a-zA-Zéè]$/", $_POST["prenom"])) ){
     $error[]= 'nom ou prenom incorrecte';
    }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                
                if (strlen($password) >= 5 && $password == $password_con) {

                           $user1=new User($prenom,$nom,$email,$password, $password_con);
                           $user1->inscrire();
                            
                        }else{
                            $error[]= 'Mots de passes minimun 5 caracteres et doivent correspondre';}
                    }else{
                        $error[]= 'Email incorrect';}
        }
      


echo implode(". ",$error);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class=form>
    <form action="" method="post">
    <p><b><h2>Bienvenue</h2></b></p>
    <p>Fanalisez votre inscription en rempliçant les information manquantes </p><br>

    <div class='nom_pre'>
    <label for="">Prenom</label>
    <input type="text" name="prenom" id="" <?php if($error!=[]){?> value="<?php echo $prenom; }?>"><br>
    <label for="">Nom</label>
    <input type="text" name="nom" id="" <?php if($error!=[]){?> value="<?php echo $nom; }?>"><br>
    </div>
    <label for="">Email</label>
    <input type="email" name="email" id="" <?php if($error!=[]){?> value="<?php echo $email; }?>" ><br>
    <label for="">Mot de passe</label>
    <input type="password" name="password" id="" <?php if($error!=[]){?> value="<?php echo $password; }?>"><br>
    <label for="">confirmer le mot de passe</label>
    <input type="password" name="password_con" id="" <?php if($error!=[]){?> value="<?php echo $password_con; }?>"><br>

    <a href="">Ajoutez un code promo</a>
    <button class='inscrit' type="submit" name="inscrire">S'inscrire</button>
    </form>
 </div>
</body>
</html>