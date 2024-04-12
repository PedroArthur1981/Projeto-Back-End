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

///////AÇÕES DO BOTÃO PESQUISAR ###################################
if (isset($_POST['pesquisar'])) {

    if ($_POST['login']) {
        $query = "SELECT * FROM usuarios WHERE login=:login";
        $select = $conexao->prepare($query);
        $select->bindParam(":login", $_POST['login'], PDO::PARAM_STR);
        $select->execute();
        if ($select->rowCount() != 0) {
            $row = $select->fetch(PDO::FETCH_ASSOC);
        } else {
            $query = "SELECT * FROM usuarios";
            $select = $conexao->prepare($query);
            $select->execute();
            $rows = $select->fetchAll(PDO::FETCH_ASSOC);
        }
    }
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
                        <li><a href="dashboard.php">Listar Usuário</a></li>
                        <li><a href="modelobanco.php">Modelo do Banco de Dados</a></li>
                </ul>
            </div>


            <div id="tabelaUsuarios">
                <span class="title">Digite o Login que deseja pequisar</span>
                <form id="formularioCadastro" method="post">
                    <div id="linha">
                        <label>Login</label>
                        <input type="text" name="login" placeholder="Digite o login do usuário">
                        <br />
                        <br />
                        <div id="button">
                            <button name="pesquisar">PESQUISAR</button>
                        </div>
                        <br />
                        <br />
                    </div>
                    <div id="lista">
                        <fieldset>
                            <legend>Usuário:</legend>
                            <br>
                            <?php
                            if (isset($_POST['pesquisar'])) {
                                //fazer a pesquisa quando não encontrar pois esta com este erro.

                                if (isset($row)) {
                                    if ($row != false) {

                                        echo "ID: " . $row['id'] . "<br/>" . "Login: " . $row['login']  . "<br/>" . "Senha: " . $row['senha'] . "<br/>" . "CPF: " . $row['cpf'] . "<br/> " .
                                            "Nome: " . $row['nome'] . "<br/>" . "Nome Materno: " . $row['nomemae'] . "<br/>" . "Data de nascimento: " . $row['datanasc'] . "<br/>" .
                                            "Email: " . $row['email'] . "<br/>" . "Telefone Celular: " . $row['celular'] . "<br/>" . "Telefone Fixo: " . $row['fixo'] . "<br/>" . "Sexo: " . $row['sexo'] .
                                            "<br/>" . "CEP: " . $row['cep'] . "<br/>" . "Rua: " . $row['rua'] . "<br/>" . "Número: " . $row['numero'] . "<br/>" .  "Complemento: " . $row['complemento'] .
                                            "<br/>" . "Bairro: " . $row['bairro'] . "<br/>" . "Cidade: " . $row['cidade'] . "<br/>" . "Estado: " . $row['uf'] . "<br/>";
                                    }
                                } else {

                                    if (isset($rows)) {

                                        foreach ($rows as $usuarios) {

                                            echo "ID: " . $usuarios['id'] . "<br/>" . "Login: " . $usuarios['login'] . "<br/>" . "Senha: " . $usuarios['senha'] . "<br/>" . "CPF: " . $usuarios['cpf'] .
                                                "<br/>" . "Nome: " . $usuarios['nome'] . "<br/>" . "Nome Materno: " . $usuarios['nomemae'] . "<br/>" . "Data de nascimento: " . $usuarios['datanasc'] . "<br/>" .
                                                "Email: " . $usuarios['email'] . "<br/>" . "Telefone Celular: " . $usuarios['celular'] . "<br/>" . "Telefone Fixo: " . $usuarios['fixo'] . "<br/>" .
                                                "Sexo: " . $usuarios['sexo'] . "<br/>" . "CEP: " . $usuarios['cep'] . "<br/>" . "Rua: " . $usuarios['rua'] . "<br/>" . "Número: " . $usuarios['numero'] . "<br/>" .
                                                "Complemento: " . $usuarios['complemento'] . "<br/>" . "Bairro: " . $usuarios['bairro'] . "<br/>" . "Cidade: " . $usuarios['cidade'] . "<br/>" .
                                                "Estado: " . $usuarios['uf'] . "<br/>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </fieldset>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>