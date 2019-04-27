<?php 
	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['codePostal'];
	$dateNaiss = $_POST['date'];
	$login = $_POST['pseudo'];
	$mail = $_POST['email'];
	$motDePasse = $_POST['pwd'];
	

	$bdd = new PDO('mysql:host=localhost;dbname=PRDW','root','');
	

	$bdd->exec('insert into utilisateur(id,nom_uti,prenom_uti,adresse_uti,codePostal_uti,dateNaissance_uti,email_uti,login_uti,password_uti,etat_uti,privilege_uti) values("","'.$nom.'","'.$prenom.'","'.$adresse.'","'.$cp.'","'.$dateNaiss.'","'.$mail.'","'.$login.'","'.crypt($motDePasse,'$2a$12$'.md5($motDePasse).'$').'","true","membre")');



?>