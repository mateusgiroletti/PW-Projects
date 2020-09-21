<?php 
    
    namespace App\dao;

    use App\utils\ConnectionFactory;
    use \PDO;
   
    class UsuarioDAO{

        public static function getALL(){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM usuarios ORDER BY nome ASC");
        
            $stmt->execute();

            return $stmt;
        }

        public static function getByID($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
            
        }

        public static function create($nome, $email, $senha, $cpf, $data_nascimento, $administrador){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO usuarios (nome, email, senha, cpf, data_nascimento, administrador) VALUES 
            (:nome, :email, :senha, :cpf, :data_nascimento, :administrador)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
            $stmt->bindParam(':administrador', $administrador, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }

        public static function update($id, $nome, $email, $senha, $cpf, $data_nascimento, $administrador){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, cpf=:cpf, 
            data_nascimento=:data_nascimento, administrador=:administrador WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->bindParam(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
            $stmt->bindParam(':administrador', $administrador, PDO::PARAM_STR);
        
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
            $stmt->execute();

            return $stmt;
        }

        public static function logar($email){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = :email");
            
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            return $stmt;

        }

        public static function getByEmail($email){
            $con = ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }
    }
