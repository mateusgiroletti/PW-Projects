<?php 
    require_once('../src/dao/ProdutoDAO.php');
    require_once('../src/utils/ImageUpload.php');


    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    $imageUpload = new ImageUpload();

    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = "/img/produtos/";
    $imageUpload->nome = $nome; // nome que quer colocar na imagem.
    $imageUpload->imagem = $_FILES['imagem']; // direto do form html
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true){
        header("Location: /produtos/edit.php?id=$id&erro=" . implode("; ", $return));
        exit(0);
    }

    $return = produtoDAO::update($id, $nome, $preco, $imageUpload->uri, $descricao, $categoria_id);

    header("location: /produtos/");
