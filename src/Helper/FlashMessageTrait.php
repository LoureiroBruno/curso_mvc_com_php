<?php

namespace Alura\Cursos\Helper;

/**
 * Função que retorna a mensagem de resposta após ação crud, exceptions e login
 */
trait FlashMessageTrait
{
    public function defineMensagem(string $tipo, string $mensagem): void
    {
        $_SESSION['tipo_mensagem'] = $tipo; 
        $_SESSION['mensagem'] = $mensagem;
    }
}
