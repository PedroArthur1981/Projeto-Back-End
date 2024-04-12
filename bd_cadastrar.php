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

if (isset($_POST['cpf']))
{
    $cpf = $_POST['cpf'];
}
else
{
    $cpf = "Sem CPF";
}
if (isset($_POST['nome']))
{
    $nome = $_POST['nome'];
}
else
{
    $nome = "Sem nome";
}
if (isset($_POST['nomemae']))
{
    $nomemae = $_POST['nomemae'];
}
else
{
    $nomemae = "Sem nome";
}
if (isset($_POST['datanasc']))
{
    $datanasc = $_POST['datanasc'];
}
else
{
    $datanasc = "0000-00-00";
}
if (isset($_POST['email']))
{
    $email = $_POST['email'];
}
else
{
    $email = "Sem E-MAIL";
}
if (isset($_POST['celular']))
{
    $celular = $_POST['celular'];
}
else
{
    $celular = "Sem número de telefone";
}
if (isset($_POST['fixo']))
{
    $fixo = $_POST['fixo'];
}
else
{
    $fixo = "Sem número de telefone";
}
if (isset($_POST['sexo']))
{
    $sexo = $_POST['sexo'];
}
else
{
    $sexo = "Sem sexo";
}
if (isset($_POST['cep']))
{
    $cep = $_POST['cep'];
}
else
{
    $cep = "Sem CEP";
}
if (isset($_POST['rua']))
{
    $rua = $_POST['rua'];
}
else
{
    $rua = "Sem rua";
}
if (isset($_POST['numero']))
{
    $numero = $_POST['numero'];
}
else
{
    $numero = "Sem número da rua";
}
if (isset($_POST['complemento']))
{
    $complemento = $_POST['complemento'];
}
else
{
    $complemento = "Sem complemento";
}
if (isset($_POST['bairro']))
{
    $bairro = $_POST['bairro'];
}
else
{
    $bairro = "Sem bairro";
}
if (isset($_POST['cidade']))
{
    $cidade = $_POST['cidade'];
}
else
{
    $cidade = "Sem cidade";
}
if (isset($_POST['uf']))
{
    $uf = $_POST['uf'];
}
else
{
    $uf = "Sem estado";
}
if (isset($_POST['login']))
{
    $uf = $_POST['login'];
}
else
{
    $uf = "Sem login";
}
if (isset($_POST['senha']))
{
    $uf = $_POST['senha'];
}
else
{
    $uf = "Sem senha";
}


/*if (isset($_FILES))
{
    if($_FILES['foto']['name'] == '')
    {
        $caminho_arquivo = "Sem foto";
    }
    else
    {
        $diretorio = 'fotos/';
        $nome_arquivo = date('Y-m-d_His').$_FILES['foto']['name'];

        $caminho_arquivo = $diretorio.$nome_arquivo;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'],$caminho_arquivo))
            echo "Erro ao mover o arquivo";
    }
}
else
{
    $caminho_arquivo = "Sem foto";
}*/


//Inserindo dados na tabela cliente - Modo INOUT

try
{
    $query = $conexao->prepare ("INSERT INTO usuarios (cpf, nome, nomemae, datanasc, email, celular, fixo, cep, rua, numero, complemento, 
        bairro, cidade, uf, login, senha) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
    $query->bindParam(1,$cpf,PDO::PARAM_STR);
    $query->bindParam(2,$nome,PDO::PARAM_STR);
    $query->bindParam(3,$nomemae,PDO::PARAM_STR);
    $query->bindParam(4,$datanasc,PDO::PARAM_STR);
    $query->bindParam(5,$email,PDO::PARAM_STR);
    $query->bindParam(6,$celular,PDO::PARAM_STR);
    $query->bindParam(7,$fixo,PDO::PARAM_STR);
    $query->bindParam(8,$cep,PDO::PARAM_STR);
    $query->bindParam(9,$rua,PDO::PARAM_STR);
    $query->bindParam(10,$numero,PDO::PARAM_STR);
    $query->bindParam(11,$complemento,PDO::PARAM_STR);
    $query->bindParam(12,$bairro,PDO::PARAM_STR);
    $query->bindParam(13,$cidade,PDO::PARAM_STR);
    $query->bindParam(14,$uf,PDO::PARAM_STR);
    $query->bindParam(15,$login,PDO::PARAM_INT);
    $query->bindParam(16,$senha,PDO::PARAM_INT);
    $query->execute();
    header('Location: cadastrar.php?erro=0');
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    header('Location: cadastrar.php?erro=1');
}

?>
