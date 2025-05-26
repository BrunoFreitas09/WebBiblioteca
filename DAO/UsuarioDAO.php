<?php
    namespace App\DAO;

    use App\Model\Login;

    final class LoginDAO extends DAO
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function save (Login $model): Login
        {
            return ($model->Id == null) ? $this->insert($model) :
            $this->update($model);
        }

        public function insert (Login $model): Login
        {
            $sql = "INSERT INTO Login (nome, email, senha) VALUES (?, ?, ?)";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->Email);
            $stmt->bindValue(3, $model->Senha);
            $stmt->Execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        public function update(Login $model): Login
        {
             $sql = "UPDATE Login SET nome=?, email=?, senha=? WHERE id=?";

             $stmt = parent::$conexao->prepare($sql);
             $stmt->bindValue(1, $model->Nome);
             $stmt->bindValue(2, $model->Email);
             $stmt->bindValue(3, $model->Senha);
             $stmt->bindValue(4, $model->Id);
             $stmt->Execute();

             return $model;
        }

        public function selectById(int $id) : ?Login
        {
            $sql="SELECT * FROM Logins WHERE id=?";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("App\Model\Login")
        }
        /**
         * metódo que retorna todos os registros da tabela Login no 
         * banco de dados
         */
        public function select() : array 
        {
            $sql = "SELECT * FROM Login ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            //retorna um array com as linhas retornadas da consulta.Observe que 
            //o Array é um array de objetos. Os objetos são dos tipos de um stdClass e 
            //foram criados automaticamente pelo método FetchAlldo PDO
            return $stmt->fethcAll(DAO:: FETCH_CLASS, "App\Model\Login") 
        }    
        /**
         * Remove um registro da tabela pessoa do banco de dados.
         * Note que o metódo exige um parâmentro $id do tipo inteiro 
         */
        public function delete(int $id) : bool
        {
            $sql = "DELETE FROM Login WHERE id=? ";

            $stmt = parent::$conexao->($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        }
    }

?>