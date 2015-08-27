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
<!--        <link href="css/style.css" rel="stylesheet" type="text/css"/>-->
        <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/FST-APP.js" type="text/javascript"></script>        
    </head>
    <body>
        <header>
        </header>
        <nav class="center-block">
            <button class="l1 activ_on btn-warning ">ban</button>
            <button class="l2 activ_on btn-warning ">wow</button>
            <button class="l3 btn-warning btn">sa</button>
            <button class="l4 btn-warning btn">ds</button>
        </nav>
        <section class="c1">
            Hola 1
        </section>
        <section class="c2">
            Hola 2
        </section>
        <section class="c3">
            Hola 3
        </section>
        <section class="c4">
            Hola 4
        </section>
        <?php 
        include("APP/app.php");
        $a=new app(5,'Registre','root','localhost','root','Apps-User');
        $a->addinput(0, 'text', 'nombre');
        $a->addinput(1, 'text', 'apellido');
        $a->addinput(2, 'password', 'pass');
        $a->addinput(3, 'password', 'pass2');
        $a->addinput(4, 'email', 'email');
        $a->putFormOn('body');
        ?>
    </body>
    <script>
       
    </script>
</html>
