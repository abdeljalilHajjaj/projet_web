<?php


class TchatModel
{

	private static $_query1 = "select * from tchat as t, utilisateur as u where t.id_uti = u.id_uti order by id_tch DESC limit 0,10";
	private static $_query2 = "insert into tchat(date_tch,texte_tch,id_uti) value(?,?,?)";

	public static function getMessage(){
		$data;
		try {
			$bdd = Connexion::getInstance();
			$data = $bdd->query(self::$_query1);

		} catch (Exception $e) {
			throw ($e);
		}

		return $data;
	}

	public static function setMessage($texte,$idUsr){
		try {
		
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query2);
			$today = date("Y-m-d");
			$res = $req->execute(array($today,$texte,$idUsr) );
			if(!$res)
				throw new Exception("le Message na pas ete enregiste");
				
		} catch (Exception $e) {
			
			throw ($e);
		}
	}
}


?>