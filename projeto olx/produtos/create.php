<?php 
    
    require_once('../src/dao/ProdutoDAO.php');

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];


    $return = ProdutoDAO::create($nome, $preco, $imagem, $descricao, $categoria_id);

    header("location: /produtos/");
?>