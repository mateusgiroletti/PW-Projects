<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;

$stmt = MarcaDAO::getALL();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include("../partials/_head.php"); ?>

    <title>Frota Veicular - Marcas</title>
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
                    <h2>Cadastro de Marcas <a href="/marcas/new.php" class="btn btn-info float-right">Nova Marca</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>

                        <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->nome ?></td>
                                <td>
                                    <a href="/marcas/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/marcas/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente excluir a marca: <?= $row->nome ?>')">Excluir</a>
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