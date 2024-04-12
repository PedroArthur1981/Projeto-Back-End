<html>

<head>
    <meta charset="UTF-8" />
    <title>Sistema de acesso</title>
    <link rel="stylesheet" type="text/css" href="style\cadastro.css" />
    <script type="text/javascript" src="script\jquery.js"></script>
    <script type="text/javascript" src="script\acesso.js"></script>
    <script src="https://kit.fontawesome.com/41540e039d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <header>Cadastro</header>

    <div id="mensagem"></div>

    <div id="formulario">
        <form id="formularioCadastro">
            <br>
            <div id="linha">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" onkeydown="ajustaCpf(this)" onkeypress="ajustaCpf(this)" onkeyup="ajustaCpf(this)" onkeypress="return somenteNumeros(event)" maxlength="14" required /><i class="fa-solid fa-id-badge"></i><span id="resposta"></span>
            </div>

            <div id="linha">

                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" minlength="15" maxlength="80" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required /><i class="fa-solid fa-user"></i>
            </div>

            <div id="linha">
                <label for="nomemae">Nome Materno</label>
                <input type="text" name="nome" id="nomemae" minlength="15" maxlength="80" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required /><i class="fa-solid fa-person-dress"></i>
            </div>

            <div id="linha">
                <label for="datanasc">Data de Nascimento</label>
                <input type="text" name="datanasc" id="datanasc" maxlength="10" onkeyup="ajustaData(this)" onkeydown ="ajustaData(this)" onkeypress="ajustaData(this)" required/><i class="fa-solid fa-calendar-days" ></i>
            </div>

            <div id="linha">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" onkeyup="minuscula(this)" onkeydown="minuscula(this)" onkeypress="minuscula(this)" required/><i class="fa-solid fa-envelope"></i>
            </div>

            <div id="linha1">
                <label for="celular">Telefone Celular</label>

                +55<input type="text" name="celular" id="celular" maxlength="15" onkeyup="ajustaCelular(this)" onkeydown="ajustaCelular(this)" onkeypress="ajustaCelular(this)" required/><i class="fa-solid fa-mobile-retro"></i>
            </div>

            <div id="linha2">
                <label for="fixo">Telefone Fixo</label>
                +55<input type="text" name="fixo" id="fixo" maxlength="14" onkeyup="ajustaTelefone(this)" onkeydown="ajustaTelefone(this)" onkeypress="ajustaTelefone(this)" required/><i class="fa-solid fa-phone"></i>
            </div>

            <div id="linha3">
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

            <div id="linha">
                <label for="cep">Cep</label>
                <input type="text" name="cep" id="cep" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="rua">Rua</label>
                <input type="text" name="rua" id="rua" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="numero">Número</label>
                <input type="text" name="numero" id="numero" onkeypress="return somenteNumeros(event)" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="uf">Estado</label>
                <input type="text" name="uf" id="uf" onkeyup="maiuscula(this)" onkeydown="maiuscula(this)" onkeypress="maiuscula(this)" required/><i class="fa-solid fa-map-pin"></i>
            </div>

            <div id="linha">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Digite seu login com 6 caracteres" maxlength="6" onkeypress="return ApenasLetras(event,this);" 
                    required/><i class="fa-regular fa-user"></i>
            </div>

            <div id="linha">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha com 8 caracteres" maxlength="8" onkeypress="return ApenasLetras(event,this);" 
                    required/><i class="fa-solid fa-lock"></i>
            </div>

            <div id="linha">
                <label for="senha1">Repita a sua Senha</label>
                <input type="password" name="senha1" id="senha1" placeholder="Digite sua senha igual a primeira com 8 caracteres" maxlength="8" onkeypress="return ApenasLetras(event,this);" 
                    required/><i class="fa-solid fa-lock"></i>
            </div>

            <div id="button">
                <button id="btnCadastrar">Cadastrar</button>
                <button id="">Limpar</button>
            </div>


        </form>

        <div id="textoLogin">
            <span class="title">Já possui uma conta?</span>
            <span class="subtitle">Acesse agora.</span>
            <button id="btnLogin"> <a href="index.php">Entrar</button>
        </div>

    </div>

    <script src="script/validacao.js"></script>

</body>

</html>