<?php 
    
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use App\dao\VeiculoDAO;
    use App\utils\FlashMessages;
    use App\utils\ImageUpload;

    $log = new Logger('frota-veicular');
    $log->pushHandler(new StreamHandler('../logs/app.log', Logger::WARNING));

    $modelo = $_POST['modelo'];
    $motor = $_POST['motor'];
    $ano_fabricacao = $_POST['ano_fabricacao'];
    $quilometragem = $_POST['quilometragem'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    $marca_id = $_POST['marca_id'];

    $imageUpload = new ImageUpload();

    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = "/img/veiculos/";
    $imageUpload->nome = $modelo; // nome que quer colocar na imagem.
    $imageUpload->imagem = $_FILES['imagem']; // direto do form html
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true){
        
        FlashMessages::setMessage($return, "error");
        $log->warning('#1 - Erro ao validar a imagem');
        $log->error('#2 - Erro ao validar a imagem');
        
        header("Location: /veiculos/new.php");

        exit(0);
    }

    VeiculoDAO::create($modelo, $ano_fabricacao, $quilometragem, $preco, $motor, $descricao, $imageUpload->uri, $marca_id);
    FlashMessages::setMessage("Veículo criado com sucesso.");
    header("location: /veiculos/");