<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/utils/ConnectionFactory.php');
   
    class ProdutoDAO{

        public static function getALL(){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT p.id as id, p.nome as nome, p.descricao, p.url_imagem_produto, p.preco, p.categoria_id, c.nome AS categoria_nome FROM produtos p JOIN categorias c ON (p.categoria_id = c.id)");        
            $stmt->execute();

            return $stmt;
        }

        public static function getByID($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT p.id as id, p.nome as nome, p.descricao, p.url_imagem_produto, p.preco, p.categoria_id, c.nome AS categoria_nome FROM produtos p JOIN categorias c ON (p.categoria_id = c.id) WHERE p.id = :id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
            
        }

        public static function create($nome, $preco, $imagem, $descricao, $categoria_id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO produtos (nome, preco, url_imagem_produto, descricao, categoria_id) VALUES (:nome, :preco, :imagem, :descricao, :categoria_id)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt;
        }

        public static function update($id, $nome, $preco, $imagem, $descricao, $categoria_id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE produtos SET nome=:nome, descricao=:descricao, url_imagem_produto=:imagem, preco=:preco, descricao=:descricao, categoria_id=:categoria_id WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':imagem', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM produtos WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }
    }

    