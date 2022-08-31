<?php
    include('verifica_login.php');
?>

<?php

    include_once('config.php');

    $sql = "SELECT * FROM diagnosticos ORDER by id DESC";
    $sqll = "SELECT * FROM diagnosticos ORDER by id DESC";

    $result = $conexao->query($sql);
    $resultt = $conexao->query($sqll);

    $user_data = mysqli_fetch_assoc($result);
    $user_dataa = mysqli_fetch_assoc($resultt);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="shortcut icon" href="./img/icon-moura.png" />
    <link rel="stylesheet" href="./css/painel-cliente.css">
    <title>Dashboard</title>
</head>
<body>
<header class="principal__cabecalho">
        <nav>
            <a href="./index.php">
                <img class="logo-moura" src="./img/moura-logo.png" alt="Compre aqui sua bateria!">
            </a>
            <div class="mobile__menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav__cabecalho">
                <li class="itens-nav__cabecalho"><a class="link-itens-nav__cabecalho" href="./treinamentos.php">Treinamentos</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://www.moura.com.br/produtos/">Produtos</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://www.moura.com.br/descubra-qual-a-sua-bateria/">Sua bateria</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://www.moura.com.br/revendas/">Revendas</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" class="link-itens-nav__cabecalho" href="https://goo.gl/maps/wptqWDtTCvP4C6Hh8">Localização</a></li>
                <li class="itens-nav__cabecalho"><a target="_blank" href="https://api.whatsapp.com/send?phone=5574999658200"><img class="whatsapp__icon" src="./img/icon-whatsapp.png"></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="main">
            <div class="container__titulo-e-sair">
                <h1 class="titulo__razao-social">
                    <?php 
                        while($user_dataa = mysqli_fetch_assoc($resultt)){
                            echo "<tr>";
                            if($_SESSION['cnpj'] == $user_dataa['cnpj']) {
                                echo "<td>".$user_dataa['cliente']."</td>";
                                break;
                            }
                    }
                    ?></h1>
                <h2 class="botao-sair"><a href="./logout.php">Sair</a></h2>
            </div>
            <div class="container_tabela">
            <table class="tabela">
                <thead>
                    <tr>
                    <th class="coluna_css" scope="col">Coleta</th>
                        <th class="coluna_css" scope="col">Entrada</th>
                        <th class="coluna_css" scope="col">Modelo</th>
                        <th class="coluna_css" scope="col">Código</th>
                        <th class="coluna_css" scope="col">Diagnóstico</th>
                        <th class="coluna_css" scope="col">Saída</th>
                    </tr>
                </thead>
                <tbody class="tabela_corpo">
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                if($_SESSION['cnpj'] == $user_data['cnpj']) {
                                    echo "<td>".$user_data['data_coleta']."</td>";
                                    echo "<td>".$user_data['data_entrada']."</td>";
                                    echo "<td>".$user_data['modelo']."</td>";
                                    echo "<td>".$user_data['codigo']."</td>";
                                    echo "<td>".$user_data['diagnostico']."</td>";
                                    echo "<td>".$user_data['data_saida']."</td>";
                                }
                        }
                    ?>
                </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="rodape">
        <a target="_blank" href="https://www.moura.com.br/" class="rodape__moura--logo">
            <img class="moura-logo__rodape" src="./img/moura-logo.png" alt="">
        </a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=5574999658200" class="rodape__whatsapp">
            <img class="rodape__whatsapp___img" src="./img/icon-whatsapp2.png" alt="">
            <h3 class="rodape__whatsapp___texto">Whatsapp</h3>
        </a>
        <a href="#" class="rodape__phone">
            <img src="./img/phone.png" alt="">
            <h3 class="rodape__phone___texto">0800 701 2021</h3>
        </a>
        <h3 class="rodape__texto">Copyright &copy; 2022 - Alessandro da Silva Gomes - Todos os direitos reservados.</h3>
    </footer>
    <script src="./js/mobile-navbar.js"></script>
    <script src="./envio-dados.php"></script>
</body>
</html>