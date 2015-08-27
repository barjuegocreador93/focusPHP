<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app
 *
 * @author barc
 */
class app {
    //put your code here
   
    public function __construct() {
        echo "<script>$(document).ready(function(){var a=new doc('l','c');a.main();});</script>";
    }
    public function conectdatabase() {
       $server="127.0.0.1:3306";
       $user="root"; 
       $pass="1234";       
       mysql_connect($server, $user, $pass) or die(mysql_error());     
      
    }

}

