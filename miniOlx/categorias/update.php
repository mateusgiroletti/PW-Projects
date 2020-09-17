<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\CategoriaDAO;

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $return = CategoriaDAO::update($id, $nome);

    header("location: /categorias/");
