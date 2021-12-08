    function ativar(e) {
        $("#card1").removeClass("active"),
            $("#card2").removeClass("active"),
            $("#card3").removeClass("active"),
            $("#card4").removeClass("active"),
            $("*#" + e).addClass("active"),
            "card1" == e && ($("#leitor").removeClass("d-none"), $("#parcelas").addClass("d-none"), $("#dados").addClass("d-none"), $("#cartao").addClass("d-none")),
            "card2" == e && ($("#leitor").addClass("d-none"), $("#parcelas").removeClass("d-none"), $("#dados").addClass("d-none"), $("#cartao").addClass("d-none")),
            "card3" == e && ($("#leitor").addClass("d-none"), $("#parcelas").addClass("d-none"), $("#dados").removeClass("d-none"), $("#cartao").addClass("d-none")),
            "card4" == e && ($("#leitor").addClass("d-none"), $("#parcelas").addClass("d-none"), $("#dados").addClass("d-none"), $("#cartao").removeClass("d-none"));
    }
    
    function cidades(e) {
        fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + e + "/distritos")
            .then(function (e) {
                return e.json();
            })
            .then(function (e) {
                let t,
                    n = e.length;
                e.sort(function (e, t) {
                    return e.nome > t.nome ? 1 : t.nome > e.nome ? -1 : 0;
                }),
                    (t += "<option value='' >Cidade...</option>");
                for (let o = 0; o < n; o++) t += "<option value='" + e[o].nome + "'>" + e[o].nome + "</option>";
                $("#cidade").html(t);
            });
    }

    $(document).ready(function () {
        $("#estado").change(function () {
            var e = document.getElementById("estado");
            cidades(e.options[e.selectedIndex].value);
        });
    });

    const options = { method: "GET", mode: "cors", cache: "default" };
    function addplano(e) {
        var t = {
            url: "https://api.123pagou.com.br/terminal/api/leedsite",
            method: "POST",
            timeout: 0,
            data: {
                nome: `${document.getElementById("nome").value}`,
                sobrenome: `${document.getElementById("sobrenome").value}`,
                genero: `${document.getElementById("genero").value}`,
                email: `${document.getElementById("email").value}`,
                telefone: `${document.getElementById("telefone").value}`,
                mensagem: `${document.getElementById("mensagem").value}`,
                horariocontato: `${document.getElementById("horariocontato").value}`,
                meiocontato: `${document.getElementById("meiocontato").value}`,
                estado: `${document.getElementById("estado").value}`,
                cidade: `${document.getElementById("cidade").value}`,
                ajuda: `${document.getElementById("ajuda").value}`,
                permissao: 1,
                status: "pendente",
            },
        };
        $.ajax(t)
            .done(function (e) {
                e.nome && Swal.fire("Dados enviados!", "Em breve entraremos em contato!", "success");
            })
            .fail(function () {
                Swal.fire("Mensagem não enviada!", "tente novamente mais tarde", "error");
            });
    }

    function searchData() {
        fetch("https://api.123pagou.com.br/terminal/api/usuariosestabelecimentos/pontodepagamento")
            .then(function (e) {
                return e.json();
            })
            .then(function (e) {
                let t = e.length,
                    n = "\x3c!-- aqui começa a tabela --\x3e";
                for (let o = 0; o < t; o++)
                    "estabelecimento" == e[o].perfil &&
                        (n +=
                            "<div class='row painel mt-5 mb-5'><div class='col-md-6'>" +
                            e[o].mapsiframe +
                            "</div><div class='col-md-6' id='teste'><h1 id='destaque'>" +
                            e[o].nome +
                            "</h1><div class='row'><div class='col-md-4'><span style='font-size: 10pt;'>Estado:</span><p style='font-size: 16pt;'>" +
                            e[o].uf +
                            "</p></div><div class='col-md-4'><span style='font-size: 10pt;'>Cidade:</span><p style='font-size: 16pt;'>" +
                            e[o].cidade +
                            "</p></div><div class='col-md-4'><span style='font-size: 10pt;'>Bairro:</span><p style='font-size: 16pt;'>" +
                            e[o].bairro +
                            "</p></div></div><div class='row'><div class='col-md-8'><span style='font-size: 10pt;'>Rua:</span><p style='font-size: 16pt;'>" +
                            e[o].rua +
                            "</p></div><div class='col-md-4'><span style='font-size: 10pt;'>Numero:</span><p style='font-size: 16pt;'>" +
                            e[o].numero +
                            "</p></div></div><hr><h6 id='centralizar'>Mais informações:</h6><div class='row' id='centralizar'><div class='ml-2 mr-2'><a href='#'><img src='./src/img/whats.webp' alt=' width='40px'></a></div><div class='ml-2 mr-2'><a href='#'><img src='./src/img/facebook.png' alt=' width='40px'></a></div><div class='ml-2 mr-2'><a href='#'><img src='./src/img/insta.png' alt=' width='40px'></a></div><div class='ml-2 mr-2'><a href='#'><img src='./src/img/google.png' alt=' width='40px'></a></div></div></div></div>");
                $("#lugares").html(n);
            });
    }

    function openNav() {
        "250px" == document.getElementById("mySidenav").style.width ? (document.getElementById("mySidenav").style.width = "0") : (document.getElementById("mySidenav").style.width = "250px");
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function preenche() {
        for (elemento = "<option selected value=''>DDD</option>", i = 11; i <= 99; i++) elemento += `<option value='${i}'>${i}</option>`;
        document.getElementById("ddd").innerHTML = elemento;
    }

    function sizeOfThings() {
        var e = window.innerWidth;
        window.innerHeight;
        e >= 1700 && document.getElementById("muda-grande").setAttribute("class", "container-fluid bg d-flex justify-content-center p-5");
    }

    function simular() {
        let e = document.getElementById("valor_boleto").value,
            t = document.getElementById("Qtdparcelas").value,
            n = (
                e.replace(".", "").replace(",", ".") /
                [
                    0.964041260965969,
                    0.94197437829691,
                    0.931358852565894,
                    0.917599559552212,
                    0.908182726364544,
                    0.895014767743668,
                    0.887626486774365,
                    0.87260034904014,
                    0.861771802826612,
                    0.855505175806314,
                    0.84717045069468,
                    0.835421888053467,
                ][t - 1]
            ).toFixed(2),
            o = (n / t).toFixed(2);
        var a = parseFloat(n),
            s = parseFloat(o),
            d = a.toLocaleString("pt-br", { minimumFractionDigits: 2 }),
            i = s.toLocaleString("pt-br", { minimumFractionDigits: 2 });
        (document.getElementById("valorTotalPagoBoleto").innerHTML = d), (document.getElementById("QuantidadeTotalParcelas").innerHTML = t), (document.getElementById("valorPorParcelas").innerHTML = i);
    }

    function contatoAtendente(e) {
        $.ajax({ type: "POST", data: e.serialize(), url: "./src/js/backend/contatoAtendente.php", assync: !1 }).then(
            function (e) {
                ($sucesso = $.parseJSON(e).sucesso),
                    $sucesso
                        ? (Swal.fire({ position: "center", icon: "success", title: "Contato solicitado, em breve um de nossos atendentes entrará em contato com você.", showConfirmButton: "false", timer: 300000 }),
                          document.querySelector("#contato_atendente").reset())
                        : Swal.fire({ title: "Falha ao solicitar contato.", text: "Verifique os campos e tente novamente", icon: "error", confirmButtonText: "Voltar" });
            },
            function () {
                Swal.fire({ title: "Erro ao solicitar.", text: "Contate nosso suporte.", icon: "error", confirmButtonText: "Voltar" });
            }
        );
    }

    fetch("../estados.json", options)
        .then(function (e) {
            return e.json();
        })
        .then(function (e) {
            let t,
                n = e.length;
            e.sort(function (e, t) {
                return e.nome > t.nome ? 1 : t.nome > e.nome ? -1 : 0;
            }),
                (t += "<option selected>Estado...</option>");
            for (let o = 0; o < n; o++) t += "<option value='" + e[o].sigla + "'>" + e[o].nome + "</option>";
            $("#estado").html(t);
        }),
        $("#novo_contato").submit(function (e) {
            e.preventDefault(),
                Swal.fire({
                    title: "Aguarde...",
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
            addplano($(this));
        }),
        searchData(),
        preenche(),
        $(window).on("scroll", function () {
            $(window).scrollTop()
                ? ($("#nav").addClass("enable"), $("#nav").removeClass("disabled"), $("*#link").addClass("nav-link2"), $("#logo").attr("src", "./src/img/logo-white.png"))
                : ($("#nav").removeClass("enable"), $("#nav").addClass("disabled"), $("*#link").removeClass("nav-link2"), $("#logo").attr("src", "./src/img/logo-orange.png"));
        }),
        sizeOfThings(),
        simular(),
        $("#contato_atendente").submit(function (e) {
            e.preventDefault(),
                Swal.fire({
                    title: "Aguarde...",
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    },
                });
            contatoAtendente($(this));
        });
