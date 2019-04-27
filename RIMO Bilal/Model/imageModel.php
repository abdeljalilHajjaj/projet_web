<?php
	
	class imageModel{

		private static $_extension_upload;
		private static $_chemainImage;


		/*
			cette fonction verifie si une image a été charger
			return true  if loaded
			return false if not
		*/
		public static function isImageLoaded(){
			
			return ($_FILES['image']['error'] > 0) ? false : true;
		}

		/*
			cette fonction verifie que le fichier charger est une image et a la bonne extension.
			la fonction renvoie unexcetion si l'extension du ficher n'est pas bonne
		*/
		public static function verificationImage(){
			
				//les extensions autorisées sont placer dans un tableau
				$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
				//l'extension de l'image télécharger est isoler pour ensuite verifier s'il est dans le tableau
				self::$_extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

				//comparaison de l'extion de l'image et des élement du tableau
				if ( !in_array(self::$_extension_upload,$extensions_valides) ){
				
					//"Extension incorrecte";
					throw new Exception("mauvaise extension pour l'image charger");
				
				}
				
		}
		/*
			cette fonction deplace l'image dans le dossier adequat
			elle prend en parametre le pseudo du user. le pseudo etant unique,
			on sassure ainsi que chaque image aura un nom unique.
		*/
		public static function deplacerImage(){
			/*
				mkdir('fichier/1/', 0777, true);
				utiliser un explode pour cassé le nom et remplacer
			*/
			if(self::isImageLoaded($_FILES)){
				$resultat = move_uploaded_file($_FILES['image']['tmp_name'],self::$_chemainImage);
			
			}
		}

		public static function setChemImg($identifiant,$dir){
			self::$_chemainImage = "";
			$src;
			if($dir == "users")
				$src = "images/users/";
			else
				$src = "images/articles/";
			self::$_chemainImage = $src."{$identifiant}.".self::$_extension_upload;

		}

		public static function getChemImg(){
			return self::$_chemainImage;
		}


	}

?>