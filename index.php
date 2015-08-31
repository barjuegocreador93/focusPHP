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
            <h1>Title web</h1>
            
            
        </header>
        <nav>
                <button class="c1 ">Registrate</button>
                <button class="c2">Ingresar</button>
                <div class="regis l1"></div>
                <div class="login l2"></div>
        </nav>
       
        
        <?php 
        include("APP/app.php");
        include("APP/login.php");
        
        $b=new app(2, 'Ingresar');//Crear un formulario para ingresar
        $b->addinput(0, 'email', 'email', 'Email');
        $b->addinput(1, 'password', 'pass', 'Contraseña');
        $b->putFormOn('.login','index.php',$b->loging());       
        
        $a=new app(5,'Registrar');//Crear un formulario para registrar
        $a->addinput(0, 'text', 'nombre','Nombre');
        $a->addinput(1, 'text', 'apellido','Appellido');
        $a->addinput(2, 'password', 'pass','Contraseña');
        $a->addinput(3, 'password', 'pass2','Repita_la_Contraseña');
        $a->addinput(4, 'email', 'email','Email');
        $a->putFormOn('.regis','index.php',$b->loging());      
        if($b->loging()=="true")
        {           
            $x= new seccion($b->email(),$b->pass());                        
            $b=new functionsPhp();           
            $b->mkjsPHP(";",  $b->mkjqueryPHP("nav"));
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
