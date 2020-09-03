<?php 
    require_once('../src/dao/ProdutoDAO.php');
    
    $id = $_GET['id'];

    $return = ProdutoDAO::delete($id);

    header("location: /produtos/");
?>