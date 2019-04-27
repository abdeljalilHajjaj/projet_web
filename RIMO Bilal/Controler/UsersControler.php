<?php
/*
	controler pour tous ce qui est lié a l'authentification et à la creation de compte
*/
class UsersControler{

	/*
		cette fonction permet de se loger sur le site
	*/
	public function login(){
		
		if(!empty($_POST)){

			

				try{
					// on tente de se loger
					UsersModel::logUser($_POST['email'],$_POST['pwd']);

					//si aucune exception n'es renvoyer alors l'authentification a reussi et on cree les varibale de session


					$_SESSION['pseudo']       = UsersModel::getPseudo();
					$_SESSION['privilege']    = UsersModel::getPrivilege();
					$_SESSION['etat'] 		  = UsersModel::getEtat();
					$_SESSION['chemainImage'] = UsersModel::getChemainImg();
					$_SESSION['idUsr']        = UsersModel::getidUsr();
					
					//incrementation du nombre de connexion
					UsersModel::incrementNbCon($_SESSION['idUsr'] );

					header('Location: index.php');

				}catch(Exception $e){
					$warning = $e->getMessage();
					require_once'ViewFrontend/login.php';
				}
			
				
				
		
		}else{
			if(isset($_SESSION['privilege'])){
				session_destroy();
				header('Location: index.php');
			}else{
				require_once'ViewFrontend/login.php';
			}

			
		}
	}

	/*
		cette fonction permet de cree un compte
	*/
	public function signUp(){
		//on verifie si le formulaire est charger
		if(!empty($_POST)){
			try {
				//on verifie si un fichier a été charger
				if(imageModel::isImageLoaded()){
					//on verifie si l'image a la bone extension
					imageModel::verificationImage();
					//on defini le repertoir de destination de l'image
					imageModel::setChemImg($_POST['pseudo'],"users");
				}

				//on demande au model de cree un utilisateur;
				UsersModel::createUser($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['codePostal'],
					$_POST['date'],$_POST['pseudo'],$_POST['email'],$_POST['pwd'],imageModel::getChemImg());

				//on deplace l'image dans le bon repertoire.
				imageModel::deplacerImage();
				var_dump($_POST['pseudo']);

				//si l'insertion ne renvoie pas d'erreur, on crée les varibales de session

				$_SESSION['pseudo'] = $_POST['pseudo'];
				$_SESSION['privilege']    = UsersModel::getPrivilege();
				$_SESSION['etat'] 		  = UsersModel::getEtat();
				$_SESSION['chemainImage'] = imageModel::getChemImg();
				$_SESSION['idUsr']        = UsersModel::getidUsr();

				//incrementation du nombre de connexion
				UsersModel::incrementNbCon($_SESSION['idUsr'] );
				header('Location: index.php');
			} catch (Exception $e) {
				/*
					si un erreur a été captuer, on initialise la variable warning avec le message d'erreur
				*/
					
				$warning = $e->getMessage();
				require_once'ViewFrontend/signup.php';
			}
			

		}else{
			require_once'ViewFrontend/signup.php';
		}
	}

	

}

?>