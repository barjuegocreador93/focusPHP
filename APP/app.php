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
    private $input_val;
    
    private $db_User;
    private $db_Pass;
    private $db_Server;
    private $db;
        
    private $istrylogin;
    private $istryingregis;
    private $islogin;
    
    
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
            $this->input_val[$numInpunts];
            $this->numForms=$numInpunts;
       
        if($tipo_input=="Registre"||$tipo_input=="Ingresar"){
           $this->type = $tipo_input;
        }
        }
        else
        {
            $this->input_name="";
            $this->input_type="";
            $this->input_val="";            
            $this->type = "none";
        }
        $this->conectdatabase($server, $user, $pass, $db);
        $this->istrylogin=$_GET['wastrylog'];
        $this->istryingregis=$_GET['wastryreg'];
        if($this->istrylogin=="true")
        {
            $this->islogin=$this->ingresar();
            if($this->islogin=="false" && $this->type=='Ingresar')
            {
                echo "Intentalo de nuevo! Su usauario no aparece en nuestro sitio";
            }
        }
        else  $this->islogin="false";
        
        if($this->istryingregis=="true")
        {
            $this->registrar();
        }
    }
    
    public function addinput($index_input,$type,$name,$val){
        $this->input_name[$index_input]=$name;
        $this->input_type[$index_input]=$type;
        $this->input_val[$index_input]=$val;
    }  
    
    public function putFormOn($html,$php) {
        if($this->islogin=="false"){
        $j="<script>$(document).ready(function(){\n";        
        $j=$j."$('$html').append('<form action='+'$php'+' method='+'get'+'></form>');\n";
        for($i=0;$i< $this->numForms;$i++){
            $a=$this->input_type[$i]; $b=$this->input_name[$i];  $f=$this->input_val[$i];
            $c="<input type='+'$a'+' name='+'$b'+' placeholder='+'$f'+' >";
        $j=$j."\t $('$html form').append('" . $c . "');\n";
        }
        $m="'<input type='+'submit'+'>'";
        $j=$j. "$('".$html. " form').append(" . $m . ");\n";
        if($this->type=="Registre")
        {
            $j=$j."$('$html form').append('<input type='+'text'+' name='+'wastryreg'+' style='+'display:none;'+' value='+'true'+'>');\n";
        }
        else if($this->type=="Ingresar")
        {
             $j=$j."$('$html form').append('<input type='+'text'+' name='+'wastrylog'+' style='+'display:none;'+' value='+'true'+'>');\n";
        }       
        $j=$j."});\n</script>\n";
        echo $j;}       
    }
    
    public function registrar(){
        return 0;
    }
    public function ingresar(){
        return 0;
    }
    

}


