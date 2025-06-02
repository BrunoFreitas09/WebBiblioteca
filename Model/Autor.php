<?php

use App\DAO\AutorDAO;
use Exception;
final class Autor extends BadMethodCallException
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
    public ?string $Cpf {
        set { 
            if (empty($value))
                throw new Exception("Preencha o CPF");
                $this->Cpf = $value;
         }

         get => $this->Cpf ?? null;
    }/// não acho que iremos usar o ra do autor ne  

    public ?string $Data_Nascimento {
        set { 
            if (strlen($value) < 8)
                throw new Exception("Data de Nascimento deve ter oito digitos!");
               $this->Data_nascimento = $value;
         }

         get => $this->Cpf ?? null;
    }

    function save() : Autor{
        return new AutorDAO()->save($this);
    }

    function getById (int $id) : ?Autor {
        return new AutorDAO()->selectById($id);
    }   

    function getByAllRows(): array {
        $this->rows = new AutorDAO()->Select();

        return $this->rows;
    }

    function delete (int $id) : bool {
        return new AutorDAO()->delete($id);
    }
}
?>
//// por hora eu parei por aqui 