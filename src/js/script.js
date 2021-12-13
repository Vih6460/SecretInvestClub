function cadastrarUsuario(e) {
    $.ajax({ type: "POST", data: e.serialize(), url: "./src/backend/cadastroUsuario.php", assync: !1 }).then(
        function (e) {
            ($sucesso = $.parseJSON(e).sucesso),
                $sucesso
                    ? (Swal.fire({ title: "Usuário cadastrado com sucesso! Em breve o seu acesso será ativado.", icon: "success", position: "center", showConfirmButton: "false", timer: 10000 }),
                      document.querySelector("#form_cadastro").reset())
                    : Swal.fire({ title: "Falha ao realizar cadastro.", text: "Verifique os campos e tente novamente", icon: "error", confirmButtonText: "Voltar", position: "center" });
        },
        function () {
            Swal.fire({ title: "Erro ao realizar cadastro.", text: "Contate nosso suporte.", icon: "error", confirmButtonText: "Voltar", position: "center" });
        }
    );
}

$("#form_cadastro").submit(function (e) {
    e.preventDefault(),

    Swal.fire({
        title: "Aguarde...",
        onBeforeOpen: () => {
            Swal.showLoading();
        },
    });

    cadastrarUsuario($(this));
});
