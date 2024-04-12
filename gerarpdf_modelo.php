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
//$query_usuarios = "SELECT id, nome, email FROM usuarios";

// Prepara a QUERY
//$result_usuarios = $conexao->prepare($query_usuarios);

// Executar a QUERY
//$result_usuarios->execute();



// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<link rel='stylesheet' href=http://localhost/login9/style/custom.css";
//$dados .= "<title>Gerar PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Modelo de Banco de Dados</h1>";

// Ler os registros retornado do BD
//while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    //extract($row_usuario);
    //$dados .= "ID: $id <br>";
    //$dados .= "Nome: $nome <br>";
    //$dados .= "E-mail: $email <br>";
    //$dados .= "<hr>";
//}


$dados .= "<img src='http://localhost/login9/image/tabela.jpeg'><br>";
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
