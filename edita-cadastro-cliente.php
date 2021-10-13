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
                <input type="text" name="nome" id="nome" placeholder="Nome" required value="<?php echo $nome ?>"/>
                <input type="number" name="cpf" id="cpf" placeholder="CPF" required value="<?php echo $cpf ?>"/>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required value="<?php echo $endereco ?>"/>
                <input type="text" name="estado" id="estado" placeholder="Estado" required value="<?php echo $estado ?>"/>
                <input type="text" name="cidade" id="cidade" placeholder="Cidade" required value="<?php echo $cidade ?>"/>
                <input type="number" name="telefone" id="telefone" placeholder="Telefone" required value="<?php echo $telefone ?>"/>
                <input type="email" name="email" id="email" placeholder="Email" required value="<?php echo $email ?>"/>
                <div class="foto">
                <span>Inserir Foto: </span>
                    <input type="file" name="foto" id="foto" accept="image/x-png,image/jpeg"/>
                </div>
                <div class="situacao">
                <span><p>Situação:</p></span>
                <a><input type="radio" name="radio" id="liberado" value="Liberado"> Liberado</a> 
                <a><input type="radio" name="radio" id="bloqueado" value="Bloqueado"> Bloqueado</a> 
                </div>
                <input type="submit" name="salvar" id="salvar" value="Salvar">
            </form>
        </div>
    </div>


    </div>
</body>
</html>
<?php
    require_once('conn.php');

    $sql = $pdo->prepare("UPDATE `cliente` SET nome=?,cpf=?,endereco=?,cidade=?,estado=?,telefone=?,email=?,radio=?,foto=? WHERE id=$id");

    if($sql->execute(array($nome,$cpf,$endereco,$cidade,$estado,$telefone,$email,$radio,$foto))){
        echo 'Cadastro atualizado com sucesso!';
    }else{
        echo 'Cadastro não foi atualizado!';
    }
?>