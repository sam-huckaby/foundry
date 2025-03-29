<?php

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Huckabuild\Services\LatteService;
use Psr\Container\ContainerInterface;
use Huckabuild\Middleware\ViewAuthMiddleware;
use Huckabuild\Middleware\MethodOverrideMiddleware;
use Huckabuild\Middleware\CsrfMiddleware;

require __DIR__ . '/../vendor/autoload.php';

// Configure session security
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
ini_set('session.cookie_samesite', 'Lax');

// Start session
session_start();

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Initialize database connection
require __DIR__ . '/../app/database.php';

// Create Container
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    LatteService::class => function () {
        return new LatteService();
    },
    'view' => function (ContainerInterface $c) {
        return $c->get(LatteService::class);
    }
]);
$container = $containerBuilder->build();

// Create App
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add middleware
$app->add(new ViewAuthMiddleware($container->get('view')));
$app->add(new MethodOverrideMiddleware());
$app->add(new CsrfMiddleware());
$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, true, true);

// Include routes - admin routes must be registered before web routes
require __DIR__ . '/../routes/admin.php';
require __DIR__ . '/../routes/web.php';

// Run app
$app->run(); 