<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;
use App\dao\VeiculoDAO;

$id = $_GET['id'];

$stmt_mac = MarcaDAO::getALL();

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
            <?php include("../partials/_flash_messages.php") ?>
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>

                <div class="col-md-9">
                    <h2>Edição de Veículos</h2>
                    <form action="/veiculos/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $veiculo->id ?>">
                        <div class="form-group row">
                            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= $veiculo->modelo ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="motor" class="col-sm-2 col-form-label">Motor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="motor" name="motor" value="<?= $veiculo->motor ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ano_fabricacao" class="col-sm-2 col-form-label">Ano Fabricação</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ano_fabricacao" name="ano_fabricacao" value="<?= $veiculo->ano_fabricacao ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quilometragem" class="col-sm-2 col-form-label">Quilometragem</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quilometragem" name="quilometragem" value="<?= $veiculo->quilometragem ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="preco" name="preco" value="<?= $veiculo->preco ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="marca" name="marca_id">
                                    <?php while ($marca = $stmt_mac->fetch(PDO::FETCH_OBJ)) : ?>
                                        <option <?= ($veiculo->marca_id == $marca->id) ? "selected" : "" ?> value="<?= $marca->id ?>"><?= $marca->nome ?></option>
                                    <?php endwhile ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="imagem" name="imagem" />
                                <br>
                                <?php if (($veiculo->url_imagem_veiculo)) : ?>
                                    <img src="<?= $veiculo->url_imagem_veiculo ?>" alt="<?= $veiculo->modelo ?>" />
                                <?php else : ?>
                                    <img src="/img/no-image.png" />
                                <?php endif ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea name="descricao" id="descricao" rows="15"><?= $veiculo->descricao ?></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Cadastrar" class="btn btn-info float-right" />
                    </form>

                </div>
            </div>
        </div>
    </section>


    <?php include("../partials/_javascript_import.php"); ?>
</body>

</html>