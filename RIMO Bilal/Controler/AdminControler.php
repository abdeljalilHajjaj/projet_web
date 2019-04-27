<?php
/*
	controler pour tous ce qui est lié a l'administration
*/

class AdminControler{

	/*
		defini le type d'alerte a afficher true -> on specifie à  l'utilisateur que l'action à bien été effectué 
										   false -> warning : on affiche un message d'erreur
	*/
	private $alert;

	public function administrationDuSite(){
		
		/*
			on commence par verifier si l'utilisateur qui tente d'acceder a ce contenu est un admin.

		*/
		if(isset($_SESSION['privilege']) && $_SESSION['privilege'] == "administrateur"){
				
			/*
				cette variable defini si on affiche la page d'acceuil avec la photo 
				ou une des page d'administration.

				true -> on affiche la page d'acceil de l'admin
				false -> on affiche la page correspondant à l'action choisi par l'admin
			*/
			$isDefault = true;
			ob_start();
			//on verifie si l'admin a poster un formulaire.
			if(!empty($_POST)){
				$hiden = $_POST["hiden"];
				$isDefault = false;//defini si on affiche la page d'acceuil ou celle d'une action
				$alert = true;


				switch ($hiden) {
					case 'h1'://formulaire de creation d'un nouveau billet
						try {
							$this->ajoutNouveauBillet($_POST["texte"],$_POST["titre"]);
							AdminModel::createBillet($_POST["texte"],$_POST["titre"],$_SESSION['idUsr']);

						} catch (Exception $e) {
							$alert = false;
							$warning = $e->getMessage();
						}
						
						require_once'Administration/ClBlogCreation.php';
						break;

					case 'h2'://supression par l'admin d'un billet dans le blog
						try {
							AdminModel::deleteBillet($_POST["titre"]);
							$reponse = AdminModel::getBillets();
						} catch (Exception $e) {
							$alert = false;
							$warning = $e->getMessage();
						}
						require_once'Administration/ClBlogAffichage.php';
						break;

					case 'h3'://ajout d'une nouvelle categorie d'article
						try {
							if(empty($_POST["nom"]))
								throw new Exception("Saisir un nom pour la categorie ");
							AdminModel::createCategorie($_POST["nom"]);
							$reponse = AdminModel::getBillets();
						} catch (Exception $e) {
							$alert = false;
							$warning = $e->getMessage();
						}
						require_once'Administration/ClCategorieAjout.php';
						break;

					case 'h4'://formulaire d'ajout d'un article
						
						try {
							//on verifie si un fichier a été charger
							if(imageModel::isImageLoaded()){

								$this->verifFormCreationArticle($_POST["categorie"],$_POST["nom"],$_POST["prix"],$_POST["quantite"]);

								//on verifie si l'image a la bone extension
								imageModel::verificationImage();
								//on defini le repertoir de destination de l'image
								//comme le nom est unique, il sera l'identifian de l'image
								imageModel::setChemImg($_POST['nom'],"articles");
								//on deplace l'image dans le bon repertoire.
								imageModel::deplacerImage();
							
								

								AdminModel::createArticle($_POST["nom"],$_POST["prix"],$_POST["quantite"],
																$_POST["categorie"],imageModel::getChemImg());
							}else{
								throw new Exception("Il est obligatoir de joindre une image a l'article");
							}
						} catch (Exception $e) {
							
							$alert = false;
							$warning = $e->getMessage();
						}
						$reponse = AdminModel::getAllCategories();
						require_once'Administration/ClArticleAjout.php';
						break;
					case 'h5'://supression par l'admin d'un article
						try {
							AdminModel::deleteArticle($_POST["idArt"]);
							
						} catch (Exception $e) {
							$alert = false;
							$warning = $e->getMessage();
						}
						$reponse = AdminModel::getArticles();
						require_once'Administration/ClArticleEdition.php';
						break;

					case 'h6'://affichage des informations sur un tuilisateur
						try {
							$reponse = AdminModel::getInfoUsr($_POST["idUti"]);
							extract($reponse);
							$alert = false;
						} catch (Exception $e) {
							$alert = false;
							$warning = $e->getMessage();
						}
						$reponse = AdminModel::getArticles();
						require_once'Administration/ClUtilisateurEdition.php';
						break;
					
					default:
						# code...
						break;
				}

			}
			/*
				on verifie si une action est defini et on efectue l'action correspondante.
				cela correspond au menu de gauche sur la fenetre de l'admin
			*/
			else if(isset($_GET["action"])){
				$action = $_GET["action"];
				$isDefault = false;

				switch ($action) {
					case 'GestBloCreation'://vue ajout nouveau billet
						require_once'Administration/ClBlogCreation.php';
						break;

					case 'GestBloAffichage'://vue affichage billet
						try {
							$reponse = AdminModel::getBillets();
						} catch (Exception $e) {
							$warning = $e->getMessage();
						}
						
						require_once'Administration/ClBlogAffichage.php';
						break;

					case 'GestBloModification'://vue modification billet
						# code...
						break;

					case 'GestUtiEdition'://vue affichage des info d'un utilisateur
							$data = AdminModel::getLoginsUsr();
						require_once'Administration/ClUtilisateurEdition.php';
						break;


					case 'GestArtAjout'://vue ajout nouvel article
						try {
							$reponse = AdminModel::getAllCategories();
						} catch (Exception $e) {
							$warning = $e->getMessage();
						}
						require_once'Administration/ClArticleAjout.php';
						break;

					case 'GestArtAjoutCat'://vue ajout nouvelle categorie d'article

						require_once'Administration/ClCategorieAjout.php';
						break;

					case 'GestArtEdition': //vue affichage des articles
						try {
							$reponse = AdminModel::getArticles();
						} catch (Exception $e) {
							$warning = $e->getMessage();
						} 
						require_once'Administration/ClArticleEdition.php';
						break;
				}
			}

			$content1 = ob_get_clean();
			require_once'Administration/administration.php';
				
		}else{
			header("HTTP/1.0 403 Forbiden");
			die("Acces interdit : cet espace est reserver à l'administrateur du site");
		}



	}

	/*
		cette fonction ajoute un nouveau billet dans la BD
		@param texte : contenu du billet
		@param titre : titre du  billet
	*/
	public function ajoutNouveauBillet($texte,$titre){

		try {
			$this->isDonneeValide($texte);
			$this->isDonneeValide($titre);

		} catch (Exception $e) {
			throw ($e);
		}
	}

	/*
		cette fonction verifie que les champ on bien ete rempli
		@param categorie : categorie dans la quelle se trouveras l'article
		@param $nom : nom de l'article
		@param $prix : prix de l'article
		@param $qte : quantité de l'article
	*/
	public function verifFormCreationArticle($categorie,$nom,$prix,$qte){
		
		try {
			if(empty($categorie))
				throw new Exception("Aucun categorie choisie : crée en une si la liste est vide");
			$this->isDonneeValide($nom);
			$this->isDonneeValide($prix);
			$this->isDonneeValide($qte);

		} catch (Exception $e) {
			throw ($e);
		}

	}

	/*
		cette fonction verifie la validiter d'une données
		@param param : un texte a verifier
	*/
	public function isDonneeValide($param){

		if(empty($param))
			throw new Exception("les champ de texte ne doivent pas etre vide");
	}



}

?>