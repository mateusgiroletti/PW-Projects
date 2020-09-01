<?php 
    require_once('../src/dao/CategoriaDAO.php');

    $nome = $_POST['nome'];

    $return = CategoriaDAO::create($nome);

    header("location: /categorias/");
?>