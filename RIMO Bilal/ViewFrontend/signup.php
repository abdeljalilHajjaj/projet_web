<div class="container loginTailleForm" style="margin-top:90px">



<?php if(isset($warning) && !empty($warning)){ ?>
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Warning!</strong> <?php echo $warning; ?>
        </div>
<?php }?>

  
  <div class="row">
      <div class="col-md-8 tchatBoxDroit">
        
        <form action="model/signup.php" method="post" id ="myForm" enctype="multipart/form-data">

          <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Enter nom" name="nom">
          </div>

          <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" placeholder="Enter prenom" name="prenom">
          </div>

          <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" id="adresse" placeholder="Enter adresse" name="adresse">
          </div>

          <div class="form-group">
            <label for="codePostal">Code Postal:</label>
            <input type="number" class="form-control" id="codePostal" placeholder="Enter code postal" name="codePostal">
          </div>

          <div class="form-group">
            <!-- Tableau obligatoire ! C'est lui qui contiendra le calendrier ! -->
            <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
              <tr>
                <td id="ds_calclass"></td>
              </tr>
            </table>
            <label for="date">Date de naissance:</label>
            <input type="date" class="form-control" id="date" placeholder="AAAA-MM-JJ" name="date" onclick="ds_sh(this);">
          </div>

          <div class="form-group">
            <label for="pseudo">Pseudo:</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Enter pseudo" name="pseudo">
            <span class="tooltip">5 caractères minimum</span>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>

          
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>

          <div class="form-group">
            <label for="pwd1">Retaper le Password:</label>
            <input type="password" class="form-control" id="pwd1" placeholder="Enter password" name="pwd1">
          </div>

          <div class="form-group">
            <label for="image">fichier (JPG, PNG ou GIF | max. 15 Ko):</label>
            <input type="file"  id="image" name="image">
          </div>
          
          <button type="submit" class="btn btn-default">Submit</button>

        </form>

      </div>
  </div>

</div>