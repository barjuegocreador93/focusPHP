<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author barc
 */
include('db_user.php');
include ('functionsPhp.php');
include("APP/app.php");

class seccion extends functionsPhp {
    //put your code here
    private $user_email;
    private $user_pass;
    private $user_name;
    private $user_lname;
    private $login;    
    
    public function __construct($user_email = null, $user_pass=null ) {
        $this->user_email=$user_email;
        $this->user_pass=$user_pass;
        if($this->user_email!=null&&$this->user_pass!=null)
        {
            $query="SELECT * FROM User WHERE email='$this->user_email'";
            $result=  mysql_query($query);
            $user=  mysql_fetch_array($result);
            if(($this->user_email=="")||($this->user_pass=="")||($this->password()!=$user['Password']))
            {
                $this->redir_seccion("index.php","none");
            }
            $this->user_name=$user['Name'];
            $this->user_lname=$user['Apellido'];
        }
    }
    
    public function reconect()
    {
        $this->user_email=$_POST['user_email'];
        $this->user_pass=$_POST['user_pass'];        
        $query="SELECT * FROM User WHERE email='$this->user_email'";
        $result=  mysql_query($query);
        $user=  mysql_fetch_array($result);
        if(($this->user_email=="")||($this->user_pass=="")||($this->password()!=$user['Password']))
        {
            $this->redir_seccion("index.php","none");
        }
        $this->user_name=$user['Name'];
        $this->user_lname=$user['Apellido'];
    }    
    
    public function redir_seccion($php, $metodo,$id)
    {
        $email=$this->user_email;
        $pass=$this->user_pass;
        if($metodo=="get"){
            $this->get($php, "user_email=$this->user_email&&user_pass=$this->user_pass");
        }
        if($metodo=="post"){
           $this->createForm($php, "body", [
    ["html"=>"input","type"=>"text", "name"=>"user_email","style"=>"display:none;", "value"=>"$email"],
    ["html"=>"input","type"=>"password", "name"=>"user_pass","style"=>"display:none;", "value"=>"$pass"],
               ["html"=>"button","class"=>"$php$metodo$id"]                   
                   ]);
           $this->mkjsPHP("",$this->mkjqueryPHP(".$php$metodo$id","click"));
        }           
            
        if($metodo=="none")
        {
            $loc="Location: $php";
            header($loc);
        }
       
    }
       
    public function redir_seccion_form($html_insert,$url,$text_button,$html_button='button',$attr=array("class"=>""))
    {
        $email=  $this->user_email;
        $pass= $this->user_pass;
        $i=  $this->mkjhtmlPHP('input', array("type"=>"text", "name"=>"user_email","style"=>"display:none;", "value"=>"$email"));
        $i.= $this->mkjhtmlPHP('input', array("type"=>"password", "name"=>"user_pass","style"=>"display:none;", "value"=>"$pass"),'','final');
        $i.= $this->mkjhtmlPHP($html_button,$attr, $text_button, 'final',2);
        $i=  $this->mkjhtmlPHP("form", array("action"=>"$url", "method"=>"post"), $i,"frist",2);
        $j= $this->mkjqueryPHP($html_insert,"append",$i);
        $this->mkjsPHP(";", $j);         
    }
    
    public function  email() {
        return $this->user_email;
    }
    public function password()
    {
        return $this->user_pass;
    }
    public function name()
    {
        return $this->user_name;
    }
    public function lname()
    {
        return $this->user_lname;        
    }
    
    public function post($url, $data, $optional_headers = null){
        $params = array('http' => array(
              'method' => 'POST',
              'content' => $data
            ));
        if ($optional_headers !== null) {
          $params['http']['header'] = $optional_headers;
        }
        $ctx = stream_context_create($params);
        $fp = @fopen($url, 'rb', false, $ctx);
        if ($fp) {
        echo @stream_get_contents($fp);
        die();
        } else {
        // Error
            throw new Exception("Error loading '$url', $php_errormsg");
        }
    }
    public function get($url, $data)
    {
        $loc="Location: $url?$data";
        header($loc);
    }
    
    
}
