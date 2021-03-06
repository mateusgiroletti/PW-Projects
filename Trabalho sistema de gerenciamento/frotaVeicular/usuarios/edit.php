<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\UsuarioDAO;

$id = $_GET['id'];

$stmt = UsuarioDAO::getByID($id);

$usuario = $stmt->fetch(PDO::FETCH_OBJ);

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
            <div class="row">
                <div class="col-md-12">
                    <h2>Edição de Usuários</h2>
                    <form action="/usuarios/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $usuario->id ?>" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email" class="col-sm-6 col-form-label">Email:</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $usuario->email ?>">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="senha" class="col-sm-6 col-form-label">Senha:</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="nome" class="col-sm-6 col-form-label">Nome Completo:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario->nome ?>">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cpf" class="col-sm-6 col-form-label">CPF:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $usuario->cpf ?>">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="data_nascimento" class="col-sm-6 col-form-label">Data Nascimento:</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $usuario->data_nascimento ?>">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="administrador" class="col-sm-6 col-form-label">Administrador:</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="administrador" name="administrador">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-info float-right">Editar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <?php include("../partials/_javascript_import.php"); ?>
</body>

</html>