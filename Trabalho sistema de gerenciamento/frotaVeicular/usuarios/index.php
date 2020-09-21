<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\UsuarioDAO;

$stmt = UsuarioDAO::getALL();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include("../partials/_head.php"); ?>

    <title>Frota Veicular - Usuários</title>
</head>

<body>
    <div class="container">
        <?php include("../partials/_header.php") ?>
    </div>

    <section id="content">
        <div class="container">
            <?php include("../partials/_flash_messages.php") ?>
            <div class="row">

                <div class="col-md-12">
                    <h2>Usuários <a href="/usuarios/new.php" class="btn btn-info float-right">Novo usuário</a></h2>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Data Nascimento</th>
                            <th>Ações</th>
                        </tr>

                        <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->nome ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->cpf ?></td>
                                <td><?= $row->data_nascimento ?></td>
                                <td>
                                    <a href="/usuarios/edit.php?id=<?= $row->id ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/usuarios/destroy.php?id=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente excluir o usuário: <?= $row->nome ?>')">Excluir</a>
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