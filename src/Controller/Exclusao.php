<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function handle(ServerRequestInterface $request):ResponseInterface
    {
        $queryString = $request->getQueryParams();
        $id = filter_var(
            $queryString['id'], 
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            $html = [
                $this->defineMensagem('warning','Descrição do curso não encontrado!'),
                header('Location: /listar-cursos')
            ];
            return new Response(302, [], $html);
        }

        $curso = $this->entityManager->getReference(
            Curso::class,
            $id
        );
        
        $this->entityManager->remove($curso);
        $this->entityManager->flush();

        $html = [
            $this->defineMensagem('success', "Removido o registro de ID: <u><b>{$id}</b></u> com Sucesso!"),
            header('Location: /listar-cursos')
        ];
        return new Response(200, [], $html);

        //
        // $queryString = $request->getQueryParams();
        // $idEntidade = $queryString['id'];
        // $entidade = $this->entityManager->getReference(Curso::class, $idEntidade);
        // $this->entityManager->remove($entidade);
        // $this->entityManager->flush();
    
        // return new Response(302, ['Location' => '/novo-curso']);
        //
        
    }
}