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


mysql_connect('localhost', 'root', '1234') or die(mysql_error());
mysql_select_db('Apps-User') or die(mysql_error()); 

 
error_reporting(E_ERROR | E_WARNING | E_PARSE);




