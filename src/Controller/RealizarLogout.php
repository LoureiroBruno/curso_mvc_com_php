<?php

namespace Alura\Cursos\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogout implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $_SESSION['usuario_logado'] = false;
        session_destroy();
        $html = [
            header('Location: /listar-cursos')
        ];
        return new Response(200, [], $html);
    }
}
