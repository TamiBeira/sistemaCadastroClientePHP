<?php
    require_once('config.php');
    try{
    $pdo = new PDO('mysql:host='.host.';dbname='.db,user,pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        echo '<h3 class="erro">Erro ao conectar ao servidor!</h3>';
    }
?>
