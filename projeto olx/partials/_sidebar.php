<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/dao/CategoriaDAO.php');

    $stmt_sidebar_categoria = CategoriaDAO::getALL();

?>


<aside class="col-md-3">
    <h2>Categorias</h2>
    <ul>
        <?php while ($categoria = $stmt_sidebar_categoria->fetch(PDO::FETCH_OBJ)) : ?>
            <li><a href="/?categoria_id=<?= $categoria->id ?>"><?= $categoria->nome ?></a></li>
        <?php endwhile ?>
    </ul>
</aside>