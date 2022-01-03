<?php

session_start();

require("./conecta.php");

$contaLogin = $_POST['conta'];
$senha = $_POST['password'];


if(isset($senha)){
    $conta = mysqli_real_escape_string($conn, $contaLogin); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha2 = mysqli_real_escape_string($conn, $senha);

    function encrypt_decrypt($action, $string) {
        $output = false;
    
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'C583F8BEA66D57EF7032FDEFB9EEE945D38E8FFAED6D3362CB215BE0160F9C71';
        $secret_iv = 'C4361C6C83D5B5E8085550A6EE80F718'; 
    
        $key = hash('sha256', $secret_key);
        
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    
        return $output;
    }

    $password = encrypt_decrypt('encrypt', $senha2);

    //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
    $result_usuario = "SELECT * FROM `tbl_usuarios_site` WHERE `Conta` = '$conta' && `Senha` = '$password' LIMIT 1";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);


    //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário	}
    if (isset($resultado)) {
        $retorno["sucesso"] = true;
		echo json_encode($retorno);
    } else {
        $retorno["sucesso"] = false;
		echo json_encode($retorno);
    }

}