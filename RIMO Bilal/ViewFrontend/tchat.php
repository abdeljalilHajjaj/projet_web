<?php if(isset($warning) && !empty($warning)){ ?>
        <div class="alert alert-warning alert-dismissable" style="margin-top:90px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Warning!</strong> <?php echo $warning; ?>
        </div>
<?php }?>
<div class="container" style="margin-top:130px">
    
    <div class="row">
        
        <div class="col-md-3 tchatBoxGauche"> </div>

        <div class="col-md-9 tchatBoxDroit">
            
                <div class="row">
                  
                    <table class="table table-hover">    
                        <!-- code pour boucler sur les message --><!--  <div class="container tchatSousBoxDroithaut" >  -->
                        <?php 

                            while($donnees = $data->fetch()){
                                $srcImage = "script/images/im.png";
                                if($donnees["chemainImg_uti"] != NULL)
                                    $srcImage = $donnees["chemainImg_uti"];
                        ?>
                            <tbody>
                              <tr>
                                <td>
                                    <img src="<?php echo $srcImage ?>" class="img-rounded" alt="Cinque Terre" 
                                    width="50" height="30"> 
                                </td>
                                <td><?php echo htmlspecialchars($donnees["texte_tch"]) ?></td>
                                <td><?php echo htmlspecialchars($donnees["date_tch"]) ?></td>
                
                              </tr>
                            </tbody>

                                    

                        <?php
                            }

                        ?> 
                    </table>  

                </div>

                <form method="post" action="">
                    <div class="form-group row" style="margin-top:80px">
                        <div class="col-md-9">
                            <textarea class="form-control" rows="5" id="comment" name="message" placeholder="Enter texte"></textarea>
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="idUsr" value="<?php echo $_SESSION['idUsr']; ?>" >
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>    

                </form>  

        </div>

    </div>


<div>