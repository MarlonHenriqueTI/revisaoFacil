$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });
});

function FormataCnpj(campo, teclapres) {
    var tecla = teclapres.keyCode;
    var vr = new String(campo.value);
    vr = vr.replace(".", "");
    vr = vr.replace("/", "");
    vr = vr.replace("-", "");
    tam = vr.length + 1;
    if (tecla != 14) {
        if (tam == 3)
            campo.value = vr.substr(0, 2) + '.';
        if (tam == 6)
            campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 5) + '.';
        if (tam == 10)
            campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/';
        if (tam == 15)
            campo.value = vr.substr(0, 2) + '.' + vr.substr(2, 3) + '.' + vr.substr(6, 3) + '/' + vr.substr(9, 4) + '-' + vr.substr(13, 2);
    }
}



function validarCNPJ(cnpj) {

    cnpj = cnpj.replace(/[^\d]+/g, '');

    if (cnpj == '') return false;

    if (cnpj.length != 14)
        return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
        return false;

    return true;

}

function validarnumero(numero, validacao) {
    var continuar = document.getElementById('botao-continuar')
    if (numero == validacao) {
        continuar.disabled = false;
        continuar.style.backgroundColor = "#fbdb1f";
    } else {
        continuar.disabled = true;
        continuar.style.backgroundColor = "#a0a6ab";
    }
}


function validarCampos() {
    var continuar = document.getElementById('botao-continuar');
    var isento = document.getElementById('flexCheckChecked');
    var ie = document.getElementById('ie');
    if ((ie.value != "") || (isento.checked == true)) {
        continuar.disabled = false;
        continuar.style.backgroundColor = "#fbdb1f";
    } else {
        continuar.disabled = true;
        continuar.style.backgroundColor = "#a0a6ab";
    }

}

function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function limpa_formulário_cep_entrega() {
    //Limpa valores do formulário de cep.
    document.getElementById('rua_entrega').value = ("");
    document.getElementById('bairro_entrega').value = ("");
    document.getElementById('cidade_entrega').value = ("");
    document.getElementById('uf_entrega').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function meu_callback_entrega(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('rua_entrega').value = (conteudo.logradouro);
        document.getElementById('bairro_entrega').value = (conteudo.bairro);
        document.getElementById('cidade_entrega').value = (conteudo.localidade);
        document.getElementById('uf_entrega').value = (conteudo.uf);
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep_entrega();
        alert("CEP não encontrado.");
    }
}


function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            document.getElementById('cep').value = cep.substring(0, 5)
                + "-"
                + cep.substring(5);

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

function pesquisacepentrega(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            document.getElementById('cep_entrega').value = cep.substring(0, 5)
                + "-"
                + cep.substring(5);

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('rua_entrega').value = "...";
            document.getElementById('bairro_entrega').value = "...";
            document.getElementById('cidade_entrega').value = "...";
            document.getElementById('uf_entrega').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback_entrega';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep_entrega();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep_entrega();
    }
};

$(document).ready(function () {
    $('.celular').mask('(00)00000-0000');
    $('.telefone').mask('(00)0000-0000');
    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00');
});


function validarInformacoes() {
    var continuar = document.getElementById('botao-continuar-completo');
    var isento = document.getElementById('flexCheckChecked');
    if (isento.checked == true) {
        continuar.disabled = false;
        continuar.style.backgroundColor = "#fbdb1f";
    } else {
        continuar.disabled = true;
        continuar.style.backgroundColor = "#a0a6ab";
    }

}

/* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function validarCPF() {
    var RegraValida = document.getElementById("cpf").value;
    cpf = RegraValida.replace(/[^\d]+/g, '');
    if (cpf == '') return false;
    // Elimina CPFs invalidos conhecidos    
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999") {
        alert("CPF Inválido, preencha com um cpf válido.");
        document.getElementById("cpf").value = "";
        return false;
    }
    // Valida 1o digito 
    add = 0;
    for (i = 0; i < 9; i++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9))) {
        alert("CPF Inválido, preencha com um cpf válido.");
        document.getElementById("cpf").value = "";
        return false;
    }
    // Valida 2o digito 
    add = 0;
    for (i = 0; i < 10; i++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10))) {
        alert("CPF Inválido, preencha com um cpf válido.");
        document.getElementById("cpf").value = "";
        return false;
    }
    return true;
}

function exibirEnderecoEntrega() {
    var campo = document.getElementById('oculto-endereco');
    var chk = document.getElementById('chk-endereco');
    if (chk.checked == true) {
        campo.style.display = "block";
    } else {
        campo.style.display = "none";
    }
}

function confirmarEnvio() {
    var form = document.getElementById('formulario-cadastro-rapido');
    var confirma = document.getElementById('mensagem-confirma');
    setTimeout(function () {
        confirma.style.display = "block";
    }, 1000);
    setTimeout(function () {
        confirma.style.display = "none";
    }, 4000);
    setTimeout(setTimeout(function () {
        form.submit();
    }, 5000));
}

function validarCamposCadastroRapido() {
    var continuar = document.getElementById('botao-continuar');
    var nome = document.getElementById('nome');
    var cpf = document.getElementById('cpf');
    var celular = document.getElementById('celular');
    var email = document.getElementById('email');
    var sobrenome = document.getElementById('sobrenome');
    var cep = document.getElementById('cep');
    if ((nome.value != "") && (cpf.value != "") && (celular.value != "") && (email.value != "") && (sobrenome.value != "") && (cep.value != "")) {
        continuar.disabled = false;
        continuar.style.backgroundColor = "#fbdb1f";
    } else {
        continuar.disabled = true;
        continuar.style.backgroundColor = "#a0a6ab";
    }

}

$(document).ready(function () {


    if ($('.bbb_viewed_slider').length) {
        var viewedSlider = $('.bbb_viewed_slider');

        viewedSlider.owlCarousel(
            {
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 6000,
                nav: true,
                dots: true,
                responsive:
                {
                    0: { items: 1 },
                    575: { items: 2 },
                    768: { items: 3 },
                    991: { items: 4 },
                    1199: { items: 4 }
                }
            });

        if ($('.bbb_viewed_prev').length) {
            var prev = $('.bbb_viewed_prev');
            prev.on('click', function () {
                viewedSlider.trigger('prev.owl.carousel');
            });
        }

        if ($('.bbb_viewed_next').length) {
            var next = $('.bbb_viewed_next');
            next.on('click', function () {
                viewedSlider.trigger('next.owl.carousel');
            });
        }
    }


});


$(document).ready(function () {
    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
    });
});


function changeImage(element) {
    var main_prodcut_image = document.getElementById('main_product_image');
    var video = document.getElementById('video-produto');
    video.style.display = "none";
    main_prodcut_image.src = element.src;
    main_prodcut_image.style.display = "block";
}

function mudarParaVideo(link) {
    var main_prodcut_image = document.getElementById('main_product_image');
    var video = document.getElementById('video-produto');
    main_prodcut_image.style.display = "none";
    video.style.display = "block";
}

//Constrói a URL depois que o DOM estiver pronto
document.addEventListener("DOMContentLoaded", function () {
    //altera a URL do botão
    document.getElementById("facebook-share-btt").href = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);
}, false);



function deletar(id, tabela) {
    if (confirm("Tem certeza que deseja remover este registro? Esta ação não tem volta.")) {
        window.location.href = "http://piloto.revisaofacil.com.br/functions.php?deletar=sim&id=" + id + "&tabela=" + tabela;
    }
}

$(function () {
    $('select').selectpicker();
});

function adicionarCarrinho(id) {
    $.ajax({
        url: "adicionar-carrinho.php",
        method: "POST",
        data: {
            id: id,
        },
        success: function () {
            alert('Produto adicionado ao carrinho');
            window.location.href="http://piloto.revisaofacil.com.br/carrinho.php";
        },
        error: function (data) {
            alert("Ocorreu um erro ao adicionar o produto ao carrinho." + JSON.stringify(data));
        }
    });
}

function mudarQuantidade(id, quantidade) {
    $.ajax({
        url: "alterar-quantidade.php",
        method: "POST",
        data: {
            id: id,
            quantidade: quantidade
        },
        success: function () {
            console.log('Nova quantidade '+quantidade);
            $("#total").load(location.href + " #total");
        },
        error: function (data) {
            alert("Erro" + JSON.stringify(data));
        }
    });
}

function excluirCarrinho(id) {
    $.ajax({
        url: "excluir-carrinho.php",
        method: "POST",
        data: {
            id: id
        },
        success: function (data) {
            console.log('produto excluido'+ data);
            $("#carrinho-produtos").load(location.href + " #carrinho-produtos");
            $("#total").load(location.href + " #total");
        },
        error: function (data) {
            alert("Erro" + JSON.stringify(data));
        }
    });
}