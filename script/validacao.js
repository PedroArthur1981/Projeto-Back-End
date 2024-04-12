function CPF() { "user_strict"; function r(r) { for (var t = null, n = 0; 9 > n; ++n)t += r.toString().charAt(n) * (10 - n); var i = t % 11; return i = 2 > i ? 0 : 11 - i } function t(r) { for (var t = null, n = 0; 10 > n; ++n)t += r.toString().charAt(n) * (11 - n); var i = t % 11; return i = 2 > i ? 0 : 11 - i } var n = "CPF Inválido", i = "CPF Válido"; this.gera = function () { for (var n = "", i = 0; 9 > i; ++i)n += Math.floor(9 * Math.random()) + ""; var o = r(n), a = n + "-" + o + t(n + "" + o); return a }, this.valida = function (o) { for (var a = o.replace(/\D/g, ""), u = a.substring(0, 9), f = a.substring(9, 11), v = 0; 10 > v; v++)if ("" + u + f == "" + v + v + v + v + v + v + v + v + v + v + v) return n; var c = r(u), e = t(u + "" + c); return f.toString() === c.toString() + e.toString() ? i : n } }



var CPF = new CPF();
//document.write(CPF.valida("123.456.789-00"));

//document.write("<br> Utilizando o proprio gerador da lib<br><br><br>");
for (var i = 0; i < 1; i++) {
    var temp_cpf = CPF.gera();
    console.log(temp_cpf + " = " + CPF.valida(temp_cpf) + "<br>");
}

$("#cpf").keypress(function () {
    $("#resposta").html(CPF.valida($(this).val()));
});

$("#cpf").blur(function () {
    $("#resposta").html(CPF.valida($(this).val()));
});

function ajustaCpf(v) {
    v.value = v.value.replace(/\D/g, "");
    //Adiciona ponto após os três primeiros números
    v.value = v.value.replace(/^(\d{3})(\d)/, "$1.$2");
    //Adiciona ponto após os seis primeiros números
    v.value = v.value.replace(/(\d{3})(\d)/, "$1.$2");
    //Adiciona o hífen antes dos últimos 2 caracteres
    v.value = v.value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
}

function ajustaTelefone(v) {
    v.value = v.value.replace(/\D/g, "");
    // Adiciona parênteses no DDD
    v.value = v.value.replace(/^(\d{2})(\d)/g, "($1) $2");
    // Adiciona hífen no número do telefone
    v.value = v.value.replace(/(\d{3,4})(\d)/, "$1-$2");
}

function ajustaCelular(v) {
    
    v.value = v.value.replace(/\D/g, "");
    // Adiciona parênteses no DDD
    v.value = v.value.replace(/^(\d{2})(\d)/g, "($1) $2");
    // Adiciona hífen no número do telefone
    v.value = v.value.replace(/(\d{4,5})(\d)/, "$1-$2");
}

$(document).ready(function () {
    $("input[name=cep]").blur(function () {
        var cep = $(this)
            .val()
            .replace(/[^0-9]/, "");
        if (cep) {
            var url = "https://viacep.com.br/ws/" + cep + "/json/";
            $.ajax({
                url: url,
                dataType: "jsonp",
                contentType: "application/json",
                success: function (json) {
                    if (json.logradouro) {
                        $("input[name=rua]").val(json.logradouro);
                        $("input[name=bairro]").val(json.bairro);
                        $("input[name=cidade]").val(json.localidade);
                        $("input[name=uf]").val(json.uf);

                    }
                },
            });
        }
    });
});



$("#searchForm").on("submit", function (event) {
    // Stop form from submitting normally
    event.preventDefault();
    var cep = $("#campo")
        .val()
        .replace(/[^0-9]/, "");
    if (cep) {
        var url = "https://viacep.com.br/ws/" + cep + "/json/";
        $.ajax({
            url: url,
            dataType: "json",
            contentType: "application/json",
            success: function (json) {
                if (json.logradouro) {
                    // Put the results in a div
                    $("#result").empty().append(json.logradouro);
                }
            },
        });
    }
});

function minuscula(texto) {
    texto.value = texto.value.toLowerCase();
}

function maiuscula(texto) {
    texto.value = texto.value.toUpperCase();

}

function ApenasLetras(e, t) {
    try {
        if (window.event) {
            var charCode = window.event.keyCode;
        } else if (e) {
            var charCode = e.which;
        } else {
            return true;
        }
        if (
            (charCode > 64 && charCode < 91) ||
            (charCode > 96 && charCode < 123) ||
            (charCode > 191 && charCode <= 255) // letras com acentos
        ) {
            return true;
        } else {
            return false;
        }
    } catch (err) {
        alert(err.Description);
    }
}

function ajustaData(v) {
    v.value = v.value.replace(/\D/g, "");
    // Adiciona a barra entre o dia e o mês
    v.value = v.value.replace(/^(\d{2})(\d)/, "$1/$2");
    // Adiciona a barra entre o mês e o ano
    v.value = v.value.replace(/(\d{2})(\d)/, "$1/$2");
}

function somenteNumeros(e) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace   
    // charCode 9 = tab
    if (charCode != 8 && charCode != 9) {
        // charCode 48 equivale a 0   
        // charCode 57 equivale a 9
        if (charCode < 48 || charCode > 57) {
            return false;
        }
    }
}

