<?php 
    namespace App\dao;

    use App\utils\ConnectionFactory;
    use \PDO;
   
    class VeiculoDAO{

        public static function getALL(){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT p.id as id, p.modelo as modelo, p.descricao, p.url_imagem_veiculo, p.preco, p.quilometragem, p.motor, p.ano_fabricacao,
            p.marca_id, c.nome AS marca_nome FROM veiculos p JOIN marcas c ON (p.marca_id = c.id)");             
            $stmt->execute();

            return $stmt;
        }

        public static function getByID($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT p.id as id, p.modelo as modelo, p.descricao, p.url_imagem_veiculo, p.preco, p.quilometragem, p.motor, p.ano_fabricacao,
            p.marca_id, c.nome AS marca_nome FROM veiculos p JOIN marcas c ON (p.marca_id = c.id) WHERE p.id = :id LIMIT 1");

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
            
        }

        public static function getByMarcaId($marca_id){
            
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM veiculos WHERE marca_id = :marca_id");
            $stmt->bindParam(':marca_id', $marca_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;

        }

        public static function create($modelo, $ano_fabricacao, $quilometragem, $preco, $motor, $descricao, $imagem, $marca_id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO veiculos (modelo, ano_fabricacao, quilometragem, preco, motor, descricao, url_imagem_veiculo, marca_id) VALUES 
            (:modelo, :ano_fabricacao, :quilometragem, :preco, :motor, :descricao, :imagem, :marca_id)");
            $stmt->bindParam(':modelo', $modelo, PDO::PARAM_STR);
            $stmt->bindParam(':ano_fabricacao', $ano_fabricacao, PDO::PARAM_STR);
            $stmt->bindParam(':quilometragem', $quilometragem, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':motor', $motor, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':marca_id', $marca_id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt;
        }

        public static function update($id, $modelo, $ano_fabricacao, $quilometragem, $preco, $motor, $descricao, $url_imagem_veiculo, $marca_id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE veiculos SET modelo=:modelo, ano_fabricacao=:ano_fabricacao, quilometragem=:quilometragem, preco=:preco, motor=:motor, 
            descricao=:descricao, url_imagem_veiculo=:url_imagem_veiculo, marca_id=:marca_id WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':modelo', $modelo, PDO::PARAM_STR);
            $stmt->bindParam(':ano_fabricacao', $ano_fabricacao, PDO::PARAM_STR);
            $stmt->bindParam(':quilometragem', $quilometragem, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':motor', $motor, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':url_imagem_veiculo', $url_imagem_veiculo, PDO::PARAM_STR);
            $stmt->bindParam(':marca_id', $marca_id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM veiculos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }
    }

    