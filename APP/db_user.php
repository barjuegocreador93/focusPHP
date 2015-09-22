<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_user
 *
 * @author barc
 */
$ms_server="localhost";
$ms_user="root";
$ms_password="root";

mysql_connect($ms_server, $ms_user, $ms_password) or die(mysql_error());
mysql_select_db('Apps-User') or die(mysql_error()); 

 
error_reporting(E_ERROR | E_WARNING | E_PARSE);

class AppsUser
{
	protected $pdo;
	
	public function __construct($server="localhost",$user="root",$password="root")
	{
		$this->pdo = new PDO($server, $user,$password);
	}
	//creamos la base de datos y las tablas que necesitemos
	public function create_table($nameTable, $campos="id int(11) NOT NULL AUTO_INCREMENT,
						name varchar(100) COLLATE utf8_spanish_ci NOT NULL,
						lastname varchar(150) COLLATE utf8_spanish_ci NOT NULL,
						username varchar(100) COLLATE utf8_spanish_ci NOT NULL,
						password varchar(100) COLLATE utf8_spanish_ci NOT NULL,
						email varchar(100) COLLATE utf8_spanish_ci NOT NULL,
						registro date NOT NULL,
						fecha datetime NOT NULL,
						PRIMARY KEY (id)",$database="Apps-User")
	{
                if($nameTable!=null):
		$use_db = $this->pdo->prepare('USE '.$database);						  
		$use_db->execute();
		
		
		//si se ha creado la base de datos y estamos en uso de ella creamos las tablas
		if($use_db):
		//creamos la tabla usuarios
                $prepare="CREATE TABLE IF NOT EXISTS ".$nameTable."(";
                $prepare.=$campos.")";
		$crear_tb_users = $this->pdo->prepare($prepare);							
		$crear_tb_users->execute();	
		endif;
		endif;
	}
}


