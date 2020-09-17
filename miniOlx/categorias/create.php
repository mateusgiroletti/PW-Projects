<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\CategoriaDAO;

    $nome = $_POST['nome'];

    $return = CategoriaDAO::create($nome);

    header("location: /categorias/");
?>