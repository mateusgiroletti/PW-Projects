<?php 
    require_once('../src/dao/CategoriaDAO.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $return = CategoriaDAO::update($id, $nome);

    header("location: /categorias/");
