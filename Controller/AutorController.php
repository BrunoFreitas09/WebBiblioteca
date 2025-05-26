<?php

namespace App\Controller;
use App\Model\Autor;

use Exception;

final class AutorController extends Controller
{
    public static function index() : void
    {
        parent::isProtected();

        $model = new Autor();

        try{
            $model->getAllRows();

        }catch(Exception $e){
            $model->setError("Ocorreu um erro ao buscar os Autores: ");
            $model->setError($e->getMessage())
        }

        parent::render('Autor\lista_Autor.php', $model);
    }

    public static function cadastro () : void
    {
        parent::isProtected();

        $model = new Autor();



        try {
            if (parent::isPost()
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model->Data_nascimento = $_POST['data_nascimento'];
                $model->Cpf = $_POST['cpf'];
                $model->save();

                parent::redirect("/Autor");
            })

            else {
                    if(isset($_GET['id']))
                    {
                        $model = $model->getById( (int) $_GET['id']);
                    }
            }
        } catch(Exception $e)
        {
            $model->setError($e->getMessage());
        }

        parent::render('Autor/form_Autor.php', $model);
    }

    public static function delete() : void
    {
        parent::isProtected();
        
        $model = new Autor();

        try {
            $model->delete( (int) $_GET ['id']);
            parent::redirect("/Autor");
        } catch (Exception $e) 
        {
            $model->setError("Ocorreu um erro ao excluir um Autor.");
            $model->setError($e->getMessage());    
        }
        parent::render('Autor/lista_Autor.php', $model);
    }
}//fim da classe

?>