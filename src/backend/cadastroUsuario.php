<?php


  require_once('../../conecta.php');

  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senha2 = $_POST['senha2'];


  $sql = "SELECT * FROM `tbl_usuarios_site` WHERE Email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // while ($row = $result->fetch_array()) {

    //   if($row['statusCadastro'] != 'AGUARDANDO-CADASTRO'){
    //     header("Location: https://123pagou.com.br/portal/atendimento/app/sucesso-documento.php");
    //   }

    // }
    echo 'Usuário já cadastrado';
  }else{
    // header("Location: https://123pagou.com.br/portal/atendimento/app/sucesso-documento.php");
    

    if($senha != $senha2){
        
        echo 'Senhas não correspondem';
        
    } else{

        try{
            $query = "INSERT INTO `tbl_usuarios_site`(`Nome`, `Sobrenome`, `Email`, `Senha`) VALUES ('$nome','$sobrenome','$email','$senha')";
            $salvounobanco = mysqli_query($conn, $query);  
            
            if ($salvounobanco) {
               
                mysqli_close($conn);
                // header("Location: https://123pagou.com.br/portal/atendimento/app/dataNascimento.php?codigo=$updateLead");
                echo 'Usuário cadastrado com sucesso';
          
            } else {
                //header("Location: https://123pagou.com.br/portal/atendimento/app/nomesobrenome.php?error=1");
                echo 'Erro ao salvar no banco de dados';
            }
        } catch(Exception $e){
            echo "<p>(!) {$e->getMessage()}</p>";
        }

      
    }



  }

      
      
