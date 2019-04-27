<?php
/*
	controler pour tous ce qui est lié au tchat
*/
class TchatControler{
	
	/**
		cette fonction permet de recuperer les commentaires du tchat pour les afficher.
	*/
	public function showMessage(){
		

		try {

			if(!empty($_POST)){// si un commentaire est poter
				TchatModel::setMessage($_POST["message"],$_POST["idUsr"]);
			}

			$data = TchatModel::getMessage();
		} catch (Exception $e) {
			$data = TchatModel::getMessage();
			$warning = $e->getMessage();
		}
		require_once'ViewFrontend/tchat.php';
	}

}
?>