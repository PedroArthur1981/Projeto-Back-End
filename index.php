<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    echo "<script>window.location = index.php'</script>";
}



?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>Sistema de acesso</title>
    <link rel="stylesheet" type="text/css" href="style\acesso.css" />
    <script type="text/javascript" src="script\jquery.js"></script>
    <script type="text/javascript" src="script\acesso.js"></script>
</head>

<body>
    <header>Sistema de acesso</header>
    <div id="subheader">
        <ul>
            <li><a href="home.php">Sair</a></li>
        </ul>
    </div>        

    <div id="mensagem"></div>

    <div id="formulario">
        <form id="formularioLogin">
            <span class="title">Acesse sua conta</span>

            <div id="linha">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Digite seu login com 6 caracteres" maxlength="6" onkeypress="return ApenasLetras(event,this)" /><i class="fa-regular fa-user"></i>
            </div>

            <div id="linha">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha com 8 caracteres" maxlength="8" onkeypress="return ApenasLetras(event,this)" /><i class="fa-solid fa-lock"></i>
            </div>

            <div id="button">
                <button id="btnEntrar" class="inputSubmit" type="submit" name="acessar" value="ACESSAR" >Entrar</button>
                <button id="">Limpar</button>
                <a href="recuperar_senha.php">Esqueci minha senha</a>
            </div>
        </form>

        <div id="textoCadastro">
            <span class="title">Não possui uma conta?</span>
            <span class="subtitle">Inscrever-se</span>
            <button id="btnCadastro"> <a href="cadastro.php">Cadastrar</a></button>
        </div>
    </div>

    <footer>Copyright © 2023. Todos os direitos reservados.</footer>
    
</body>

</html>