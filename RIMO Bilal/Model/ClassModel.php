<?php
/*
	pour eviter la duplication des codes ci dessous, j'ai crée cette classe static 
	à la quelle accederon certain model pour recuperer des informations
*/
class  ClassModel
{
	private static $_query = "select * from billet";
	private static $_query1 = "select * from categorie";


	public static function getAllBillets(){
		try {
			$bdd = Connexion::getInstance();
			$reponse = $bdd->query(self::$_query);
			return $reponse;
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function getAllCategories(){

		try {
			$bdd = Connexion::getInstance();
			$reponse = $bdd->query(self::$_query1);
			return $reponse;
		} catch (Exception $e) {
			throw ($e);
		}
	}

}

?>