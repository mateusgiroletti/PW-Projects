<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\CategoriaDAO;
    
    $id = $_GET['id'];

    $return = CategoriaDAO::delete($id);

    header("location: /categorias/");
