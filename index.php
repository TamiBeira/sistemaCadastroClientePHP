<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cadastro | Cliente</title>
</head>
<body>
    <div id="container">
        <div class="header">
            <header><h1>Cadastro Cliente</h1></header>
            
        </div>
    <div class="body">
        <?php
            require_once('menu.php');
        ?>
        <div class="dadosColetados">
            <form action="" method="post">
                <input type="text" name="nome" id="nome" placeholder="Nome" required/>
                <input type="number" name="cpf" id="cpf" placeholder="CPF" required/>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required/>
                <input type="text" name="estado" id="estado" placeholder="Estado" required/>
                <input type="text" name="cidade" id="cidade" placeholder="Cidade" required/>
                <input type="number" name="telefone" id="telefone" placeholder="Telefone" required/>
                <input type="email" name="email" id="email" placeholder="Email" required/>
                <div class="situacao">
                    <span><p>Situação:</p></span>
                    <a><input type="radio" name="radio" id="liberado" value="Liberado"> Liberado</a> 
                    <a><input type="radio" name="radio" id="bloqueado" value="Bloqueado"> Bloqueado</a> 
                </div>
                <input type="submit" name="cadastrar" id="cadastrar" value="Cadastrar">
            </form>
        </div>
    </div>


    </div>
</body>
</html>

<?php
    require_once('conn.php');

    if(isset($_POST['cadastrar'])){
        $nome= $_POST['nome'];
        $cpf= $_POST['cpf'];
        $endereco= $_POST['endereco'];
        $cidade= $_POST['cidade'];
        $estado= $_POST['estado'];
        $telefone= $_POST['telefone'];
        $email= $_POST['email'];
        $radio=@ $_POST['radio'];
        $foto=@ $_POST['foto'];


        $sql = $pdo->prepare('INSERT INTO `cliente` VALUES(null,?,?,?,?,?,?,?,?,?)');
        $sql->execute(array($nome,$cpf,$endereco,$cidade,$estado,$telefone,$email,$radio,$foto));
        $sql->fetchAll();
        
        echo '</br>';
        echo '<script>alert("Cadastro realizado com sucesso!");</script>';
        echo '</br>';
        //header('Refresh:0');
    }
?>
