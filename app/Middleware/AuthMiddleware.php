<?php

namespace Huckabuild\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class AuthMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        // Check if user is not logged in
        if (!isset($_SESSION['user_id'])) {
            $response = new Response();
            return $response->withHeader('Location', '/login')->withStatus(302);
        }

        return $handler->handle($request);
    }
} 