<?php
 
  $senha = 'diamante';

  function encrypt_decrypt($action, $string) {
    $output = false;
  
    $encrypt_method = "AES-256-CBC";
    // $secret_key = 'sadgjakgdkjafkj';
    // $secret_iv = 'This is my secret iv'; 
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
  $senha_descriptografada = encrypt_decrypt('decrypt', $senha_criptografada);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h3>Senha: <?php echo $senha ?></h3>
  <h3>Senha Criptografada: <?php echo $senha_criptografada; ?></h3>
  <h3>Senha Descriptografada: <?php echo $senha_descriptografada ?></h3>
</body>
</html>