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
?>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style/dashboard.css" />
    <link rel="stylesheet" type="text/css" href="style/alterar_senha.css" />
    <title>Dashboard - <?php echo $nome; ?></title>
    <?php
    if ($adm) {
    ?>
        <script type="text/javascript" src="script\jquery.js"></script>
        <script type="text/javascript" src="script\excluirUsuario.js"></script>
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
                        <li><a type="button" onclick="openModal()">Alterar Senha Usuário</a>
                            <div id="myModal" class="modal">
                                <div class="modal-content">
                                    <span onclick="closeModal()" style="cursor: pointer; float: right;">&times;</span>
                                    <h2>Alterar Senha</h2>
                                    <form method="post" action="alterar_senha.php">
                                    <label for="login">Login:</label>
                                    <input type="text" name="login" required>

                                    <label for="senha">Senha Antiga:</label>
                                    <input type="password" name="senha" required>

                                    <label for="senha1">Nova Senha:</label>
                                    <input type="password" name="senha1" required>

                                    <input type="submit" name="btnAlterar" value="Alterar Senha">
                                </form>
                            </div>
                            </div>
                            <script src="script/alterar_senha.js"></script>
                        </li>
                        <li><a href="visualizar.php">Alterar Cadastro Usuário</a></li>
                        <li><a href="cadastrar.php">Cadastrar Usuário </a></li>
                        <li><a href="consulta.php">Consultar cadastro Usuário</a></li>
                        <li><a href="gerarpdf_lista.php">Gerar PDF Lista de Usuários</a></li>
                        <li><a href="modelobanco.php">Modelo do Banco de Dados</a></li>

                </ul>
            </div>

            <div id="tabelaUsuarios">
                <span class="title">Lista de usuários</span>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Login</td>
                            <td>Senha</td>
                            <td>Nome</td>
                            <td>Email</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = $conexao->prepare("SELECT id, login, senha, nome, email FROM usuarios WHERE id != ?");
                        $query->execute(array($id));

                        $users = $query->fetchAll(PDO::FETCH_ASSOC);

                        for ($i = 0; $i < sizeof($users); $i++) :
                            $usuarioAtual = $users[$i];
                        ?>
                            <tr>
                                <td><?php echo $usuarioAtual["id"]; ?></td>
                                <td><?php echo $usuarioAtual["login"]; ?></td>
                                <td><?php echo $usuarioAtual["senha"]; ?></td>
                                <td><?php echo $usuarioAtual["nome"]; ?></td>
                                <td><?php echo $usuarioAtual["email"]; ?></td>
                                <td><button class="excluir" idUsuario="<?php echo $usuarioAtual["id"]; ?>">Excluir</button></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
        <?php if ($adm == 0) : ?>
            <div id="subheader">
                <ul>
                    <php if ($adm==0) : ?>
                        <ul>
                             <php if ($adm==0) : ?>
                                <li>
                                    <a type="button" onclick="openModal()">Alterar senha</a>
                                    
                                </li>
                        </ul>

                        <!-- Button to trigger modal -->
                        <!--<button type="button" onclick="openModal()">ALTERAR SENHA</button> --> 

                        <!-- Modal -->
                        <div id="myModal" class="modal">
                            <div class="modal-content">
                                <span onclick="closeModal()" style="cursor: pointer; float: right;">&times;</span>
                                <h2>Alterar Senha</h2>
                                <form method="post" action="alterar_senha.php">
                                    <label for="login">Login:</label>
                                    <input type="text" name="login" required>

                                    <label for="senha">Senha Antiga:</label>
                                    <input type="password" name="senha" required>

                                    <label for="senha1">Nova Senha:</label>
                                    <input type="password" name="senha1" required>

                                    <input type="submit" name="btnAlterar" value="Alterar Senha">
                                </form>
                            </div>
                        </div>

                        <script src="script/alterar_senha.js"></script>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>


</html>