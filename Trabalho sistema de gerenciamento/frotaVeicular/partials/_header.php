<?php

use App\dao\UsuarioDAO;

$stmt_user_header = UsuarioDAO::getByEmail($_SESSION['user']);

$user_header = $stmt_user_header->fetch(PDO::FETCH_OBJ);

$user_adm = $user_header->administrador;

?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Frota Veicular</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/veiculos">Veículos<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/marcas">Marcas</a>
            </li>
            <?php if ($user_adm == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/usuarios">Usuários</a>
                </li>
            <?php endif ?>
        </ul>
        <input type="submit" value="Sair" class="btn" onclick="window.location.href='../login/sign_out.php'" />
    </div>
</nav>