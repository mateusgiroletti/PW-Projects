<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\VeiculoDAO;
use App\utils\FlashMessages;
use App\utils\ImageUpload;


$id = $_POST['id'];
$modelo = $_POST['modelo'];
$ano_fabricacao = $_POST['ano_fabricacao'];
$quilometragem = $_POST['quilometragem'];
$preco = $_POST['preco'];
$motor = $_POST['motor'];
$descricao = $_POST['descricao'];
$marca_id = $_POST['marca_id'];

$imageUpload = new ImageUpload();

$imageUpload = new ImageUpload();
$imageUpload->pasta_alvo = "/img/veiculos/";
$imageUpload->nome = $nome; // nome que quer colocar na imagem.
$imageUpload->imagem = $_FILES['imagem']; // direto do form html
$imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

$return = $imageUpload->upload();

if ($return !== true) {
    FlashMessages::setMessage($return, "error");
    header("Location: /veiculos/edit.php?id=$id");
    exit(0);
}

$return = VeiculoDAO::update($id, $modelo, $ano_fabricacao, $quilometragem, $preco, $motor, $descricao, $imageUpload->uri , $marca_id);
FlashMessages::setMessage("Veículo atualizado com sucesso.");
header("location: /veiculos/");

