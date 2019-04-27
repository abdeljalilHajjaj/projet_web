<?php

class UsersModel
{
	private static $_privilege;
	private static $_pseudo;
	private static $_chemainImg;
	private static $_etat;
	private static $_idUsr;

	private static $_query1 =	"insert into utilisateur(nom_uti,prenom_uti,adresse_uti,codePostal_uti,
						
						dateNaissance_uti,email_uti,login_uti,password_uti,etat_uti,privilege_uti,chemainImg_uti) 

						values (?,?,?,?,?,?,?,?,?,?,?)";
    private static $_query2 = "select * from utilisateur where email_uti = ?";

    private static $_query3 = "insert into connexion(date_con,id_uti) values (?,?)";
		
	/**
	* fonction de creation d'un user
	* parametre : les champs du formulaire
	* return : exception qui seront afficher dans la vue.
	*/
	/*public static function createUser($nom,$prenom,$adresse,$cp,$dateNais,$pseudo,$email,$pwd,$chemain){
		
		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query1) ;
			$uni = $req->execute(array($nom,$prenom,$adresse,$cp,$dateNais,$email,$pseudo,
				   crypt($pwd,'$2a$12$'.md5($pwd).'$'),'true','membre',$chemain)); 

			//administrateur ou membre pour le role


			if(!$uni){
				throw new Exception("Violation de containt Unique : Changer le login ou l'email");
			}

			var_dump($uni);
			//cet appel set à charger les session dans UserControler;
			self::logUser($email,$pwd);

			//fair un select * pour recuperer l'id usr 
		} catch (Exception $ex) {
		
			throw ($ex);
		}
		
	}*/

	public static function logUser($email,$passwd){

		try {
			$bdd = Connexion::getInstance();
			$req = $bdd->prepare(self::$_query2) ;
			$req->execute(array($email)); 

			/*
				comme l'adresse email est unique, cela implique que si on $donnees n'est pas null,
				alors l'adresse email a été trouver.
			*/
			$donnees = $req->fetch();

			if($donnees == NULL){//on a pas trouver l'adresse email dans la table
				throw new Exception("L'adresse email na pas ete trouver dans la BD");
			}else{
				//on verifie si le est identique a celui qui a ete cripté
		

				if (hash_equals($donnees['password_uti'], crypt($passwd,'$2a$12$'.md5($passwd).'$'))) {
					//on recupere le role du user (admin/user normal)
					self::$_privilege  = $donnees['privilege_uti'];
				 	self::$_pseudo     = $donnees['login_uti'];
	 				self::$_chemainImg = $donnees['chemainImg_uti'];
					self::$_etat       = $donnees['etat_uti'];
					self::$_idUsr	   = $donnees['id_uti'];

					if($donnees['etat_uti'])//on sassure que le user na pas ete banni;
						throw new Exception("Vous avez ete banni du site : contacter l'administrateur");
				}else{
					?><br/><br/><br/><br/><br/><br/><br/><?php
					var_dump(crypt($passwd,'$2a$12$'.md5($passwd).'$'));
					throw new Exception("Le Mots de passe est incorrect");
				}
			}


			
		}catch(Exception $ex) {
		
			throw ($ex);
		}
	}

	public static function incrementNbCon($id){
	
		try {
				$bdd = Connexion::getInstance();
			    $req = $bdd->prepare(self::$_query3) ;
			    $today = date("Y-m-d");
				$uni = $req->execute(array($today,$id)); 
				
			} catch (Exception $e) {
				throw ($e);
			}	
	}
	
	
	public static function getPrivilege(){
		return self::$_privilege;
	}

	public static function getPseudo(){
		return self::$_pseudo;
	}

	public static function getChemainImg(){
		return self::$_chemainImg;
	}

	public static function getEtat(){
		return self::$_etat;
	}

	public static function getIdUSr(){
		return self::$_idUsr;
	}


	
}
?>