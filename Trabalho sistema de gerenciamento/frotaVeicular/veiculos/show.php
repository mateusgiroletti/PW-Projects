<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\VeiculoDAO;

$id = $_GET['id'];

$stmt_veic = VeiculoDAO::getByID($id);
$veiculo = $stmt_veic->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <?php include("../partials/_head.php"); ?>

    <title>Mini OLX - Veículos</title>
</head>

<body>
    <div class="container">
        <?php include("../partials/_header.php") ?>
    </div>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>

                <div class="col-md-9 show-veiculo">
                    <h2><?= $veiculo->marca_nome ?> <?= $veiculo->modelo ?>
                        <a href="/veiculos/destroy.php?id=<?= $veiculo->id ?>" class="btn btn-danger float-right" onclick="return confirm('Você realmente excluir o veículo: <?= $row->nome ?>')">Exluir Veículo</a>
                        <a href="/veiculos/edit.php?id=<?= $veiculo->id ?>" class="btn btn-warning float-right">Editar Veículo</a>
                    </h2>

                    <dl>
                        <dt>Preço</dt>
                        <dd>R$ <?= $veiculo->preco ?></dd>

                        <dt>Ano Fabricação</dt>
                        <dd><?= $veiculo->ano_fabricacao ?></dd>

                        <dt>Quilometragem</dt>
                        <dd><?= $veiculo->quilometragem ?> km</dd>

                        <dt>Motor</dt>
                        <dd><?= $veiculo->motor ?></dd>

                        <dt>Imagem</dt>
                        <dd>

                            <?php if (($veiculo->url_imagem_veiculo)) : ?>
                                <img src="<?= $veiculo->url_imagem_veiculo ?>" alt="<?= $veiculo->modelo ?>" />
                            <?php else : ?>
                                <img src="/img/no-image.png" />
                            <?php endif ?>

                        </dd>

                        <dt>Descrição</dt>
                        <dd><?= $veiculo->descricao ?></dd>
                    </dl>

                </div>
            </div>
        </div>
    </section>


    <?php include("../partials/_javascript_import.php"); ?>
</body>

</html>