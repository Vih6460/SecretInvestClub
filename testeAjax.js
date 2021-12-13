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
