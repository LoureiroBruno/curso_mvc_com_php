<?php

namespace Alura\Cursos\Controller;

class RealizarLogout implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $_SESSION['usuario_logado'] = false;
        session_destroy();
        header('Location: /listar-cursos');
    }
}
