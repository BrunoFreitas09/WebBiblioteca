<?php
    namespace App\DAO;

    use App\Model\Autor;

    final class AutorDAO extends DAO
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function save (Autor $model): Autor
        {
            return ($model->Id == null) ? $this->insert($model) :
            $this->update($model);
        }

        public function insert (Autor $model): Autor
        {
            $sql = "INSERT INTO Autor (nome, data_nascimento, cpf) VALUES (?, ?, ?)";

            $stmt = parent::$conexao->prepare($sql);

            $stmt->bindValue(1, $model->Nome);
            $stmt->bindValue(2, $model->Data_nascimento);
            $stmt->bindValue(3, $model->Cpf);
            $stmt->Execute();
            $model->Id = parent::$conexao->lastInsertId();

            return $model;
        }

        public function update(Autor $model): Autor
        {
             $sql = "UPDATE Autor SET nome=?, data_nascimento=?, cpf=? WHERE id=?";

             $stmt = parent::$conexao->prepare($sql);
             $stmt->bindValue(1, $model->Nome);
             $stmt->bindValue(2, $model->Data_nascimento);
             $stmt->bindValue(3, $model->Cpf);
             $stmt->bindValue(4, $model->Id);
             $stmt->Execute();

             return $model;
        }

        public function selectById(int $id) : ?Autor
        {
            $sql="SELECT * FROM Autors WHERE id=?";
            $stmt = parent::$conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject("App\Model\Autor")
        }
        /**
         * metódo que retorna todos os registros da tabela autor no 
         * banco de dados
         */
        public function select() : array 
        {
            $sql = "SELECT * FROM Autor ";

            $stmt = parent::$conexao->prepare($sql);
            $stmt->execute();

            //retorna um array com as linhas retornadas da consulta.Observe que 
            //o Array é um array de objetos. Os objetos são dos tipos de um stdClass e 
            //foram criados automaticamente pelo método FetchAlldo PDO
            return $stmt->fethcAll(DAO:: FETCH_CLASS, "App\Model\Autor") 
        }    
        /**
         * Remove um registro da tabela pessoa do banco de dados.
         * Note que o metódo exige um parâmentro $id do tipo inteiro 
         */
        public function delete(int $id) : bool
        {
            $sql = "DELETE FROM Autor WHERE id=? ";

            $stmt = parent::$conexao->($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        }
    }

?>