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
    <title>Trabalho 3 - LOCADORA DE VEÍCULOS</title>
</head>
<body>
    <?php
        include '../conect/conexao.php';
            $con = conexao();
    ?>

    <div class="container" style="text-align: center;"><br>
        <?php
            include '../cabecalho.php';
            include '../menu.php';

            $codigo = $_GET["cod"];
                //echo $codigo;
            $query="SELECT * FROM cliente where codigo=$codigo";
                //echo $query;
            $result=pg_query($con,$query);
                if($result){
                    while ($row=pg_fetch_assoc($result)){
                        $codigo=$row['codigo'];
                        $nome=$row['nome'];
                        $tel=$row['telefone'];     
                    }
                }
        ?>
        
        <br>
        <p><b>MÓDULO EDITAR CLIENTE</b></p>
        <form method="POST" action="editarCliente2.php">
                Nome: <input type="text" name="nome" size="50" value="<?php echo $nome;?>"><br>
                Telefone: <input type="text" name="telefone" size="14" value="<?php echo $tel;?>"><br>
            <input type="hidden" name="cod" value="<?php echo $codigo;?>"><br>
                <hr>
            <input type="submit" name="submit" value="SALVAR">
        </form>

        <?php
            pg_close($con);
        ?>

        <hr>
        <?php
            include '../rodape.php';
        ?>
    </div>
</body>
</html>