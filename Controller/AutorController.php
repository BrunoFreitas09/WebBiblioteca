<?php
    //basicamente  vamos ter que seguir a mesma lógica do AlunoController.php
    namespace App\Controller;
use App\Model\Autor;

use Exceptions;

final class AutorController extends Controller
{
    public static function index() : void
    {
        parent::isProtected();

        $model = new autor();

        try{
            $model->getAllRows();

        }catch(Exception $e){
            $model->setError("Ocorreu um erro ao buscar os autores: ");
            $model->setError($e->getMessage())
        }

        parent::render('autor\lista_aluno.php', $model);
    }

    public static function cadastro () : void
    {
        parent::isProtected();

        $model = new Aluno();

        try {
            if (parent::isPost()
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model->RA = $_POST['datanascimento'];
                $model->Curso = $_POST['cpf'];
                $model->save();

                parent::redirect("/aluno");
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

        parent::render('Aluno/form_aluno.php', $model);
    }

    public static function delete() : void
    {
        parent::isProtected();
        
        $model = new aluno();

        try {
            $model->delete( (int) $_GET ['id']);
            parent::redirect("/autor");
        } catch (Exception $e) 
        {
            $model->setError("Ocorreu um erro ao excluir um autor.");
            $model->setError($e->getMessage());    
        }
        parent::render('Aluno/lista_aluno.php', $model);
    }
}
?>