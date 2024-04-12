<?php
    Class Conexao{
        public $server = "127.0.0.1";
        public $usuario = "root";
        public $senha = "";
        public $banco = "acessar";

        public function conectar(){
            try{
                $conexao = new PDO("mysql:host=$this->server;dbname=$this->banco", $this->usuario, $this->senha);
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $erro){
                $conexao = null;
            }

            return $conexao;
        }
    };   
?>