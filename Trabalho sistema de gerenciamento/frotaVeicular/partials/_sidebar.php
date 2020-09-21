<?php
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\dao\MarcaDAO;

$stmt_sidebar_marca = MarcaDAO::getALL();

?>

<aside class="col-md-3">
    <h2>Marcas</h2>
    <ul class="nav flex-column">
        <?php while ($marca_sidebar = $stmt_sidebar_marca->fetch(PDO::FETCH_OBJ)) : ?>
            <li class="nav-item">
                <a class="nav-link active" href="/?marca_id=<?= $marca_sidebar->id ?>"><?= $marca_sidebar->nome ?></a>
            </li>
        <?php endwhile ?>
    </ul>
</aside>