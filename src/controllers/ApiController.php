<?php

namespace mobileorm\controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use mobileorm\models\Game;
use Slim\Http\Request;
use Slim\Http\Response;

class ApiController {
    static $error = ['error' => true, 'message' => "Une erreur s'est produite."];

    public function game(Request $request, Response $response, array $args): Response {
        try {
            $game = Game::findOrFail($args['id']);
            $response = $response->withJson($game);
        } catch(ModelNotFoundException $e) {
            $response = $response->withJson(static::$error, 404);
        }
        return $response;
    }

    public function games(Request $request, Response $response, array $args): Response {
        $games = Game::all()->take(200);
        $games = ["games" => $games];
        $response = $response->withJson($games);
        return $response;
    }
}