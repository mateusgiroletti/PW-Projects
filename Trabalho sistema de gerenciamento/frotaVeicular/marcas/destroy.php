<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;
use App\utils\FlashMessages;

$id = $_GET['id'];

$return = MarcaDAO::delete($id);

FlashMessages::setMessage("Marca excluida com sucesso.");
header("location: /marcas/");
