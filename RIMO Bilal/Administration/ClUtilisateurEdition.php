<!-- 
	ce fichier est la vueAdmin correspondant à l'affichage des informations sur un utilisateur choisi au prealable
-->
<?php 	if(isset($warning) && !empty($warning)){ ?>

	        <div class="alert alert-warning alert-dismissable">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	            <strong>Warning!</strong> <?php echo $warning; ?>
	        </div>
<?php 	}else if(isset($alert) && $alert){?>
			<div class="alert alert-success alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Success!</strong> eeeeeeeeeeeeeeeeeee.
			</div>
<?php 	}?>




	<div class="row" >
		
		<fieldset>
  				<legend>Choisir un utilisateur</legend>
			<div class="col-md-12">

				 
				
				<?php 	
					if(isset($data)){
						?>
						<div class="dropdown" style="margin-bottom:90px">
							
				  			<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Liste des Membres
				  			<span class="caret"></span></button>
					  		<ul class="dropdown-menu">
					  			<?php 
					  				while($res = $data->fetch()){
					  			?>
							    <li>
							    <form method="post" action="">
									<input type="hidden" name="hiden" value="h6">
							    	<input type="hidden" name="idUti" value="<?php echo $res['id_uti']; ?>">
							    	<input type="submit" class="col-xs-10" value="<?php echo $res["login_uti"]; ?>">
								</form>	
							    </li>
							    <?php } ?>
					  		</ul>
						</div> 
						<?php
					}
				?>
						
			</div>
		</fieldset>

		<fieldset>
  			<legend>Information sur l'utilisateur</legend>

  			<?php 	
				if(isset($infoUsr)){ //'infoUsr','comUsr','conUsr','data' 

				$dataUsr = $infoUsr->fetch();
				$dataConUsr = $conUsr->fetch();
				$srcImage = "script/images/im.png";
                if($dataUsr["chemainImg_uti"] != NULL)
                    $srcImage = $dataUsr["chemainImg_uti"];
			?>

					<div class="col-md-12" style="margin-bottom:20px">
						<img src="<?php echo $srcImage ?>" class="img-rounded" alt="Cinque Terre" 
                                    									width="200" height="150">
					</div>

					<div class="col-md-12" style="margin-bottom:50px">
						
						<div class="row">
							<div class="col-md-12">

								<div class="table-responsive">          
								  <table class="table">
								    <thead>
								      <tr>
								        <th>Nom</th>
								        <th>Prenom</th>
								        <th>Adresse</th>
								        <th>Code Postal</th>
								        <th>Date naissance</th>
								        <th>Email</th>
								        <th>Login</th>
								        <th>Etat</th>
								      </tr>
								    </thead>
								    <tbody>
								      <tr>
								        <td><?php echo $dataUsr['nom_uti'] ?></td>
								        <td><?php echo $dataUsr['prenom_uti'] ?></td>
								        <td><?php echo $dataUsr['adresse_uti'] ?></td>
								        <td><?php echo $dataUsr['codePostal_uti'] ?></td>					   
								        <td><?php echo $dataUsr['dateNaissance_uti'] ?></td>
								        <td><?php echo $dataUsr['email_uti'] ?></td>
								        <td><?php echo $dataUsr['login_uti'] ?></td>
								        <td><?php echo $dataUsr['etat_uti'] ?></td>
								      </tr>
								    </tbody>
								  </table>
								</div>

							</div>

						</div>

					</div>

					<div class="col-md-12" style="margin-bottom:50px">
						
						<div class="row">

							<div class="col-md-4">
								Nombre de connexion :  
 							</div>

							<div class="col-md-offset-4 col-md-4">
								<?php echo $dataConUsr['nbCon']; ?>
							</div>

						</div>
					</div>

					<div class="col-md-12" style="margin-bottom:90px">
						
						<div class="panel-group">
						  <div class="panel panel-default">
						    <div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#col">liste commentaires</a>
						      </h4>
						    </div>
						    <div id="col" class="panel-collapse collapse">
						    <?php 
						    	while( $com = $comUsr->fetch()){
						    	?>
							      <ul class="list-group"><?php echo $com['texte_com']; ?> </ul>
							<?php 
								} 
							?>
						    </div>
						  </div>
						</div> 
						
					</div>
			<?php
				}
			?>

		</fieldset>

	</div>

