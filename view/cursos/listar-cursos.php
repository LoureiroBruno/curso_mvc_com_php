<?php include __DIR__ . '/../inicio-html.php'; ?>

<!-- <ul class="list-group">
        <?php foreach ($cursos as $curso) : ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $curso->getDescricao(); ?>

                <span>
                    <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
                    <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul> -->

<?php include __DIR__ . '/../fim-html.php'; ?>


<div class="container">

        </br>

    <a href="/novo-curso" class="btn btn-primary mb-2">
        Novo curso
    </a>

    <table class="table table-hover">

        <tr class="table-light">
            <th scope="col"><ion-icon name="finger-print-outline"></ion-icon> Id</th>
            <th scope="col"><ion-icon name="information-outline"></ion-icon> Descricão</th>
            <th scope="col" style="text-align: end;"><ion-icon name="construct-outline"></ion-icon> Ações</th>
        </tr>
        
        <?php foreach ($cursos as $curso) : ?>

            <tbody>
                <tr>
                    <th scope="row"><?= $curso->getId(); ?></th>
                    <td> <i><?= $curso->getDescricao(); ?></i></td>
                    <td style="text-align: end;">
                        <span>
                            <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn btn-info btn-sm">
                                Alterar
                            </a>
                            <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm">
                                Excluir
                            </a>
                        </span>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>

        </br>
        <tr class="table-light">
            <th scope="col"><ion-icon name="finger-print-outline"></ion-icon> Id</th>
            <th scope="col"><ion-icon name="information-outline"></ion-icon> Descricão</th>
            <th scope="col" style="text-align: end;"><ion-icon name="construct-outline"></ion-icon> Ações</th>
        </tr>

    </table>
</div>