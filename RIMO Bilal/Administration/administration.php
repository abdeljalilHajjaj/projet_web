<!-- 
	ce fichier est la vueAdmin correspondant au templage sur le quel ce greffe les autres vueAdmin
-->
<div class="container" style="margin-top:80px">

<div class="row">
		<div class="col-md-3"> 

			<!-- preparation des menus de l'epace administration -->

			<!-- 
				nomenclature des action : Gest (gestion) + Blo (3 premier caractére du nom du mednu exple: blog-> blo)
				+ nomaction ( Creation, modification etc)

				cela donne par exemple : GestBloCreation - GestBloAffichage - GestBloModiication
			-->

			<!-- Menu Blog -->
			<div class="panel-group">
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" href="#collapse1">Gestion du blog</a>
			      </h4>
			    </div>
			    <div id="collapse1" class="panel-collapse collapse">
			      <ul class="list-group">
				      <a href="http://localhost/RIMO Bilal/?page=admin&amp;action=GestBloCreation" class="list-group-item">
				      	Crée un billet 
				      </a>
				      <a href="http://localhost/RIMO Bilal/?page=admin&amp;action=GestBloAffichage" class="list-group-item">
				      	Afficher billets 
				      </a>
				      
			      </ul>
			    </div>
			  </div>
			</div> 


			<!-- Menu Utilisateur -->

			<div class="panel-group">
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" href="#collapse2">Gestion des utilisateurs</a>
			      </h4>
			    </div>
			    <div id="collapse2" class="panel-collapse collapse">
			      <ul class="list-group">
				      <a href="http://localhost/RIMO Bilal/?page=admin&amp;action=GestUtiEdition" class="list-group-item">Editer information UM</a>
			      </ul>
			    </div>
			  </div>
			</div> 

			<!-- Menu Article -->

			<div class="panel-group">
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" href="#collapse3">Gestion des articles</a>
			      </h4>
			    </div>
			    <div id="collapse3" class="panel-collapse collapse">
			      <ul class="list-group">
			      	<a href="http://localhost/RIMO Bilal/?page=admin&amp;action=GestArtAjoutCat" class="list-group-item">Ajouter Categorie </a>
				    <a href="http://localhost/RIMO Bilal/?page=admin&amp;action=GestArtAjout" class="list-group-item">Ajouter Article </a>
				    <a href="http://localhost/RIMO Bilal/?page=admin&amp;action=GestArtEdition" class="list-group-item">Editer Article </a>
			      </ul>
			    </div>
			  </div>
			</div> 
			<!-- <a href="http://localhost/PRDW/?page=admin&ampcat=<?php echo $i; ?>" class="list-group-item">categorie <?php echo $i; ?> </a>
 -->



		</div>

		<div class="col-lg-offset-1 col-md-8 ">
			<!-- Boucle pour l'affichage des differente catedorie -->
			<!-- 
				on teste avec php si on a des donner a afficher 
				si oui on les affiche si non on affiche une image par defaut
				if(isset($data)){
					code pour afficher les article
				}else{
					image par defaut
				}

				
			-->
			<?php
				if(isset($isDefault) && !$isDefault){//on affiche la page correspondant a l'action choisi par l'admin
					echo $content1;
				}else{//on affiche une imade par defaut de la page d'administration
			
					?>
						<div class="adminDefaultImg">  </div>
					<?php
				}
			?>


		</div>
		
	</div>
</div>