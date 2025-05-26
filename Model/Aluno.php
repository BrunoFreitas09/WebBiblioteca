<?php

use App\DAO\AlunoDAO;
use Exception;
final class Aluno extends BadMethodCallException
{
    public ?int $Id = null;

    public string $Nome {

        set {
            if (strlen($value) < 3)
                throw new Exception("Nome deve ter no minimo 3 caracteres!");

            $this->Nome = $value;
        }

        get => $this->Nome ?? null;
    }
    public ?string $RA {
        set { 
            if (empty($value))
                throw new Exception("Preencha o RA");
                $this->RA = $value;
         }

         get => $this->RA ?? null;
    }

    public ?string $Curso {
        set { 
            if (strlen($value) < 3)
                throw new Exception("Curso deve ter no minímo tres caracteres");
               $this->Curso = $value;
         }

         get => $this->Curso ?? null;
    }

    function save() : Aluno{
        return new AlunoDAO()->save($this);
    }

    function getById (int $id) : ?Aluno {
        return new AlunoDAO()->selectById($id);
    }   

    function getByAllRows(): array {
        $this->rows = new AlunoDAO()->Select();

        return $this->rows;
    }

    function delete (int $id) : bool {
        return new AlunoDAO()->delete($id);
    }
}
?>