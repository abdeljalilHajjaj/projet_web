<?php


class BlogModel
{
	
	private static $_query1 = "select * from commentaire as c, utilisateur as u where c.id_uti = u.id_uti";
	private static $_query2 = "insert into commentaire(date_com,texte_com,id_bil,id_uti) value(?,?,?,?)";


	public static function getBilletsCommentaires(){
		$data;
		try {
			$reponseBil =  ClassModel::getAllBillets();
			$reponseCom =  self::getCommentaires();

			$data = compact('reponseBil','reponseCom');

		} catch (Exception $e) {
			throw ($e);
		}

		return $data;
	}

	private static function getCommentaires(){
		$reponse;
		try {
			$bdd = Connexion::getInstance();
			$reponse = $bdd->query(self::$_query1);
			
		} catch (Exception $e) {
			throw ($e);
		}
		return $reponse;
	}


	public static function setCommentaire($texte,$idBil,$idUsr){
		try {
			
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query2);
			$today = date("Y-m-d");
			$res = $req->execute(array($today,$texte,$idBil,$idUsr) );
			if(!$res)
				throw new Exception("le commentaire na pas ete enregiste");
				
		} catch (Exception $e) {
			
			throw ($e);
		}
	}
}

?>