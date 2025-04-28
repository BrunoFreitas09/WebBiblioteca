<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema biblioteca - Cadastro de alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div> 
        <?php
            include VIEWS . '/Includes/menu.php'
        ?>
        <h1> Lista Alunos</h1>

        <a href="/aluno/cadastro">Novo aluno</a>
        <?= $model->getErrors() ?>
        <table class="table"> 
            <thead>
                <tr>
                    <th> scope="col">Id</th>
                    <th> scope="col">Nome</th>
                    <th> scope="col">Curso</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach($model->rows as $aluno): ?>
            <tr>
                <td><?= $aluno->Id ?></td>
                <td><a href="/aluno/cadastro?id=<?= $aluno->Id ?>"><?= $aluno->Nome ?></a></td>
                <td><?= $aluno->Curso ?></td>
                <td><a href="/aluno/delete?id=<?= $aluno->Id ?>">Remover</a></td>
            </tr>
            <?php endforeach ?>    
            </tbody>
        </table>
    </div>
</body>
</html>