<?php
	session_start();
	session_destroy();
	session_start();

	require("./conecta.php");

	$contaLogin = $_POST['conta'];
	$senhalogin = $_POST['senha'];

	//O campo usuário e senha preenchido entra no if para validar
	if ((isset($contaLogin)) && (isset($senhalogin))) {
		$conta = mysqli_real_escape_string($conn, $contaLogin); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conn, $senhalogin);

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

		$password = encrypt_decrypt('encrypt', $senha);
		
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM `tbl_usuarios_site` WHERE `Conta` = '$conta' && `Senha` = '$password' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário	}
		
		
		if (isset($resultado)) {
			$_SESSION['id'] = $resultado['Id'];
			$_SESSION['nome'] = $resultado['Nome'];
			$_SESSION['sobrenome'] = $resultado['Sobrenome']; 
			$_SESSION['conta'] = $resultado['Conta'];   
			$_SESSION['email'] = $resultado['Email'];  
			$_SESSION['status'] = $resultado['Status'];  
			$_SESSION['criado'] = $resultado['Criado'];
			$_SESSION['modificado'] = $resultado['Modificado'];

			if ($_SESSION['status'] != "AGUARDANDO LIBERACAO") {
				//header("Location: http://localhost/atendimento/views/dashboard/");
				// header("Location: https://123pagou.com.br/portal/atendimento/views/contato-site/index.php");

				// foreach ($_SESSION as $key => $value) { 
				// 	echo $key." => ".$value."<br/>";
				// }
				// echo "<br/>Usuário logado com sucesso";
				print_r($_SESSION);
				header("Location: ./valida2.php");

			} else {
				$_SESSION['loginErro'] = "Aguardando liberação de acesso!";
				// header("Location: http://localhost/SecretInvestClub/index.php");
				echo $_SESSION['loginErro'];
				//Aqui vai voltar pra tela de login
			}
			
		} else {
			$_SESSION['loginErro'] = "Usuario ou senha nao localizados!";
			// header("Location: http://localhost/SecretInvestClub/index.php");
			echo $_SESSION['loginErro'];
			//Aqui vai voltar pra tela de login
		}

	} else {
		$_SESSION['loginErro'] = "Sistema em manutenção, tente mais tarde!";
		// header("Location: http://localhost/SecretInvestClub/index.php");
		echo $_SESSION;
		//Aqui vai voltar pra tela de login
	}