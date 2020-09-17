<?php
   require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
   require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
   
   use App\dao\ProdutoDAO;

    if(isset($_GET['categoria_id'])){
        $stmt_produtos = ProdutoDAO::getByCategoriaId(($_GET['categoria_id']));

    }else{
        $stmt_produtos = ProdutoDAO::getALL();

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php  include("partials/_head.php"); ?>
    <title>Mini OLX</title>
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
                    <h2>Protudos</h2>

                    <div class="row">
                        <?php while ($produto = $stmt_produtos->fetch(PDO::FETCH_OBJ)) : ?>
 
                        <div class="col-md-4 produto">
                            <div class="border">
                                <h4><?= $produto->nome?></h4>

                                <?php if (($produto->url_imagem_produto)): ?>
                                    <img src="<?= $produto->url_imagem_produto ?>" alt="<?= $produto->nome ?>" />
                                <?php else: ?>
                                    <img src="img/no-image.png" />
                                <?php endif ?>
                                
                                <p><?= substr($produto->descricao, 0, 140) . "..."?></p>
                                <p><a href="/produtos/show.php?id=<?= $produto->id ?>" class="btn btn-success">Ver mais</a></p>
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