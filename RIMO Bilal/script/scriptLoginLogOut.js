/*
	ce script gere l'affichage des lien SignUp, Login, et admin:

	quant on se connecte sur le site en tant que UNM, le lient admin est cacher. 
	Il n'apparait que si un utilisateur de privilege (dministrateur est logué).

	quant on cree un compte ou qu'on se log (UM), le lien login se transforme es logout
	et le lien SignUP disparais.

	pour un UM n'ayant le privilege adlinistrateur, le lien admin est aussi cacher. 

*/

function changeLoginToLogOut(){
	document.getElementById('log').textContent="logout";
}

function hideSignUp(){
	document.getElementById('sig').style.display = "none";
}

function hideAdmin(){
	var admin = document.getElementById('admin').style.display = "none";
}

function changeDisplay(privilege){

	if(privilege != "null"){
		changeLoginToLogOut();
		hideSignUp();
		if(privilege == "membre")
			hideAdmin();
	}else{
		hideAdmin();
	}

}
