<!-- -->
<!-- 
	ce fichier est la vueAdmin correspondant à l'ajout d'un article sur la base de donnee.
-->
<?php 	if(isset($warning) && !empty($warning)){ ?>

	        <div class="alert alert-warning alert-dismissable">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	            <strong>Warning!</strong> <?php echo $warning; ?>
	        </div>
<?php 	}else if(isset($alert) && $alert){?>
			<div class="alert alert-success alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Success!</strong> L'article a ete coorectement crée.
			</div>
<?php 	}?>

<div class="row banderolCreationBillet" style="margin-bottom:80px">
	<div class="col-md-12 tchatBoxDroit">
		Ajouter un nouvel article
	</div>
</div>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

	<fieldset>
  		<legend>Choix de la categorie de l'article</legend> <!-- Titre du fieldset -->
		<div class="form-group">
		    <label class="control-label col-sm-2" for="categorie">choix de la Categorie</label>
		    
		    <div class="col-sm-10">
			    <select name="categorie" id="categorie">

		        	<?php 
		    		while ($donees = $reponse->fetch()) {
		    		
			    	?>
		           		<option value="<?php echo $donees['id_cat']; ?>"><?php echo $donees["nom_cat"]; ?></option>

		           	<?php 
			    		}
			    	?>

		       	</select>
		    </div>
	  	</div>
  	</fieldset>

  	<fieldset>
  		<legend>Données de l'article</legend> <!-- Titre du fieldset --> 

		<div class="form-group">
		    <label class="control-label col-sm-2" for="nom">Nom de l'article</label>
		    <div class="col-sm-10">
		    	<input type="texte" class="form-control" id="nom" name="nom" placeholder="nom de l'article">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="control-label col-sm-2" for="prix">Prix de l'article</label>
		    <div class="col-sm-10">
		    	<input type="number" class="form-control" min="1" step="any" id="prix" name="prix" placeholder="prix de l'article">
		    </div>
	  	</div>

	  	<div class="form-group">
		    <label class="control-label col-sm-2" for="quantite">Quantite</label>
		    <div class="col-sm-10">
		    	<input type="number" class="form-control" min="1" step="any" id="quantite" name="quantite" placeholder="Quantié">
		    </div>
	  	</div>

	  	<div class="form-group">
	        <label class="control-label col-sm-2" for="image">fichier (JPG, PNG ou GIF | max. 15 Ko):</label>
	        <div class="col-sm-10">
	        	<input type="file"  id="image" name="image">
	       	</div>
	    </div>


	  	<input type="hidden" name="hiden" value="h4">

	</fieldset>

  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-default">Submit</button>
    	</div>
  	</div>
</form> 