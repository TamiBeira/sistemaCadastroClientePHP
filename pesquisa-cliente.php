<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Cliente</title>
</head>
<body>
    <div id="container">
        <div class="header">
            <header><h1>Pesquisar Cliente</h1></header>
        </div>
        <?php
            require_once('menu.php');
        ?>
        <div class="dadosColetados">
            <form action="" method="get">
                <input type="text" name="nome" id="nome" placeholder="Nome Completo">
                <input type="number" name="cpf" id="cpf" placeholder="CPF">
                <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
            </form>
        </div>
    </div>
</body>
</html>

<?php
    require_once('conn.php');

    if(isset($_GET['pesquisar'])){
        $nome= $_GET['nome'];
        $cpf= $_GET['cpf'];

        $sql = $pdo->prepare('SELECT * FROM `cliente` WHERE nome=? or cpf=?');
        
        $sql->execute(array($nome,$cpf));

        $result = $sql->fetchAll();
        if($result == NULL){
            echo'</br>';
            echo '<h1 class="nLocalizado">'.'Cadastro não localizado!'.'</h1>';
            echo'</br>';
        }else if($result == ""){
            echo'</br>';
            echo '<h1 class="nLocalizado">'.'Você precisa digitar algo no input!'.'</h1>';
            echo'</br>';
        }else{

        foreach ($result as $key => $value) {
            echo '</br>';
            echo '<div id="container">';
            echo '<div class="resultado">';
            echo '<p>'.'Nome: '.'<strong>'.$value['nome'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'CPF: '.'<strong>'.$value['cpf'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'Endereço: '.'<strong>'.$value['endereco'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'Estado: '.'<strong>'.$value['estado'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'Cidade: '.'<strong>'.$value['cidade'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'Telefone: '.'<strong>'.$value['telefone'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'Email: '.'<strong>'.$value['email'].'</strong>'.'</p>';
            echo '</br>';
            echo '<p>'.'Situação: '.'<strong>'.$value['radio'].'</strong>'.'</p>';
            echo '</br>';
            echo '<div class="cadastraDeleta">';
            echo '<a href="edita-cadastro-cliente.php">editar</a>' .'<a href="deleta-cadastro-cliente.php">excluir</a>';
            echo '</div class="cadastraDeleta">';
            echo '</div class="resultado">';
            echo '</div id="container">';
        }
    }
}
?>

