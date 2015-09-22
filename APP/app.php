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



class app extends functionsPhp {
    //put your code here    
                
    private $istrylogin;
    private $istryingregis;
    private $islogin;
    
    private $user_email;
    private $user_pass;   
    
    private $tableUser_campos;
    private $tableUser_name;
    
    
    public function __construct($tableUser_name,$tableUser_campos) {
        $this->tableUser_campos=$tableUser_campos;
        $this->tableUser_name=$tableUser_name;
        $this->istrylogin=$_POST['wastrylog'];
        $this->istryingregis=$_POST['wastryreg'];
        if($this->istrylogin=="true")
        {
            $this->islogin=$this->ingresar();
            if($this->islogin=="false")
            {
                echo "Intentalo de nuevo! Su usauario no aparece en nuestro sitio";
            }
        }
        else  {$this->islogin="false";}        
        if($this->istryingregis=="true" )
        {
            $this->registrar();
        }
    }   
    public function putFormRegis($html, $php )
    {
        if($this->islogin=="false"){
        $this->custom_form_register($php, $html,["html"=>"input","type"=>"text","name"=>"wastryreg","style"=>"display:none","value"=>"true"]);
        }
        
    }
     public function putFormlog($html,$php)
    {
        if($this->islogin=="false"){
        $this->custom_form_login($php, $html,["html"=>"input","type"=>"text","name"=>"wastrylog","style"=>"display:none","value"=>"true"]);
        }
    }
    
    
    private function registrar(){
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
                $a=new AppsUser();
                $nametable=$this->user_email."_".$this->tableUser_name;
                $a->create_table($nametable,$this->tableUser_campos);
                return "true";
            }
            echo "Error al registrar usuario!";
            return "false";
        }          
        echo "El usuario ya existe";      
        return "false";       
    }
    private function ingresar(){
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