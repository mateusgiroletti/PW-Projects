<?php 
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\dao\MarcaDAO;
    use App\utils\FlashMessages;

    $nome = $_POST['nome'];

    $return = MarcaDAO::create($nome);

    FlashMessages::setMessage("Marca criada com sucesso.");
    header("location: /marcas/");
    
?>