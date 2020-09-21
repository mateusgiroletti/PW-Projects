<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\UsuarioDAO;
use App\utils\FlashMessages;

$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = UsuarioDAO::logar($email);

$user = $stmt->fetch(PDO::FETCH_OBJ);

if ($user) {
    if (password_verify($senha, $user->senha)) {
        $_SESSION['user'] = $email;
        $_SESSION['logado'] = true;
        header("location: ../index.php");
    } else {
        FlashMessages::setMessage("Senha errada!", "error");
        header("location: /login/sign_in.php");
    }
} else {
    FlashMessages::setMessage("Email desconhecido!", "error");
    header("location: /login/sign_in.php");
    exit(0);
}
