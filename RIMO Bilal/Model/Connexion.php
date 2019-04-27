<?php

class Connexion{

	private static $_instance;

	/**
     * etablie une connection avec la base de données.
     * @return PDO
     */
    public static function getInstance(){
        
        if(is_null(self::$_instance)){
            try {
                self::$_instance = new PDO('mysql:host=localhost;dbname=PRDW','root','');
            } catch (Exception $ex) {
                //la ligne ci dessou transmet l'exception aux fonctions qui vont utiliser getIstance
                throw $ex;
            }
        }
        return self::$_instance;
    }
}

?>