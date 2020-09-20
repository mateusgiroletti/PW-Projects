<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;
use App\utils\FlashMessages;

$id = $_POST['id'];
$nome = $_POST['nome'];

$return = MarcaDAO::update($id, $nome);

FlashMessages::setMessage("Marca atualizada com sucesso.");
header("location: /marcas/");
