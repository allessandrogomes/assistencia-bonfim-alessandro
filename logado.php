<?php
    session_start();
    include('config.php');

    if(empty($_POST['cnpj']) || empty($_POST['senha'])) {
         header('Location: index.php');
         exit();
    }

    $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $razao_social = mysqli_real_escape_string($conexao, "SELECT razao_social FROM usuario WHERE usuario = {$_POST['cnpj']}");
 


    $query = "SELECT id_usuario, usuario FROM usuario WHERE usuario = '{$cnpj}' and senha = '{$senha}'";

    
    $result = mysqli_query($conexao, $query);

    $row = mysqli_num_rows($result);


    if($row == 1) {
        $_SESSION['cnpj'] = $cnpj;
        if($_SERVER['HTTP_REFERER'] == 'https://bfbr999.000webhostapp.com/treinamentos.php' ) {
            header('Location: treinamentos.php');
        } else {
            header('Location: index.php');
        }
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    }

?>
