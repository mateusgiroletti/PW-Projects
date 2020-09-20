<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';


use App\dao\VeiculoDAO;
use App\utils\FlashMessages;

$id = $_GET['id'];

$return = VeiculoDAO::delete($id);
FlashMessages::setMessage("Veículo excluido com sucesso");
header("location: /veiculos/");
