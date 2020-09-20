<?php 
    
    namespace App\dao;

    use App\utils\ConnectionFactory;
    use \PDO;
   
    class MarcaDAO{

        public static function getALL(){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM marcas ORDER BY nome ASC");
        
            $stmt->execute();

            return $stmt;
        }

        public static function getByID($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM marcas WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
            
        }

        public static function create($marca){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO marcas (nome) VALUES (:nome)");
            $stmt->bindParam(':nome', $marca, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }

        public static function update($id, $nome){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE marcas SET nome=:nome WHERE id = :id");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM marcas WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }
    }
