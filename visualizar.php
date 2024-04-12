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
if (isset($_GET['erro'])) {
    $erro = $_GET['erro'];
}


/** Visualização dos dados  */

$resultado = $conexao->query("SELECT id, cpf, nome, nomemae, datanasc, email, celular, fixo, sexo, cep, rua, numero, complemento, bairro, cidade,
uf, id FROM usuarios;");

/** Para verificar a quantidade de registros retornados  */
$quantidade = $resultado->rowCount();

?>

<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style/visualizar.css" />
    
    <title>Alterar Cadastro - <?php echo $nome; ?></title>
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
                        <li><a href="cadastrar.php">Cadastrar Usuário </a></li>
                        <li><a href="consulta.php">Consultar cadastro</a></li>
                        <li><a href="dashboard.php">Listar usuários</a></li>
                        <li><a href="modelobanco.php">Modelo do Banco de Dados</a></li>
                        
                </ul>
            </div>     
        <?php endif; ?>
    </div>   
    <div id="tabelaUsuarios">
        <span class="title">Lista de usuários</span>
        <table>
            <thead>
                <?php if ($quantidade > 0) : ?>
                    <tr>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Ação</td>
                    </tr>
                    <?php else : ?>
                        <p>Não há registros cadastrados!</p>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php while ($item = $resultado->fetch(PDO::FETCH_OBJ)) : ?>
                    <tr>
                        <td><?php echo $item->nome; ?></td>
                        <td><?php echo $item->email; ?></td>
                        <td><a href="alterar.php?id=<?php echo $item->id; ?>">EDITAR</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
         
</body>

</html>