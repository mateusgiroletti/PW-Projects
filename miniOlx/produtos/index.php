<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\ProdutoDAO;

    $stmt = ProdutoDAO::getALL();

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
            <?php include("../partials/_flash_messages.php") ?>
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Cadastro de produtos <a href="/produtos/new.php" class="btn btn-info float-right">Novo Produto</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Categoria</th>
                            <th>Ações</th>
                        </tr>

                        <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                            <tr>
                                <td><?= $row->id?></td>
                                <td>
                                <?php if (($row->url_imagem_produto)) : ?>
                                    <img src="<?= $row->url_imagem_produto ?>" alt="<?= $row->nome ?>" />
                                <?php else : ?>
                                    <img src="/img/no-image.png" />
                                <?php endif ?>
                                </td>
                                <td><?= $row->nome?></td>
                                <td>R$ <?= $row->preco?></td>
                                <td><?= $row->categoria_nome?></td>
                                <td>
                                    <a href="/produtos/show.php?id=<?= $row->id?>" class="btn btn-sm btn-info">Mostrar</a>
                                    <a href="/produtos/edit.php?id=<?= $row->id?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/produtos/destroy.php?id=<?= $row->id?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente excluir o produto: <?= $row->nome?>')">Excluir</a>
                            </tr>

                        <?php endwhile ?>

                    </table>



                </div>
            </div>
        </div>
    </section>


    <?php include("../partials/_javascript_import.php"); ?>
</body>

</html>