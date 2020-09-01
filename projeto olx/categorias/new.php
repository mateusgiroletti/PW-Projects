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
                <aside class="col-md-3">
                    <h2>Categorias</h2>
                    <ul>
                        <li><a href="">Imóveis</a></li>
                        <li><a href="">Carros</a></li>
                        <li><a href="">Caminhões</a></li>
                        <li><a href="">Móveis</a></li>
                    </ul>
                </aside>

                <div class="col-md-9">
                    <h2>Cadastro de Categorias</h2>
                    <form action="/categorias/create.php" method="POST"> 
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name="nome" />
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