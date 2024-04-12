<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("acoes/conexao.php");


    $id   = $_SESSION["usuario"][2];
    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'index.php'</script>";
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/consulta.css" />
    <title>Consulta - <?php echo $nome; ?></title>
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
                        <li><a href="cadastrar.php">Cadastrar Usuário </a></li>
                        <li><a href="consulta.php">Consultar cadastro Usuário</a></li>
                        <li><a href="dashboard.php">Listar Usuário</a></li>
                        <li><a href="gerarpdf_modelo.php">Gerar PDF do Modelo de banco de dados</a></li>
                </ul>
            </div>]
        <?php endif; ?>
    </div>
    <center>
        <img src="image\tabela.jpeg" alt="some text" width=360 height=550 >   
    </center>
                     
</body>

</html>