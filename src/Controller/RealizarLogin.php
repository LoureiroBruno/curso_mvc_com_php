<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    /**composer require psr/http-server-handler*/
    use FlashMessageTrait;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    // private $repositorioUsuarios;
    private $entityManager;

    /**
     * Undocumented function
     *
     * @var  EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager
        ->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );


        if (is_null($email) || $email === false) {
            $html = [
                $this->defineMensagem('danger', 'O e-mail digitado não é um e-mail válido'),
            ];
            return new Response(200, ['Location' => header('Location: /login')], $html);
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        /** @var  $usuario */
        $usuario = $this->entityManager
            ->findOneBy(['email' => $email]);
            
        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $html = [
                $this->defineMensagem('danger', 'E-mail ou senha incorreto! dados inválidos'),
                header('Location: /login')
            ];
            return new Response(200, [], $html);
        }

        $_SESSION['usuario_logado'] = true;
        $_SESSION['nome_usuario'] = $usuario->getEmail();

        $html = [
            $this->defineMensagem('info', "<p>Usuário Logado com Sucesso!</p>"),
            header('Location: /listar-cursos')
        ];
        return new Response(200, [], $html);
    }
}
