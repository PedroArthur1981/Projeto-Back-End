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

// Carregar o Composer
require './vendor/autoload.php';

// Incluir conexao com BD
include_once 'acoes/conexao.php';

// QUERY para recuperar os registros do banco de dados
$query_usuarios = "SELECT id, cpf, nome, nomemae, datanasc, email, celular, fixo, sexo, cep, rua, numero, complemento, bairro, cidade,
    uf FROM usuarios";

// Prepara a QUERY
$result_usuarios = $conexao->prepare($query_usuarios);

// Executar a QUERY
$result_usuarios->execute();

$dados = "<img src='http://localhost/login9/image/usuarios.jpg'><br>";

// Informacoes para o PDF
$dados .= "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href=http://localhost/login9/style/custom.css";
//$dados .= "<title>Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Listar de Usuários do Banco de Dados</h1>";

// Ler os registros retornado do BD
while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_usuario);
    $dados .= "ID: $id <br>";
    $dados .= "CPF: $cpf <br>";
    $dados .= "Nome: $nome <br>";
    $dados .= "Nome Materno: $nomemae <br>";
    $dados .= "Data de nascimento: $datanasc <br>";
    $dados .= "E-mail: $email <br>";
    $dados .= "Telefone Celular: $celular <br>";
    $dados .= "Telefone Fixo: $fixo <br>";
    $dados .= "Sexo: $sexo <br>";
    $dados .= "CEP: $cep <br>";
    $dados .= "Rua: $rua <br>";
    $dados .= "Número: $numero <br>";
    $dados .= "Complemento: $complemento <br>";
    $dados .= "Bairro: $bairro <br>";
    $dados .= "Cidade: $cidade <br>";
    $dados .= "Estado: $uf <br>";
    $dados .= "<hr>";
}

$dados .= "</body>";


// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
