<?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/utils/ConnectionFactory.php');
   
    class CategoriaDAO{

        public static function getALL(){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM categorias ORDER BY nome ASC");
        
            $stmt->execute();

            return $stmt;
        }

        public static function getByID($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM categorias WHERE id = :id LIMIT 1");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
            
        }

        public static function create($categoria){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
            $stmt->bindParam(':nome', $categoria, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }

        public static function update($id, $nome){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE categorias SET nome=:nome WHERE id = :id");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM categorias WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }
    }
