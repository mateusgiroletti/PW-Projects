<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\UsuarioDAO;
use App\utils\FlashMessages;

$id = $_GET['id'];

$return = UsuarioDAO::delete($id);

FlashMessages::setMessage("Usuário excluido com sucesso.");
header("location: /usuarios/");
