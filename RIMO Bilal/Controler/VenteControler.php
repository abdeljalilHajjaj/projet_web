<?php
/*
	controler pour tous ce qui est lié a la vente d'article
*/
class VenteControler{
	
	/**
		cette fonction permet de recuperer les articles su blog ainsi que les commentaire pour les afficher.
	*/
	public function showArticleVente(){
		

		try {

			if(isset($_GET["cat"])){// si un commentaire est poter
				
				$data1 = VenteModel::getArticle($_GET["cat"]);

			}
			
			$data = VenteModel::getAllCategories();
			
		} catch (Exception $e) {
			$data = VenteModel::getArticle($_GET["cat"]);
			$warning = $e->getMessage();
		}
		require_once'ViewFrontend/vente.php';
	}

}

?>