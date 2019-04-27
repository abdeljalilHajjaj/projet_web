<?php


class VenteModel
{
	private static $_query1 = "select * from categorie as c, article as a where c.nom_cat = ? and a.id_cat = c.id_cat";

	
	public static function getAllCategories(){

		try {
			return ClassModel::getAllCategories();
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function getArticle($nomCategorie){
		try {
			$bdd = Connexion::getInstance();
			$reponse = $bdd->prepare(self::$_query1);
			$reponse->execute(array($nomCategorie) );
			return $reponse;
		} catch (Exception $e) {
			throw ($e);
		}
	}
		
}