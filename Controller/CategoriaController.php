<?php

namespace App\Controller;
use App\Model\Categoria;

use Exception;

final class CategoriaController extends Controller
{
    public static function index() : void
    {
        parent::isProtected();

        $model = new Categoria();

        try{
            $model->getAllRows();

        }catch(Exception $e){
            $model->setError("Ocorreu um erro ao buscar as Categoriaes: ");
            $model->setError($e->getMessage())
        }

        parent::render('Categoria\lista_Categoria.php', $model);
    }

    public static function cadastro () : void
    {
        parent::isProtected();

        $model = new Categoria();



        try {
            if (parent::isPost()
            {
                $model->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                $model->Descricao = $_POST['nome'];
                $model->save();

                parent::redirect("/Categoria");
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

        parent::render('Categoria/form_Categoria.php', $model);
    }

    public static function delete() : void
    {
        parent::isProtected();
        
        $model = new Categoria();

        try {
            $model->delete( (int) $_GET ['id']);
            parent::redirect("/Categoria");
        } catch (Exception $e) 
        {
            $model->setError("Ocorreu um erro ao excluir um Categoria.");
            $model->setError($e->getMessage());    
        }
        parent::render('Categoria/lista_Categoria.php', $model);//talvez(quase certeza) tenha que fazer um "lista_Categoria.php dps
    }
}//fim da classe

?>