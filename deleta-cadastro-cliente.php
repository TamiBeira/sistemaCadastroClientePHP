<?php
    require_once('conn.php');

    $id = 1;

    $sql = $pdo->prepare("DELETE FROM `cliente` WHERE id=?");

    if($sql->execute(array($id))){
        echo 'Cadastro deletado com sucesso!';
    }else{
        echo 'Cadastro não foi deletado!';
    }
?>

