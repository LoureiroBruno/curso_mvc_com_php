<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class Persistencia implements InterfaceControladorRequisicao
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );

        if (empty($descricao)) {
            $_SESSION['tipo_mensagem'] = 'warning';
            $_SESSION['mensagem'] = "Campo descrição não preenchido, deve informar o curso no campo obrigatório!";
            header('Location: /listar-cursos');
            return;
        }

        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
        } else {
            $this->entityManager->persist($curso);
        }

        $this->entityManager->flush();
        $_SESSION['tipo_mensagem'] = 'success';
        $_SESSION['mensagem'] = "Editado o registro de ID: <u><b>{$id}</b></u> com Sucesso!";
        
        header('Location: /listar-cursos', true, 302);
        return;
    }
}
