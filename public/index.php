<?php

require __DIR__ . '/../vendor/autoload.php';

// use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Psr\Http\Server\RequestHandlerInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

session_start();
if (!isset($_SESSION['usuario_logado']) && $caminho !=='/login' && $caminho !=='/realiza-login') {
    header('Location: /login'); 
    exit();
}


$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
/** @var ContainerInterface $container */
$container = require __DIR__ . '../../config/dependencies.php';

/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);
$resposta = $controlador->handle($request);


foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();
