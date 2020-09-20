<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;

$stmt = MarcaDAO::getALL();

$erro = isset($_GET['erro']) ? $_GET['erro'] : null;

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
                    <h2>Cadastro de Veículos</h2>
                    <form action="/veiculos/create.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="modelo" name="modelo" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="motor" class="col-sm-2 col-form-label">Motor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="motor" name="motor" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ano_fabricacao" class="col-sm-2 col-form-label">Ano Fabricação</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="ano_fabricacao" name="ano_fabricacao" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quilometragem" class="col-sm-2 col-form-label">Quilometragem</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quilometragem" name="quilometragem" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="preco" name="preco" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marca" class="col-sm-2 col-form-label">Marca</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="marca" name="marca_id">
                                    <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                                        <option value="<?= $row->id ?>"><?= $row->nome ?></option>
                                    <?php endwhile ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagem" class="col-sm-2 col-form-label">Imagem</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="imagem" name="imagem" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <textarea name="descricao" id="descricao" rows="15"></textarea>
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