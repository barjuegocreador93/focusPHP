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
include('db_user.php');

class app {
    //put your code here    
    private $type;
    private $input_name;
    private $input_type;
    private $numForms;
    private $input_val;
    
        
    private $istrylogin;
    private $istryingregis;
    private $islogin;
    
    private $user_email;
    private $user_pass;
    
      
    
    public function __construct($numInpunts,$tipo_input) {
        if ($numInpunts >= 1) {
            $this->input_name[$numInpunts];
            $this->input_type[$numInpunts];
            $this->input_val[$numInpunts];
            $this->numForms=$numInpunts;
       
        if($tipo_input=="Registrar"||$tipo_input=="Ingresar"){
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
        $this->istrylogin=$_POST['wastrylog'];
        $this->istryingregis=$_POST['wastryreg'];
        if($this->istrylogin=="true" && $this->type=='Ingresar')
        {
            $this->islogin=$this->ingresar();
            if($this->islogin=="false")
            {
                echo "Intentalo de nuevo! Su usauario no aparece en nuestro sitio";
            }
        }
        else  {$this->islogin="false";}
        
        
        if($this->istryingregis=="true" && $this->type=='Registrar')
        {
            $this->registrar();
        }
    }
    
    public function addinput($index_input,$type,$name,$val){
        $this->input_name[$index_input]=$name;
        $this->input_type[$index_input]=$type;
        $this->input_val[$index_input]=$val;
    }  
    
    public function putFormOn($html,$php, $bool) {
        $this->islogin=$bool;
        if($this->islogin=="false"){
        $j="<script>$(document).ready(function(){\n";        
        $j=$j."$('$html').append('<form action='+'$php'+' method='+'post'+'></form>');\n";
        for($i=0;$i< $this->numForms;$i++){
            $a=$this->input_type[$i]; $b=$this->input_name[$i];  $f=$this->input_val[$i];
            $c="<input type='+'$a'+' name='+'$b'+' placeholder='+'$f'+' >";
        $j=$j."\t $('$html form').append('" . $c . "');\n";
        }
        $m="'<input type='+'submit'+'>'";
        $j=$j. "$('".$html. " form').append(" . $m . ");\n";
        if($this->type=="Registrar")
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
        $name=$_POST['nombre'];
        $lname=$_POST['apellido'];
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];
        $email=$_POST['email'];
        $query="SELECT * FROM User WHERE email='$email'";
        $r=mysql_query($query);
        $a=  mysql_fetch_array($r);
        if($a['email']!=$email&&$email!="")
        {
            $this->user_email=$email;
            if($pass==$pass2&&$pass!="")
            {
                $this->user_pass=$pass;
                $insert="insert into User values('$name','$lname','$pass','$email')";
                mysql_query($insert);                
                return "true";
            }
            echo "Error al registrar usuario!";
            return "false";
        }          
        echo "El usuario ya existe";      
        return "false";       
    }
    public function ingresar(){
           $pass=$_POST['pass']; 
           $email=$_POST['email'];
           $query="SELECT * FROM User WHERE email='$email'";
           $r=mysql_query($query);
           $a=mysql_fetch_array($r);
           if($a['email']==$email&&$email!=""){
           if($a['Password'] == $pass)
           {
               $this->user_email=$email;
               $this->user_pass=$pass;              
               return "true";
           }           
           return "false";
           
           }
           echo "Contraseña Invalida o Usuario invalido";           
        return "false";
        
    }
    public function loging()
    {
        return $this->islogin;
    }
    public function  email() {
        return $this->user_email;
    }
    public function  pass() {
        return $this->user_pass;
    }
}



