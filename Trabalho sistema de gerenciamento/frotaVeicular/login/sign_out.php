<?php

use App\utils\FlashMessages;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    unset($_SESSION['logado']);
    unset($_SESSION['user']);

    FlashMessages::setMessage("Você se desconectou com sucesso.");
    
    header("location: sign_in.php");
?>