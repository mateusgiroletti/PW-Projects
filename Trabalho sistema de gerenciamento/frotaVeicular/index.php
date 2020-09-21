<?php

use App\utils\FlashMessages;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!$_SESSION['logado']) {
    FlashMessages::setMessage("você precisa estar logado para executar essa ação", "error");
    header("location: login/sign_in.php");
    exit(0);
}

use App\dao\VeiculoDAO;

if (isset($_GET['marca_id'])) {
    $stmt_veiculos = VeiculoDAO::getByMarcaId(($_GET['marca_id']));
} else {
    $stmt_veiculos = VeiculoDAO::getALL();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("partials/_head.php"); ?>
    <title>Frota Veicular</title>
</head>

<body>
    <div class="container">
        <?php include("partials/_header.php") ?>
    </div>

    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("partials/_sidebar.php") ?>
                
                <div class="col-md-9">
                    <h2>Veículos</h2>
                    
                    <div class="row">
                        <?php while ($veiculo = $stmt_veiculos->fetch(PDO::FETCH_OBJ)) : ?>

                            <div class="col-md-4 veiculo">
                                <div class="border">
                                    <h4><?= $veiculo->nome ?></h4>

                                    <?php if (($veiculo->url_imagem_veiculo)) : ?>
                                        <img src="<?= $veiculo->url_imagem_veiculo ?>" alt="<?= $veiculo->modelo ?>" />
                                    <?php else : ?>
                                        <img src="img/no-image.png" />
                                    <?php endif ?>
                                    Ano de Frabricação: <?= $veiculo->ano_fabricacao ?>
                                    Preço: R$ <?= $veiculo->preco ?>
                                    <p><?= substr($veiculo->descricao, 0, 140) . "..." ?></p>
                                    <p><a href="/veiculos/show.php?id=<?= $veiculo->id ?>" class="btn btn-success">Ver mais</a></p>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("partials/_javascript_import.php"); ?>

</body>

</html>