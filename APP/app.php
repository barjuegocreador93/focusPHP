<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app
 * class app permite crear formularios e integrarlos a una base de datos ya creada!!
 * @author barc
 */
class app {
    //put your code here
    private $type;
    private $input_name;
    private $input_type;
    private $numForms;
    
    private $db_User;
    private $db_Pass;
    private $db_Server;
    private $db;
    private function conectdatabase($server, $user, $pass, $db) {             
       mysql_connect($server, $user, $pass) or die(mysql_error());
       mysql_select_db($db) or die(mysql_error());
       $this->db_Pass=$pass;
       $this->db=$db;
       $this->db_User=$user;
       $this->db_Server=$server;
    }    
    
    public function __construct($numInpunts,$tipo_input,$user,$server,$pass,$db) {
        if ($numInpunts >= 1) {
            $this->input_name[$numInpunts];
            $this->input_type[$numInpunts];
            $this->numForms=$numInpunts;
       
        if($tipo_input=="Registre"||$tipo_input=="Ingresar"){
           $this->type = $tipo_input;
        }
        }
        else
        {
            $this->form="";
            $this->type = "none";
        }
        $this->conectdatabase($server, $user, $pass, $db);
       
    }
    public function addinput($index_input,$type,$name){
        $this->input_name[$index_input]=$name;
        $this->input_type[$index_input]=$type;
    }  
    
    public function putFormOn($html) {
        $j="<script>";        
        $j=$j."$('$html').append(<form ></form>);";
        for($i=0;$i< $this->numForms;$i++){
        $j=$j."$('$html' form).append(<input type='$this->input_type[$i]' name='$this->input_name[$i]' >);";
        }
        $j=$j. "$($html form).append(<input type='submit'>);";
        $j=$j. "</script>";
        echo $j;
        
    }
    
    

}

