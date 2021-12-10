<?php

  require_once('../../conecta.php');

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $conta = $_POST['conta'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senha2 = $_POST['senha2'];


  $sql = "SELECT * FROM `tbl_usuarios_site` WHERE Conta = '$conta'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // while ($row = $result->fetch_array()) {
    //   if($row['statusCadastro'] != 'AGUARDANDO-CADASTRO'){
    //     header("Location: https://123pagou.com.br/portal/atendimento/app/sucesso-documento.php");
    //   }
    // }

    echo 'Nº de conta já cadastrado'; //Redirecionar para uma tela informando que a conta ja esta cadastrada
  }else{
    // header("Location: https://123pagou.com.br/portal/atendimento/app/sucesso-documento.php");

    if($senha != $senha2){
        echo 'Senhas não correspondem'; //Redirecionar para uma tela informando que as senha não correspondem
        
    } else{

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

        $senha_criptografada = encrypt_decrypt('encrypt', $senha);

        try{
            $query = "INSERT INTO `tbl_usuarios_site`(`Nome`, `Sobrenome`, `Conta`, `Email`, `Senha`, `Status`) VALUES ('$nome', '$sobrenome', '$conta', '$email', '$senha_criptografada', 'AGUARDANDO LIBERACAO')";
            $salvounobanco = mysqli_query($conn, $query);  
            
            if ($salvounobanco) {
                mysqli_close($conn);
                // header("Location: https://123pagou.com.br/portal/atendimento/app/dataNascimento.php?codigo=$updateLead");
                echo 'Usuário cadastrado com sucesso';
                //Redirecionar para página principal
                header("Location: https://www.google.com.br");
          
            } else {
                //header("Location: https://123pagou.com.br/portal/atendimento/app/nomesobrenome.php?error=1");
                echo 'Erro ao salvar no banco de dados';

            }
        } catch(Exception $e){
            echo "<p>(!) {$e->getMessage()}</p>";
        }
      
    }
  }