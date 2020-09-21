<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;

$id = $_GET['id'];

$stmt = MarcaDAO::getByID($id);

$marca = $stmt->fetch(PDO::FETCH_OBJ);

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
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>
              
                <div class="col-md-9">
                    <h2>Edição de Marcas</h2>
                    <form action="/marcas/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $marca->id ?>" />
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name="nome" value="<?= $marca->nome ?>" />
                            </div>
                        </div>
                        <input type="submit" value="Atualizar" class="btn btn-success float-right" />
                    </form>

                </div>
            </div>
        </div>
    </section>


    <?php include("../partials/_javascript_import.php"); ?>
</body>

</html>