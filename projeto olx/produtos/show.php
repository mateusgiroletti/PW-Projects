<?php
    require_once('../src/dao/CategoriaDAO.php');
    require_once('../src/dao/ProdutoDAO.php');

    $id = $_GET['id'];

    $stmt_cat = CategoriaDAO::getALL($id);

    $stmt_prod = ProdutoDAO::getByID($id);
    $produto = $stmt_prod->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include("../partials/_head.php"); ?>

    <title>Mini OLX - Produtos</title>
</head>

<body>
    <div class="container">
        <?php include("../partials/_header.php") ?>
    </div>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>
                
                <div class="col-md-9 show-produto">
                    <h2><?= $produto->nome ?> 
                    <a href="/produtos/destroy.php?id=<?= $produto->id ?>" class="btn btn-danger float-right" onclick="return confirm('Você realmente excluir o produto: <?= $row->nome?>')">Exluir Produto</a>
                    <a href="/produtos/edit.php?id=<?= $produto->id ?>" class="btn btn-warning float-right">Editar Produto</a>
                    </h2>

                    <dl>
                        <dt>Preço</dt>
                        <dd><?= $produto->nome ?></dd>
                        
                        <dt>Categoria</dt>
                        <dd><?= $produto->categoria_nome ?></dd>
                    
                        <dt>Imagem</dt>
                        <dd>

                            <?php if (($produto->url_imagem_produto)): ?>
                                <img src="<?= $produto->url_imagem_produto ?>" alt="<?= $produto->nome ?>" />
                            <?php else: ?>
                                    <img src="/img/no-image.png" />
                            <?php endif ?>

                        </dd>

                        <dt>Descrição</dt>
                        <dd><?= $produto->descricao ?></dd>
                    </dl>

                </div>
            </div>
        </div>
    </section>


    <?php include("../partials/_javascript_import.php"); ?>
</body>

</html>