<?php 
    
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;
    use App\utils\ImageUpload;

    $log = new Logger('miniolx-log');
    $log->pushHandler(new StreamHandler('../logs/app.log', Logger::WARNING));

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $categoria_id = $_POST['categoria_id'];

    $imageUpload = new ImageUpload();

    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = "/img/produtos/";
    $imageUpload->nome = $nome; // nome que quer colocar na imagem.
    $imageUpload->imagem = $_FILES['imagem']; // direto do form html
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true){
        
        FlashMessages::setMessage($return, "error");
        $log->warning('#1 - Erro ao validar a imagem');
        $log->error('#2 - Erro ao validar a imagem');
        
        header("Location: /produtos/new.php");

        exit(0);
    }

    ProdutoDAO::create($nome, $preco, $imageUpload->uri, $descricao, $categoria_id);
    FlashMessages::setMessage("Produto criado com sucesso.");
    header("location: /produtos/");
