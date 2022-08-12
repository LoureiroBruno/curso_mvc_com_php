<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager(Curso::class);
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );
        

        if (empty($descricao)) {
            $html = [
                $this->defineMensagem('warning', 'Campo descrição não preenchido, deve informar o curso no campo obrigatório!'),
                header('Location: /listar-cursos')
            ];
            return new Response(200, [], $html);
        }

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $this->entityManager->flush();

            $html = [
                $this->defineMensagem('success', "Editado o registro de ID: <u><b>{$id}</b></u> com Sucesso!"),
                header('Location: /listar-cursos', true, 302)
            ];
            return new Response(200, [], $html);
        } else {
            $this->entityManager->persist($curso);
            $this->entityManager->flush();

            $html = [
                $this->defineMensagem('success', "Gerado um novo registro de curso <u><b>{$id}</b></u> com Sucesso!"),
                header('Location: /listar-cursos', true, 302)
            ];
            return new Response(200, [], $html);
        }

    }
}
