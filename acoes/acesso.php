<?php
    require("conexao.php");

    Class Acesso{
        private $con = null;

        public function __construct($conexao){ //CONSTRUCT - TODA VEZ QUE ALGUEM CONSTRUIR CAI NELA
            $this->con = $conexao;
        }

        public function send(){
            if(empty($_POST) || $this->con == null){
                echo json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro interno no servidor."));
                return;
            }

            switch(true){
                case (isset($_POST["type"]) && $_POST["type"] == "login" && isset($_POST["login"]) && isset($_POST["senha"])):
                    echo $this->login($_POST["login"], $_POST["senha"]);
                    break;

                case (isset($_POST["type"]) && $_POST["type"] == "cadastro" && isset($_POST["login"]) && isset($_POST["senha"]) && isset($_POST["nome"]) && isset($_POST["cpf"]) 
                    && isset($_POST["nomemae"]) && isset($_POST["datanasc"]) && isset($_POST["email"]) && isset($_POST["celular"]) && isset($_POST["fixo"]) && isset($_POST["sexo"]) 
                    && isset($_POST["cep"]) && isset($_POST["rua"]) && isset($_POST["numero"]) && isset($_POST["complemento"]) && isset($_POST["bairro"]) && isset($_POST["cidade"]) 
                    && isset($_POST["uf"])):
                    echo $this->cadastro($_POST["login"], $_POST["senha"], $_POST["nome"], $_POST["cpf"], $_POST["nomemae"], $_POST["datanasc"], $_POST["email"], $_POST["celular"], 
                    $_POST["fixo"], $_POST["sexo"], $_POST["cep"], $_POST["rua"], $_POST["numero"], $_POST["complemento"], $_POST["bairro"], $_POST["cidade"], $_POST["uf"]);
                    break;
            }
        }

        public function login($login, $senha){
            $conexao = $this->con;
    
            $query = $conexao->prepare("SELECT nome, adm, id FROM usuarios WHERE login = ? AND senha = ?");
            $query->execute(array($login,$senha));

            if($query->rowCount()){
                $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

                session_start();
                $_SESSION["usuario"] = array($user["nome"], $user["adm"], $user["id"]);

                return json_encode(array("erro" => 0));
            }else{
                 return json_encode(array("erro" => 1, "mensagem" => "Login e/ou senha incorretos."));
            }
        }

        public function cadastro($login, $senha, $nome, $cpf, $nomemae, $datanasc, $email, $celular, $fixo, $sexo, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf){
            $conexao = $this->con;

            $query = $conexao->prepare("INSERT INTO usuarios (login, senha, nome, cpf, nomemae, datanasc, email, celular, fixo, sexo, cep, rua, numero, complemento, 
            bairro, cidade, uf) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)");
            
            if($query->execute(array($login, $senha, $nome, $cpf, $nomemae, $datanasc, $email, $celular, $fixo, $sexo, $cep, $rua, $numero, $complemento, $bairro, $cidade, $uf))){
                session_start();
                $_SESSION["usuario"] = array($nome);
                
                return json_encode(array("erro" => 0));
            }else{
                return json_encode(array("erro" => 1, "mensagem" => "Ocorreu um erro ao cadastrar usuario."));
            }
        }
    }
    
    $conexao = new Conexao();
    $classe  = new Acesso($conexao->conectar());
    $classe->send();
?>