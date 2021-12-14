<?php

session_start();

if(isset($_SESSION['conta'])){
    print_r($_SESSION);
    //Conteúdo da página principal
} else {
    // echo "Sessão expirada, faça login novamente";
    $_SESSION['loginErro'] = "Sessão expirada, faça login novamente!";
    //Aqui vai voltar pra tela de login
    header("Location: http://localhost/SecretInvestClub/index.php");
}
