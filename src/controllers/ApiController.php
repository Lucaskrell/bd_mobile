<?php

namespace mobileorm\controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use mobileorm\models\Character;
use mobileorm\models\Game;
use Slim\Http\Request;
use Slim\Http\Response;

class ApiController
{
    static $error = ['error' => true, 'message' => "Une erreur s'est produite."];

    public function game(Request $request, Response $response, array $args): Response
    {
        try {
            $id = $args['id'];
            $game =  Game::findOrFail($id);
            $res = [
                "game" => [
                    "id" => $game->id,
                    "name" => $game->name,
                    "alias" => $game->alias,
                    "deck" => $game->deck,
                    "description" => $game->description,
                    "original_release_date" => $game->original_release_date
                ],
                "links" => [
                    "comments" => "/api/games/$id/comments",
                    "characters" => "/api/games/$id/characters"
                ]
            ];
            $response = $response->withJson($res);
        } catch (ModelNotFoundException $e) {
            $response = $response->withJson(static::$error, 404);
        }
        return $response;
    }

    public function games(Request $request, Response $response, array $args): Response
    {
        $offset = filter_var($request->getParam('page'), FILTER_VALIDATE_INT);

        $games = Game::all()->chunk(200);

        if ($offset == null) {
            $offset = 0;
        }

        if ($offset >= count($games) - 1) {
            $next = count($games) - 1;
            $offset = $next;
        } else {
            $next = $offset + 1;
        }

        if ($offset == 0) {
            $prev = 0;
        } else {
            $prev = $offset - 1;
        }

        foreach ($games[$offset] as $game) {
            $res["games"][] = [
                "game" => [
                    "id" => $game->id,
                    "name" => $game->name,
                    "alias" => $game->alias,
                    "deck" => $game->deck
                ],
                "links" => [
                    "self" => ["href" => "api/games/$game->id"]
                ]
            ];
        }

        $res["links"] = [
            "prev" => ["href" => "/api/games?page=$prev"],
            "next" => ["href" => "/api/games?page=$next"]
        ];
        return $response->withJson($res);
    }

    public function comments(Request $request, Response $response, array $args): Response
    {

    }

    public function gameCharacters(Request $request, Response $response, array $args): Response
    {
        try {
            $id = $args['id'];
            $characters = Game::findOrFail($id)->characters()->get();

            foreach ($characters as $c) {
                $res["characters"] = [
                    "character" => [
                        "id" => $c->id, "name" => $c->name
                    ],
                    "links" => [
                        "self" => ["href" => "api/characters/$c->id"]
                    ]
                ];
            }

            $response = $response->withJson($res);
        } catch (ModelNotFoundException $e) {
            $response = $response->withJson(static::$error, 404);
        }
        return $response;
    }

    public function character(Request $request, Response $response, array $args): Response
    {
        try {
            $id = $args['id'];
            $character = Character::findOrFail($id);
            $response = $response->withJson($character);
        } catch (ModelNotFoundException $e) {
            $response = $response->withJson(static::$error, 404);
        }
        return $response;
    }


    public function characters(Request $request, Response $response, array $args): Response
    {
        $character = Character::all()->chunk(200);
        return $response->withJson($character);
    }
}