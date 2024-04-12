<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acoes/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();
    
} else {
    echo "<script>window.location = 'index.php'</script>";
}

if (isset($_POST['btnAlterar'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $novaSenha = $_POST['senha1'];

    // Check if login exists
    $queryCheckLogin = "SELECT * FROM usuarios WHERE login=:login";
    $checkLogin = $conexao->prepare($queryCheckLogin);
    $checkLogin->bindParam(":login", $login, PDO::PARAM_STR);
    $checkLogin->execute();

    if ($checkLogin->rowCount() != 0) {
        // Check if old password matches
        $queryCheckPassword = "SELECT * FROM usuarios WHERE login=:login and senha=:senha";
        $checkPassword = $conexao->prepare($queryCheckPassword);
        $checkPassword->bindParam(":login", $login, PDO::PARAM_STR);
        $checkPassword->bindParam(":senha", $senha, PDO::PARAM_STR);
        $checkPassword->execute();

        if ($checkPassword->rowCount() != 0) {
            // Update password
            $hashedNovaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
            $queryUpdatePassword = "UPDATE usuarios SET senha=:nova_senha WHERE login=:login";
            $updatePassword = $conexao->prepare($queryUpdatePassword);
            $updatePassword->bindParam(":login", $login, PDO::PARAM_STR);
            $updatePassword->bindParam(":nova_senha", $novaSenha, PDO::PARAM_STR);
            $updatePassword->execute();

            // Optionally, you can check if the update was successful
            if ($updatePassword->rowCount() > 0) {
                echo "<div class='success-message'>Senha alterada com sucesso! </div>";
                
            } else {
                echo "<div class='error-message'>Falha ao alterar a senha.</div>";
            }
        } else {
            echo "<div class='error-message'>Senha antiga incorreta.</div>";
        }
    } else {
        echo "<div class='error-message'>Login nao encontrado.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Senha</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel='shortcut icon' href='/favicon.ico' />
    <link rel="stylesheet" type="text/css" href="style/senha.css" />
    <script src="https://kit.fontawesome.com/41540e039d.js" crossorigin="anonymous"></script>
    <style>
        body,html {
            height: 100%;
        }       


        .bg { 
            /* The image used */
            background-image: url("");
            /* Full height */
            height: 100%; 
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
           
            background-size: cover;
        }
    </style>
</head>
<body>
    <br><br><br>
    <a target="_blank" href="dashboard.php"><p style="text-align: center;;">Clique aqui para ser direcionado a Tela Principal</p></a>   
</body>
</html>

