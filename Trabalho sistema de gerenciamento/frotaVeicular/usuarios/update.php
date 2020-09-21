<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\UsuarioDAO;
use App\utils\FlashMessages;

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];
$administrador = $_POST['administrador'];

$hashed_password = password_hash($senha, PASSWORD_DEFAULT);

$return = UsuarioDAO::update($id, $nome, $email, $hashed_password, $cpf, $data_nascimento, $administrador);

FlashMessages::setMessage("Usuário atualizado com sucesso.");
header("location: /usuarios/");
