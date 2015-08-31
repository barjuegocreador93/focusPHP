<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of functionsPhp
 *
 * @author barc
 */
class functionsPhp {
    //put your code here
    public function __construct() {
        
    }

    public function mkjsPHP($scrp1 = ";",$jquery= ";",$scrp2 = ";")
    {
            $j="<script>";
            $j.=$scrp1;
            $j.="$(document).ready(function(){";
            $j.=$jquery;
            $j.="});";
            $j.=$scrp2;
            $j.="</script>";
            echo $j;
    }
    
    public function mkjqueryPHP($html,$method='empty',$jquery='')
    {
        return "$('$html').$method('$jquery');";
    }
    public function mkjhtmlPHP($html, $attr= array("class"=>""),$text='', $jp="first",$etiquets=1)
    {
        
         $j=""; 
        if($jp="final"){//javascript position
             $j.="'+'";   
        }
        if($etiquets==2){
            
            
            $j.="<$html ";
            foreach($attr as $i=>$k)
            {
              $j.=" $i='+'$k'+'";  
            }
            $j.=">$text</$html>";
           
            
            
            return $j;
        }else
        if($etiquets==1)
        {
            $j="<$html ";
            foreach($attr as $i=>$k)
            {
              $j.=" $i='+'$k'+'";  
            }
            $j.=">";
            return $j;  
        }
        
    }
    
    
}
