<?php
    namespace App\Model;

    use App\DAO\LivroDAO;
    use Exception;

    final class Livro extends Model
    {
        public ?int $id = null;

        public array $rows_categorias = [];
        public array $rows_autores = [];

        public $id_Categoria;

        public $id_Autores = [];
    } 
?>