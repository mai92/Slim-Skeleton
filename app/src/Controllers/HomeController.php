<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends BaseController
{

    public function index(Request $request, Response $response, $args)
    {

        $this->logger->info("Open Homepage");

        $users = $this->db->query("SELECT * FROM users")
            ->fetchAll(\PDO::FETCH_OBJ);

        if(isset($args['name'])){
            return $this->view->render($response, 'home.twig', [
                'name' => $args['name'],
            ]);
        }

        return $this->view->render($response, 'home.twig', [
            'users' => $users,
        ]);
    }
}