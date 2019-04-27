<!-- 
	ce fichier est la vueAdmin correspondant à l'ajout d'une nouvelle categorie d'article à la base de donnée.
-->
<?php 	if(isset($warning) && !empty($warning)){ ?>

	        <div class="alert alert-warning alert-dismissable">
	            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	            <strong>Warning!</strong> <?php echo $warning; ?>
	        </div>
<?php 	}else if(isset($alert) && $alert){?>
			<div class="alert alert-success alert-dismissable">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  				<strong>Success!</strong> La categorie a ete coorectement crée.
			</div>
<?php 	}?>

<div class="row banderolCreationBillet" style="margin-bottom:80px">
	<div class="col-md-12 tchatBoxDroit">
		Creer un nouvelle categorie d'article
	</div>
</div>

<form class="form-horizontal" method="post" action="">
	<div class="form-group">
	    <label class="control-label col-sm-2" for="nom">Nom de la categrie</label>
	    <div class="col-sm-10">
	    	<input type="texte" class="form-control" id="nom" name="nom" placeholder="nom de la categoeie">
	    </div>
  	</div>


  	<input type="hidden" name="hiden" value="h3">

  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      		<button type="submit" class="btn btn-default">Submit</button>
    	</div>
  	</div>
</form> 