<!-- 
  ce fichier est la vueAdmin correspondant à l'affichage des articles enregisté dans la BD
-->
<?php 	if(isset($warning) && !empty($warning)){ ?>

	        <div class="alert alert-warning alert-dismissable">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	            <strong>Warning!</strong> <?php echo $warning; ?>
	        </div>
<?php 	}else if(isset($alert) && $alert){?>
			<div class="alert alert-success alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Success!</strong> L'article a ete coorectement suprimé.
			</div>
<?php 	}?>

<div class="row banderolCreationBillet" style="margin-bottom:80px">
		<div class="col-md-12 tchatBoxDroit">
			Liste des Articles sur le blog
		</div>
</div>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Article</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Delete</th>
      </tr>
    </thead>
<?php 
	$i = 0;
	while($donnees = $reponse->fetch()){
		$i++;
		//chemainImg_art
?>
    <tbody>
      <tr>
        <td><img src="<?php echo $donnees['chemainImg_art'] ?>" class="img-rounded" alt="Cinque Terre" width="100" height="80"> </td>
        <td><?php echo $donnees['nom_art'] ?></td>
        <td><?php echo $donnees['prix_art']."  $$  " ?></td>
        <td><?php echo $donnees['quantite'] ?></td>
        <td>
        	<form method="post" action="">
    				<input type="hidden" name="hiden" value="h5">
    				<input type="hidden" name="idArt" value="<?php echo $donnees['id_art'] ?>">
    				<input type="submit" class="btn btn-danger" value=".. Supprimer ..">
			   </form>
        </td>
      </tr>
    </tbody>
  
<?php 
	}
		//$reponse->closeCursor();
?>

</table>