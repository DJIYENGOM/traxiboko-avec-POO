<?php
include_once("bd.php");
include_once("interface.php");

class User implements InterfaceUser{
    private $prenom;
    private $nom;
    private $email;
    private $password;
    private $password_con;
    
    public function __construct($prenom,$nom,$email,$password, $password_con){
          
        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setEmail($email);
        $this->setPassword($password, $password_con);

    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        if(!(preg_match("/[a-zA-Zéè]$/", $nom))  ){
            throw new Exception('nom  incorrecte') ;}else{
         $this->nom= $nom;
        }
    }

    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($prenom){
        if((!preg_match("/[a-zA-Zéè]$/", $prenom)) ){
            throw new Exception( 'prenom incorrecte');}else{
         $this->prenom=$prenom;}
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL) ) {
         $this->email= $email;}
    }
    
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password,$password_con){
        if (strlen($password) >= 5 && $password == $password_con) {
         $this->password=$password;
         $this->password_con=$password_con;}
    }

    public function inscrire(){
        global $conn;
        try{
            $sql= ('INSERT INTO `info`( `prenom`, `nom`, `email`, `mot_de_pass`) VALUES(?,?,?,?)');
            $statement=$conn->prepare($sql);
            $statement->execute(array($this->prenom,$this->nom,$this->email,$this->password));
            echo "compte creé" .'<br>';
       } catch (PDOException $e) {
            echo $e;
        }
    }


    public static function connexion($email, $password){
        global $conn;
        $query="SELECT * FROM info WHERE email= ? AND mot_de_pass= ?"; // requete pour chercher les données de la base de donnée
   $statement=$conn->prepare($query); // preparation de la requete
   $statement->execute([$email,$password]); // execution de la requete
   $total_row=$statement->rowCount(); // conter le nombre de donné dans la base de donnée
   if($total_row==1){
  
      header("Location:liste_user.php");
   }else{
       echo '<b> mot de passe </b> ou <b> Email </b> incorrecte';
   }
    }

    public static function consulterListeUser() {       
        global $conn;           
        $sql = "SELECT * FROM info";         
        $stmt = $conn->query($sql);         
        $utilisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);  //stocker tous les utilisateurs dans  la variable $utilisateurs sous forme de tableau associatif 
        return $utilisateurs;     }
}

?>