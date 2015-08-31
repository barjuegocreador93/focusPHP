<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>     
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/FST-APP.js" type="text/javascript"></script>        
    </head>
    <body>
        <header>
            <h1>FocusPHP</h1>      
            
        </header>
        <nav>
                <button class="c1 ">Registrate</button>
                <button class="c2">Ingresar</button>
                <div class="regis l1"></div>
                <div class="login l2"></div>
        </nav>
              
        <?php 
        
        include("APP/login.php");
        
        $b=new app();//Crear un formulario para ingresar
        $b->putFormRegis(".regis", "index.php");
        $b->putFormlog(".login", "index.php");       
        if($b->loging()=="true")
        {           
            $x= new seccion($b->email(),$b->pass());                      
            $x->mkjsPHP(";",  $b->mkjqueryPHP("nav"));
            $x->redir_seccion_form("nav", "web1.php", "web1!");
            echo "Welcome ".$x->name()."!.";
        }
               
        ?>
    </body>
    <script>
       var a=new doc('c','l');
       a.main();
    </script>
</html>
