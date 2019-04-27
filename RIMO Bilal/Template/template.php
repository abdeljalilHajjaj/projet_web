
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PRDW - RIMO</title>
        <link href="script/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="script/style.css" />
        <link rel="stylesheet" media="screen" type="text/css" title="Design" href="script/design.css" />

        
    </head>
    
    <body>
       
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="http://localhost/RIMO Bilal">Acceuil</a></li>
                  <li><a href="http://localhost/RIMO Bilal/?page=vente">Vente</a></li>
                  <li><a href="http://localhost/RIMO Bilal/?page=tchat">Tchat</a></li>
                  <li><a href="http://localhost/RIMO Bilal/?page=blog">Blog</a></li>
                  <li><a id="admin" href="http://localhost/RIMO Bilal/?page=admin">admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form navbar-left" method="get" action="http://localhost/RIMO Bilal/">
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search" name="find">
                              <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                  <i class="glyphicon glyphicon-search"></i>
                                </button>
                              </div>
                            </div>
                        </form>
                    </li>
                    <li><a id="sig" href="http://localhost/RIMO Bilal/?page=signup"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
                    <li><a id="log" href="http://localhost/RIMO Bilal/?page=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
                
              </div>
            </div>
        </nav>
        
        <?php

      
        ?>
        <script type="text/javascript" src="script/scriptLoginLogOut.js"></script>

        <?php
        // put your code here
        $var = "null";
        if(isset($_SESSION['privilege'])){
             $var  =   $_SESSION['privilege']; 

        }
        
      
        echo '<script type="text/javascript">changeDisplay("'.$var.'")</script>' ;
        

        /**
         * la varibale content correspond au contenu des page vueFrontend:
         * le fhier template sert à definir le header et les footer:
         */
        
        echo $content;

       ?>
        <script type="text/javascript" src="script/calendrier.js"></script>
        <script type="text/javascript" src="script/scriptForm.js"> </script>

        <div style="margin-bottom:90px"></div>
          <nav class="navbar navbar-inverse navbar-fixed-bottom">
            <div class="container">
                <p class="navbar-text pull-left">© 2018 - Copyright Bilal RIMO, tous droits réserv.
                </p>
            </div>

          </div>
     
     

    </body>

</html>
