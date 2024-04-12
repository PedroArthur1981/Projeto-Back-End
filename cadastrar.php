<?php

session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acoes/conexao.php");

    $conexaoClass = new Conexao();
    $conexao = $conexaoClass->conectar();

    $id   = $_SESSION["usuario"][2];
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'index.php'</script>";
}

$erro = -1;
if (isset($_GET['erro']))
{
    $erro = $_GET['erro'];
}


?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/alterar.css" />
    <script src="https://kit.fontawesome.com/41540e039d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Cadastro de usuário - <?php echo $nome; ?></title>
    <?php
    if ($adm) {
    ?>
        <script type="text/javascript" src="script\jquery.js"></script>
    <?php
    }
    ?>
</head>
<body>
    <header>
        <div id="content">
            <div id="user">
                <span><?php echo $adm ? $nome . " (ADM)" : $nome; ?></span>
            </div>
            <span class="logo">Sistema de acesso</span>
            <div id="logout">
                <a href="acoes/logout.php"><button>Logout</button></a>
            </div>
        </div>
    </header>
    <div id="content">
        <?php if ($adm) : ?>
            <div id="subheader">
                <ul>
                    <php if ($adm) : ?>
                        <li><a href="visualizar.php">Alterar Cadastro Usuário</a></li>
                        <li><a href="consulta.php">Consultar cadastro Usuário</a></li>
                        <li><a href="dashboard.php">Listar Usuário</a></li>
                        <li><a href="modelobanco.php">Modelo do Banco de Dados</a></li>
                        
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <h1>CADASTRO DE USUÁRIO</h1>
    <?php
        if ($erro == 0):
    ?>
        <p class="sucesso">Cadastrado com sucesso!</p>
    <?php 
        elseif ($erro > 0):
    ?>
        <p class="erro">Problemas no cadastro!</p>
    <?php 
        endif;
    ?>
    <form action="bd_cadastrar.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Formulário de cadastro</legend>
            <div>
                <label for="cpf">CPF: </label>
                <input type="text" name="cpf" id="cpf" onkeydown="ajustaCpf(this)" onkeypress="ajustaCpf(this)" onkeyup="ajustaCpf(this)" onkeypress="return somenteNumeros(event)" maxlength="14" required /><i class="fa-solid fa-id-badge"></i><br><span id="resposta"></span>
            </div>
            <div>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" minlength="15" maxlength="80" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required /><i class="fa-solid fa-user"></i>
            </div>
            <div>
                <label for="nomemae">Nome Materno: </label>
                <input type="text" name="nomemae" id="nomemae" minlength="15" maxlength="80" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required /><i class="fa-solid fa-user"></i>
            </div>
            <div>
                <label for="datanasc">Data de nascimento:</label>
                <input type="text" name="datanasc" id="datanasc" maxlength="10" onkeyup="ajustaData(this)" onkeydown ="ajustaData(this)" onkeypress="ajustaData(this)" required/><i class="fa-solid fa-calendar-days" ></i>
            </div>
            <div>
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" onkeyup="minuscula(this)" onkeydown="minuscula(this)" onkeypress="minuscula(this)" required/><i class="fa-solid fa-envelope"></i>
            </div>
            <div>
                <label for="celular">Telefone Celular: </label>
                <input type="text" name="celular" id="celular" maxlength="15" onkeyup="ajustaCelular(this)" onkeydown="ajustaCelular(this)" onkeypress="ajustaCelular(this)" required/><i class="fa-solid fa-mobile-retro"></i>
            </div>
            <div>
                <label for="fixo">Telefone Fixo: </label>
                <input type="text" name="fixo" id="fixo" maxlength="14" onkeyup="ajustaTelefone(this)" onkeydown="ajustaTelefone(this)" onkeypress="ajustaTelefone(this)" required/><i class="fa-solid fa-phone"></i>
            </div>
            <div>
                <tr>
                    <td><label for="sexo">Sexo</label></td>
                    <td>
                        <select name="sexo" id="sexo">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="O">Outros</option>
                        </select> <i class="fa-solid fa-venus-mars icon-modify"></i>
                    </td>
                </tr>
            </div>
            <div>
                <label for="cep">CEP: </label>
                <input type="text" name="cep" id="cep" required><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="rua">Rua: </label>
                <input type="text" name="rua" id="rua" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="numero">Número: </label>
                <input type="text" name="numero" id="numero" onkeypress="return somenteNumeros(event)" required/><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="complemento">Complemento:</label>
                <input type="text" name="complemento" id="complemento" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="bairro">Bairro: </label>
                <input type="text" name="bairro" id="bairro" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="cidade">Cidade: </label>
                <input type="text" name="cidade" id="cidade" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="uf">Estado: </label>
                <input type="text" name="uf" id="uf" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>
            <div>
                <label for="login">Login: </label>
                <input type="text" name="login" id="login" placeholder="Digite seu login com 6 caracteres" maxlength="6" onkeypress="return ApenasLetras(event,this);" required/><i class="fa-regular fa-user"></i>
            </div>
            <div>
                <label for="senha">Senha: </label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha com 8 caracteres" maxlength="8" onkeypress="return ApenasLetras(event,this);" 
                    required/><i class="fa-solid fa-lock"></i>
            </div>
            <div>
                <label for="senha1">Login: </label>
                <input type="password" name="senha1" id="senha1" placeholder="Digite sua senha igual a primeira com 8 caracteres" maxlength="8" onkeypress="return ApenasLetras(event,this);" 
                    required/><i class="fa-solid fa-lock"></i>
            </div>            
            <div>
                <input type="submit" value="Enviar">
            </div>

        </fieldset>

    </form>

    <script src="script/validacao.js"></script>
    
</body>
</html>