<div class="container" style="margin-top:80px">
	<div class="row">
			<div class="col-md-3"> 

				<!-- Boucle pour l'affichage des differente catedorie -->

				<h3>Liste des categories </h3>
				 
				<div class="list-group" style="margin-top:30px">
					<?php
						while($donnees = $data->fetch()){
					?>
							<a href="http://localhost/RIMO Bilal/?page=vente&amp;cat=<?php echo $donnees["nom_cat"]; ?>" 
								class="list-group-item"><?php echo $donnees["nom_cat"]; ?> 
							</a>

					<?php
					}

					?>
				</div>

			</div>
			
			<div class="col-lg-offset-1 col-md-8 ">
				<!-- Boucle pour l'affichage des differente catedorie -->
				<!-- 
					on teste avec php si on a des données à afficher 
					si oui on les affiche si non on affiche une image par defaut
					if(isset($data)){
						code pour afficher les article
					}else{
						image par defaut
					}

					
				-->
				<?php

					if(isset($data1)){
						$tmpdata = $data1->fetchAll();
					}
					if(isset($tmpdata) && sizeof($tmpdata) > 0){//on affiche la liste des article isset($_GET["data"])
					
						?>
							<div class="row">
						<?php
							foreach ($tmpdata as $donnees) { 

								
								?>  

									<div class="col-md-4" style="margin-top:50px"> 
										<div class="row">
											<div col-md-12>
											<img src="<?php echo $donnees['chemainImg_art'] ?>" class="img-rounded" alt="Cinque Terre" 
                                    			width="200" height="150">  
												 
											</div>
											<div col-md-12> <?php echo $donnees['nom_art'] ?> </div>
											<div col-md-12> Prix : <?php echo $donnees['prix_art'] ?> $$</div>
											<div col-md-12> Quantité disponible : <?php echo $donnees['quantite'] ?></div>
											<div col-md-12> <a href=""> ajouter au panier</a> </div>
										</div>
									</div>
	  
	              
								<?php
								
							}
						?>
							</div>
							
						<?php
					}else{//on affiche une imade par defaut
				
						?>
							<div class="venteDefaultImg">  </div>
						<?php
					}
				?>


			</div>
			
			
		</div>
	</div>
</div>