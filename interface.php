<?php
interface InterfaceUser{
    function inscrire();
    public static function connexion($email, $password);
    public static function consulterListeUser();

}
?>