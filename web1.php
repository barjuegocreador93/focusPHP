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
        
       
        
        <?php       
        include("APP/login.php");
        $a = new seccion();
        $a->reconect();
        echo "Welcome ". $a->name() ."!.";
        $a->redir_seccion_form("body", "web2.php", "Web2!");
       
        
              
        ?>
    </body>
    <script>
       var a=new fast_appi('c','l');
       a.run();
    </script>
</html>

