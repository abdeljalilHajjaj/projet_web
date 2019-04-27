//	recuperation de l'id du formulaire d'inscription
var myForm = document.getElementById('myForm');
// on cree un objet qui va contenir toute les methodes de verification de formulaire
var check = {};
//creation et insertion des methodes dans l'objet chaeck


check["nom"] = function(){
	var nom = document.getElementById("nom");

	if(nom.value !=''){
		nom.className = 'correct';
		return true;
	}else{
		nom.className = 'incorrect';
		return false;
	}
}

check["prenom"] = function(){
	var prenom = document.getElementById("prenom");

	if(prenom.value !=''){
		prenom.className = 'correct';
		return true;
	}else{
		prenom.className = 'incorrect';
		return false;
	}
}


check["adresse"] = function(){
	var adresse = document.getElementById("adresse");

	if(adresse.value !=''){
		adresse.className = 'correct';
		return true;
	}else{
		adresse.className = 'incorrect';
		return false;
	}
}

check["codePostal"] = function(){
	var codePstal = document.getElementById("codePostal");

	if(codePostal.value !='' && codePostal.value > 0){
		codePostal.className = 'correct';
		return true;
	}else{
		codePostal.className = 'incorrect';
		return false;
	}	
}

check["date"] = function(){
	var date = document.getElementById("date");

	if(date.value !=''){
		date.className = 'correct';
		return true;
	}else{
		date.className = 'incorrect';
		return false;
	}
}

check["pseudo"] = function(){
	var pseudo = document.getElementById("pseudo");

	if(pseudo.value !=''){
		pseudo.className = 'correct';
		return true;
	}else{
		pseudo.className = 'incorrect';
		return false;
	}
}

check["email"] = function(){
	var email = document.getElementById("email");

	if(email.value !=''){
		email.className = 'correct';
		return true;
	}else{
		email.className = 'incorrect';
		return false;
	}
}

check["pwd"] = function(){
	var pwd = document.getElementById("pwd");

	if(pwd.value !=''){
		pwd.className = 'correct';
		return true;
	}else{
		pwd.className = 'incorrect';
		return false;
	}
}

check["pwd1"] = function(){
	var pwd = document.getElementById("pwd"),
	    pwd1 = document.getElementById("pwd1");

	if(pwd1.value == pwd.value && pwd1.value != ''){
		pwd1.className = 'correct';
		return true;
	}else{
		pwd1.className = 'incorrect';
		return false;
	}
}

// cette methode passe en revue le  cotenue de l'objet check et execute les 
// methode de verifiation du formulaire et fait surbriller les inputs incorrect
myForm.addEventListener('submit',function(e){
	
	for(var i in check){
		var resultat = check[i]();
		if(!resultat){
			e.preventDefault();
		}

	}

	
});