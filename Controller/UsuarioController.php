<?php

namespace App\Controller;
use App\Model\Usuario;

use Exception;

final class UsuarioController extends Controller
{
    public static function index() : void
    {
        parent::isProtected();

        $model = new Usuario();

        try{
            $model->getAllRows();

        }catch(Exception $e){
            $model->setError("Ocorreu um erro ao buscar os Usuarios: ");
            $model->setError($e->getMessage())
        }

        parent::render('Usuario/lista_Usuario.php', $model); // Temos que criar isso dentro do Views(Da mesma forma que foi feita com o os alunos e com os autores.)
    }

    public static function cadastro () : void
    {
        parent::isProtected();

        $model = new Usuario();

        try {
            if (parent::isPost()
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model->RA = $_POST['ra'];
                $model->Curso = $_POST['curso'];
                $model->save();

                parent::redirect("/Usuario");
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

        parent::render('Usuario/form_Usuario.php', $model);
    }

    public static function delete() : void
    {
        parent::isProtected();
        
        $model = new Usuario();

        try {
            $model->delete( (int) $_GET ['id']);
            parent::redirect("/Usuario");
        } catch (Exception $e) 
        {
            $model->setError("Ocorreu um erro ao excluir um Usuario.");
            $model->setError($e->getMessage());    
        }
        parent::render('Usuario/lista_Usuario.php', $model);
    }
}//fim da classe

?>