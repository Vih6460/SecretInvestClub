<?php
session_start();
require("./conecta.php");
$emailLogin = $_POST['email'];
$senhalogin = $_POST['senha'];

//O campo usuário e senha preenchido entra no if para validar
if ((isset($emailLogin)) && (isset($senhalogin))) {
	$usuario = mysqli_real_escape_string($conn, $emailLogin); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
	$senha = mysqli_real_escape_string($conn, $senhalogin);

    
	//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
	$result_usuario = "SELECT * FROM `login` WHERE email = '$usuario' && password = '$password' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$resultado = mysqli_fetch_assoc($resultado_usuario);
	//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário	}
	
    
if (isset($resultado)) {
		$status =  $resultado['status'];
	
		
		if ($status == '2') {
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['cpf'] = $resultado['cpf'];
                $_SESSION['email'] = $resultado['email']; 
                $_SESSION['nome'] = $resultado['nome'];   
                $_SESSION['sobrenome'] = $resultado['sobrenome'];  
                $_SESSION['whatsapp'] = $resultado['whatsapp'];  
                $_SESSION['perfil'] = $resultado['perfil'];
                $_SESSION['status'] = $resultado['status'];
                $_SESSION['statusCadastro'] = $resultado['statusCadastro']; 
                $_SESSION['nivelAcesso'] = $resultado['nivelAcesso'];

			if ($_SESSION['perfil'] == "admin") {
			//header("Location: http://localhost/atendimento/views/dashboard/");
			header("Location: https://123pagou.com.br/portal/atendimento/views/contato-site/index.php");
			}else{
			     $_SESSION['loginErro'] = "Perfil sem acesso!";
			header("Location: https://123pagou.com.br/portal/atendimento/login.php");
           //header("Location: https://123pagou.com.br/portal/atendimento/login.php");
			}
           
		} else {
            $_SESSION['loginErro'] = "Não Atorizado";
			//header("Location: http://localhost/atendimento/login.php");
           header("Location: https://123pagou.com.br/portal/atendimento/login.php");
        }
	} else {
		$_SESSION['loginErro'] = "Usuario ou senha nao localizados!";
		//header("Location: http://localhost/atendimento/login.php");
        header("Location: https://123pagou.com.br/portal/atendimento/login.php");
	}
} else {
	$_SESSION['loginErro'] = "Sistema em manutenção, tente mais tarde!";
	//header("Location: http://localhost/atendimento/login.php");
	header("Location: https://123pagou.com.br/portal/atendimento/login.php");
}