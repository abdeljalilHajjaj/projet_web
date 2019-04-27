<div class="container loginTailleForm" style="margin-top:90px">

  <?php if(isset($warning) && !empty($warning)){ ?>
        <div class="alert alert-warning alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Warning!</strong> <?php echo $warning; ?>
        </div>
  <?php }?>
  
  <div class="row">
      <div class="col-md-8 tchatBoxDroit">
        
        <form action="" method="post">

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>

          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
          </div>
          
          <button type="submit" class="btn btn-default">Submit</button>

        </form>

      </div>
  </div>

</div>