<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistemas bibliotecas - Cadastro de Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

</head>
<body>
    <div>
        <? phpinclude VIEWS . '/Includes/menu.php' ?>
        <h1>Cadastro de alunos</h1>
        <?= $model->getErrors() ?>

        <form method ="post" action="/aluno/cadastro" class="p-5">

        <input name="id" type="hidden" value="<? $model->Id ?>" />

        <div class="mb-3">
            <label for="nome" class="form-label">Nome: </label>
            <input type="text" value="<? $model->Nome ?>"
                    class="form-control" name="nome" id="nome">
        </div>

        <div class="mb-3">
        <label for="ra" class="form-label">RA: </label>
            <input type="text" value="<? $model->RA ?>"
                    class="form-control" name="ra" id="ra">
        </div>

        <div class="mb-3">
            <label for="curso" class="form_label">Curso:</label>
            <input type="text" value="<? $model->Curso ?>"
            class="form-control" name="curso" id="curso">   
    </div>

</body>
</html>