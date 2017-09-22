<?php

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
$db = new PDO("mysql:host=127.0.0.1;dbname=tache","root","arcanis",$options);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

