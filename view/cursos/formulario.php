<?php include __DIR__ . '/../inicio-html.php'; ?>

<div class="container">
    <form action="/salvar-curso<?= isset($curso) ? '?id=' . $curso->getId() : ''; ?>" method="post">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>">
        </div>
        <button class="btn btn-info btn-sm">Salvar</button>
        <a href="/listar-cursos" class="btn btn-danger btn-sm">
            Cancelar
        </a>
    </form>
</div>

<?php include __DIR__ . '/../fim-html.php'; ?>

