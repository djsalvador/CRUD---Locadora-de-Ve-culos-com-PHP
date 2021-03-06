<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="1123-0187 D.Salvador">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>CRUD - LOCADORA DE VEÍCULOS</title>
</head>
<body>
    <?php
       ini_set('display_errors',1);
       ini_set('display_startup_errors',1);
       error_reporting(E_ALL);
       require_once('../dao/cliente.php');
       $cod = intval($_GET['cod']);
       $clienteDAO=new clienteDAO();
       $cli=$clienteDAO->localizar($cod);
    ?>

    <div class="container" style="text-align: center;"><br>
        <?php
            include '../includes/cabecalho.php';
            include '../includes/menu.php';
        ?>
        
        <hr>
        <p><b>MÓDULO EDITAR CLIENTE</b></p>

            <form method="POST" action="editarCliente2.php">
                NOME: <input type="text" name="nome" size="50" value="<?php echo $cli->getNome();?>"><br>
                TELEFONE: <input type="text" name="telefone" size="14" value="<?php echo $cli->getTelefone();?>"><br>
                    <input type="hidden" name="cod" value="<?php echo $cli->getCod(); ?>"><br>
                    <hr>
                    <input type="submit" name="submit" value="SALVAR">
            </form>

        <hr>
        <?php
            include '../includes/rodape.php';
        ?>
    </div>
</body>
</html>