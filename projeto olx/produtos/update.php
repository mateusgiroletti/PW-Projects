<?php 
    require_once('../src/dao/ProdutoDAO.php');

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $url_imagem = $_POST['imagem'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];


    $return = produtoDAO::update($id, $nome, $preco, $url_imagem, $descricao, $categoria_id);

    header("location: /produtos/");
