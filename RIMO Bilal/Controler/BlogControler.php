<?php
/*
	controler pour tous ce qui est lié au blog
*/
class BlogControler{
	
	/**
		cette fonction permet de recuperer les articles su blog ainsi que les commentaire pour les afficher.
	*/
	public function showBlog(){
		

		try {

			if(!empty($_POST)){// si un commentaire est poter

				BlogModel::setCommentaire($_POST["commentaire"],$_POST["idBil"],$_POST["idUsr"]);
			}

			$data = BlogModel::getBilletsCommentaires();
			extract($data);
		} catch (Exception $e) {
			$data = BlogModel::getBilletsCommentaires();
			extract($data);
			$warning = $e->getMessage();
		}
		require_once'ViewFrontend/blog.php';
	}

	//cette fonction permet d'ajouter un nouveau commentaire à un billet
	public function setCommentaire($text,$idBil,$idUsr){
		try {
			BlogModel::setCommentaire($text,$idBil,$idUsr);
		} catch (Exception $e) {
			$warning = $e->getMessage();
		}
	}
}

?>