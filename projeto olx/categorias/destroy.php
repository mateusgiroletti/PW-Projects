<?php 
    require_once('../src/dao/CategoriaDAO.php');
    
    $id = $_GET['id'];

    $return = CategoriaDAO::delete($id);

    header("location: /categorias/");
?>