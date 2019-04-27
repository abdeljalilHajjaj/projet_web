<?php

class  AdminModel
{
	private static $_query1  = "insert into billet(titre_bil,texte_bil,dateCreation_bil,id_uti) values (?,?,?,?)";
	private static $_query2  = "select * from billet";
	private static $_query3  = "delete from billet where titre_bil = ?";
	private static $_query4  = "insert into categorie(nom_cat) values (?)";
	
	private static $_query6  = "insert into article(nom_art,prix_art,quantite,id_cat,chemainImg_art) values (?,?,?,?,?)";
	private static $_query7  = "select * from article order by id_cat";
	private static $_query8  = "delete from article where id_art = ?";

	private static $_query9  = "select * from utilisateur order by id_uti";
	private static $_query10 = "select COUNT(id_con) as nbCon from connexion where id_uti = ? ";
	private static $_query11 = "select * from commentaire where id_uti = ? order by id_com DESC limit 0,5";
	private static $_query12 = "select * from utilisateur where id_uti = ?";


	public static function createBillet($texte,$titre,$idUti){

		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query1) or die (print_r($bdd->errorinfo()));
			$today = date("Y-m-d");
			$uni = $req->execute(array($titre,$texte,$today,$idUti) );

			//si $uni content false alors il ya violation de la contrainte unique
			if(!$uni){
				throw new Exception("Violation de containt Unique : Changer le Titre du billet ");
			}
		} catch (Exception $e) {
			throw ($e);
		}

	}

	public static function deleteBillet($titre){

		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query3);
			$req->execute(array($titre));
		} catch (Exception $e) {
			throw ($e);
		}

	}

	public static function getBillets(){
		try {
			return ClassModel::getAllBillets();
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function createCategorie($nomCat){

		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query4);
			$req->execute(array($nomCat));
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function getAllCategories(){

		try {
			return ClassModel::getAllCategories();
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function createArticle($nom,$prix,$qte,$idCat,$chImg){

		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query6);
			$uni = $req->execute(array($nom,$prix,$qte,$idCat,$chImg) );

			//si $uni content false alors il ya violation de la contrainte unique
			if(!$uni){
				throw new Exception("Echeque de l'ajout de l'article ");
			}
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function getArticles(){
		try {
			$bdd = Connexion::getInstance();
			$reponse = $bdd->query(self::$_query7);
			return $reponse;
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function deleteArticle($idArt){

		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query8);
			$req->execute(array($idArt));
		} catch (Exception $e) {
			throw ($e);
		}

	}

	public static function getLoginsUsr(){
		try {
			$bdd = Connexion::getInstance();
			$reponse = $bdd->query(self::$_query9);
			return $reponse;
		} catch (Exception $e) {
			throw ($e);
		}
	}

	public static function getInfoUsr($id){
		try {
			$bdd = Connexion::getInstance();
			// information sur l'utilisateur
			$infoUsr = $bdd->prepare(self::$_query12);
			$infoUsr ->execute(array($id));
			// cinq dernier commentaire sur l'utilisateur
			$comUsr = $bdd->prepare(self::$_query11);
			$comUsr ->execute(array($id));
			// information sur le nombre de connexion de l'utilisateur
			$conUsr = $bdd->prepare(self::$_query10);
			$conUsr ->execute(array($id));
			//recuperation de la liste des user
			$data = self::getLoginsUsr();

			$reponse = compact('infoUsr','comUsr','conUsr','data');
			return $reponse;
		} catch (Exception $e) {
			throw ($e);
		}
	}
}

?>