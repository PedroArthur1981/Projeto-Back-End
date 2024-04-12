$(function(){
    $("button#btnEntrar").on("click", function(e){
        e.preventDefault();
        
        var campoLogin = $("form#formularioLogin #login").val();
        var campoSenha = $("form#formularioLogin #senha").val();

        if(campoLogin.trim() == "" || campoSenha.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/acesso.php",
                type: "POST",
                data: {
                    type: "login",
                    login: campoLogin,
                    senha: campoSenha
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "autenticacao.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });

    $("button#btnCadastrar").on("click", function(e){
        e.preventDefault();

        var campoLogin = $("form#formularioCadastro #login").val();
        var campoSenha = $("form#formularioCadastro #senha").val();
        var campoCpf = $("form#formularioCadastro #cpf").val();
        var campoNome = $("form#formularioCadastro #nome").val();
        var campoNomemae = $("form#formularioCadastro #nomemae").val();
        var campoDatanasc = $("form#formularioCadastro #datanasc").val();
        var campoEmail = $("form#formularioCadastro #email").val();
        var campoCelular = $("form#formularioCadastro #celular").val();
        var campoFixo = $("form#formularioCadastro #fixo").val();
        var campoSexo = $("form#formularioCadastro #sexo").val();
        var campoCep = $("form#formularioCadastro #cep").val();
        var campoRua = $("form#formularioCadastro #rua").val();
        var campoNumero = $("form#formularioCadastro #numero").val();
        var campoComplemento = $("form#formularioCadastro #complemento").val();
        var campoBairro = $("form#formularioCadastro #bairro").val();
        var campoCidade = $("form#formularioCadastro #cidade").val();
        var campoUf = $("form#formularioCadastro #uf").val();

        if(campoLogin.trim() == "" || campoSenha.trim() == "" || campoCpf.trim() == "" || campoNome.trim() == "" || campoNomemae.trim() == "" || campoDatanasc.trim() == "" || 
           campoEmail.trim() == "" || campoCelular.trim() == "" || campoFixo.trim() == "" || campoSexo.trim() == "" || campoCep.trim() == "" || campoRua.trim() == "" || 
           campoNumero.trim() == "" || campoComplemento.trim() == "" || campoBairro.trim() == "" || campoCidade.trim() == "" || campoUf.trim() == ""){
            $("div#mensagem").show().removeClass("red").html("Preencha todos os campos.");
        }else{
            $.ajax({
                url: "acoes/acesso.php",
                type: "POST",
                data: {
                    type: "cadastro",
                    login: campoLogin,
                    senha: campoSenha,
                    cpf: campoCpf,
                    nome: campoNome,
                    nomemae: campoNomemae,
                    datanasc: campoDatanasc,
                    email: campoEmail,
                    celular: campoCelular,
                    fixo: campoFixo,
                    sexo: campoSexo,
                    cep: campoCep,
                    rua: campoRua,
                    numero: campoNumero,
                    complemento: campoComplemento,
                    bairro: campoBairro,
                    cidade: campoCidade,
                    uf: campoUf
                },

                success: function(retorno){
                    retorno = JSON.parse(retorno);

                    if(retorno["erro"]){
                        $("div#mensagem").show().addClass("red").html(retorno["mensagem"]);
                    }else{
                        window.location = "index.php";
                    }
                },

                error: function(){
                    $("div#mensagem").show().addClass("red").html("Ocorreu um erro durante a solicitação");
                }
            });
        }
    });
});