<?php

session_start();

if(isset($_SESSION['conta'])){
    print_r($_SESSION);
} else {
    echo "Sessão expirada, faça login novamente";
}
