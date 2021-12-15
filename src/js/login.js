//Primeiro jeito acho melhor pois tenho resposta não apenas se a requisicao deu certo, como também se a resposta do backend se deu certo

function login(e) {
    $.ajax({ type: "POST", data: e.serialize(), url: "./src/backend/valida.php"}).then(
        function (e) {
            ($sucesso = $.parseJSON(e).sucesso),
            ($msgErro = $.parseJSON(e).erroLogin),
            // console.log($msgErro),
                $sucesso
                    ? (window.location.href = "./views/dashboard.php")     
                    : (Swal.fire({ title: "Falha ao realizar login.", text: "Verifique os campos e tente novamente", icon: "error", confirmButtonText: "Voltar", position: "center" }),
                        document.getElementById("txtMensagemErro").textContent = $msgErro,
                        document.getElementById("mensagemErro").style.display = "block");
        },
        function () {
            Swal.fire({ title: "Erro ao realizar cadastro.", text: "Contate nosso suporte.", icon: "error", confirmButtonText: "Voltar", position: "center" });
            document.getElementById("txtMensagemErro").textContent = "",
            document.getElementById("mensagemErro").style.display = "none";
        }
    );
}


$("#formLogin").submit(function (e) {
    e.preventDefault(),
    
    Swal.fire({
        title: "Aguarde...",
        onBeforeOpen: () => {
            Swal.showLoading();
        },
    });
    login($(this));
});

// function login() {
//     var t = {
//         url: "./src/backend/cadastroUsuario.php",
//         method: "POST",
//         timeout: 0,
//         data: {
//             nome:       `${document.getElementById("nome").value}`,
//             sobrenome:  `${document.getElementById("sobrenome").value}`,
//             conta:      `${document.getElementById("conta").value}`,
//             email:      `${document.getElementById("email").value}`,
//             senha:      `${document.getElementById("senha").value}`,
//             senha2:     `${document.getElementById("senha2").value}`,
//         },
//     };
//     $.ajax(t)
//         .done(function () {
//             Swal.fire("Cadastro realizado com sucesso!", "Em breve entraremos em contato!", "success");
//             document.getElementById("nome").value = "";
//             inputNome = document.getElementById("nome");
//             inputNome.setAttribute('value', input.value);
//             document.getElementById("sobrenome").value = "";
//             inputSobrenome = document.getElementById("sobrenome");
//             inputSobrenome.setAttribute('value', input.value);
//             document.getElementById("conta").value = "";
//             inputConta = document.getElementById("conta");
//             inputConta.setAttribute('value', input.value);
//             document.getElementById("email").value = "";
//             inputEmail = document.getElementById("email");
//             inputEmail.setAttribute('value', input.value);
//             document.getElementById("senha").value = "";
//             inputSenha = document.getElementById("senha");
//             inputSenha.setAttribute('value', input.value);
//             document.getElementById("senha2").value = "";
//             inputSenha2 = document.getElementById("senha2");
//             inputSenha2.setAttribute('value', input.value);
//         })
//         .fail(function () {
//             Swal.fire("Erro ao realizar cadastro.", "Contate nosso suporte.", "error");
//         });
// }
