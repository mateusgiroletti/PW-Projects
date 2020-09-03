<?php
    require_once('../src/dao/CategoriaDAO.php');

    $stmt = CategoriaDAO::getALL();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include("../partials/_head.php"); ?>

    <title>Mini OLX - Categrias</title>
</head>

<body>
    <div class="container">
        <?php include("../partials/_header.php") ?>
    </div>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Cadastro de Categorias <a href="/categorias/new.php" class="btn btn-info float-right">Nova Categoria</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>

                        <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                            <tr>
                                <td><?= $row->id?></td>
                                <td><?= $row->nome?></td>
                                <td>
                                    <a href="/categorias/edit.php?id=<?= $row->id?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/categorias/destroy.php?id=<?= $row->id?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente excluir a categoria: <?= $row->nome?>')">Excluir</a>
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