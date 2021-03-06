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
        require_once('../dao/locacao.php');
        $locacaoDAO=new locacaoDAO();
        $locacao=$locacaoDAO->listaLocacao(); 
    ?>

    <div class="container" style="text-align: center;"><br>
        <?php
            include '../includes/cabecalho.php';
            include '../includes/menu.php';
        ?>

        <hr>
        <p><b>MÓDULO LOCAÇÃO</b></p>
        <a href='../loc/inserirLoc1.php'><img src='../img/btn_inserir.png'></a>
        <a href='../loc/buscaLoc1.php'><img src='../img/btn_busca.png'></a>
        <br><br>

        <table>
            <tr>
                <th>CÓDIGO</th>
                <th>DATA INÍCIO</th>
                <th>DATA FIM</th>
                <th>PREÇO</th>
                <th>SITUAÇÃO</th>
                <th>CLIENTE</th>
                <th>VEÍCULO</th>
                <th><img src='../img/excluir.png'></th>
                <th><img src='../img/editar.png'></th>
            </tr>
            
            <?php
                foreach ($locacao as $loc) {
                    $codigo=$loc->getCod();
                    $datainicio=$loc->getDataInicio();
                    $datafim=$loc->getDataFim();
                    $preco=$loc->getPreco();
                    $situacao=$loc->getSituacao();
                    $nomecliente=$loc->getNomeCliente();
                    $modeloveiculo=$loc->getModeloVeiculo();
                        echo "
                            <tr>
                                <td> $codigo </td>
                                <td> $datainicio </td>
                                <td> $datafim </td>
                                <td> $preco </td>                                    
                                <td> $situacao </td>
                                <td> $nomecliente </td>
                                <td> $modeloveiculo </td>
                                <td><a href='../loc/excluirLoc.php?cod=$codigo'><img src='../img/btn_excluir.png'></a></td>
                                <td><a href='../loc/editarLoc1.php?cod=$codigo'><img src='../img/btn_editar.png'></a></td>
                            </tr>
                            ";  
                }
            ?>
        </table>

        <hr>
        <?php
            include '../includes/rodape.php';
        ?>
    </div>
</body>
</html>