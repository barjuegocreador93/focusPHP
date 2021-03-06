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

    public function mkjsPHP($scrp1 = ";", $jquery = ";", $scrp2 = ";") {
        $j = "<script>";
        $j.=$scrp1;
        $j.="$(document).ready(function(){";
        $j.=$jquery;
        $j.="});";
        $j.=$scrp2;
        $j.="</script>";
        echo $j;
    }

    public function mkjqueryPHP($html, $method = 'empty', $jquery = '') {
        if ($jquery == '') {
            return "$('$html').$method();";
        }
        return "$('$html').$method('$jquery');";
    }

    public function mkjhtmlPHP($html, $attr = array("class" => ""), $text = '', $jp = "first", $etiquets = 1) {

        $j = "";
        if ($jp == "final") {//javascript position
            $j.="'+'";
        }
        if ($etiquets == 2) {
            $j.="<$html ";
            if (is_array($attr)) {
                foreach ($attr as $i => $k) {
                    $j.=" $i='+'$k'+'";
                }
            }
            $mk = $this->array_jhtmlPHP($text);
            $j.=">$mk</$html>";
            return $j;
        } else
        if ($etiquets == 1) {
            $j = "<$html ";
            foreach ($attr as $i => $k) {
                $j.=" $i='+'$k'+'";
            }
            $j.=">";
            return $j;
        }
    }

    public function array_jhtmlPHP($array = []) {
        $i = "";
        $attr = null;
        $html = null;
        $text = null;
        $type = 0;
        if (is_array($array)) {
            foreach ($array as $a) {
                if (is_array($a)) {
                    $i.=$this->array_jhtmlPHP($a);
                    $type = 1;
                }
            }
            if ($type == 0) {
                foreach ($array as $a => $x) {
                    switch ($a) {
                        case "attr": $attr = $x;
                            break;
                        case "html": $html = $x;
                            break;
                        case "text": $text = $x;
                            break;
                        default: $attr[$a] = $x;
                    }
                }

                if ($html == "input" || $html == "img" || $html == "link" || $html == "meta") {
                    $i.=$this->mkjhtmlPHP($html, $attr);
                } else if ($attr != null || $html != null || $text != null) {
                    $i.=$this->mkjhtmlPHP($html, $attr, $text, "frist", 2);
                }
            }
        } else {
            $i = $array;
        }
        return $i;
    }

    public function createForm($url, $html_putform = "body", $html_inputs = array(["html" => "input", "type" => "text", "name" => ""]), $method = 'post') {

        $i = $this->array_jhtmlPHP($html_inputs);
        $j = $this->mkjhtmlPHP("form", array("action" => $url, "method" => $method), $i, "frist", 2);
        $k.=$this->mkjqueryPHP($html_putform, "append", $j);
        $this->mkjsPHP(";", $k);
    }

    public function custom_form_register($url, $html_putfrom, $html_array = ["html" => "input", "style" => "display:none;"]) {
        $html_inputs = [
            ["html" => "input", "type" => "text", "name" => "nombre", "placeholder" => "Nombre"],
            ["html" => "input", "type" => "text", "name" => "apellido", "placeholder" => "Apellido"],
            ["html" => "input", "type" => "password", "name" => "pass", "placeholder" => "Contraseña"],
            ["html" => "input", "type" => "password", "name" => "pass2", "placeholder" => "Re-Contraseña"],
            ["html" => "input", "type" => "email", "name" => "email", "placeholder" => "Email"],
            ["html" => "input", "type" => "submit"], $html_array
        ];

        $this->createForm($url, $html_putfrom, $html_inputs);
    }

    public function custom_form_login($url, $html_putfrom, $html_array = ["html" => "input", "style" => "display:none;", "value" => ""]) {
        $html_inputs = [
            ["html" => "input", "type" => "email", "name" => "email", "placeholder" => "Email"],
            ["html" => "input", "type" => "password", "name" => "pass", "placeholder" => "Contraseña"],
            ["html" => "input", "type" => "submit"], $html_array
        ];

        $this->createForm($url, $html_putfrom, $html_inputs);
    }

}
