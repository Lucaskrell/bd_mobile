<?php

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\controllers\ApiController;
use Slim\App;

require('vendor/autoload.php');

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$config = [
    'settings' => [
        'displayErrorDetails' => 1
    ]
];

$app = new App($config);

$app->get('/api/games/{id:[0-9]+}', ApiController::class . ":game")->setName('game');
$app->get('/api/games', ApiController::class . ":games")->setName('games');
$app->get('/api/games/{id:[0-9]+}/comments', ApiController::class . ":comments")->setName('comments');
$app->get('/api/games/{id:[0-9]+}/characters', ApiController::class . ":gameCharacters")->setName('gameCharacters');
$app->get('/api/characters/{id:[0-9]+}', ApiController::class . ":character")->setName('character');
$app->get('/api/characters', ApiController::class . ":characters")->setName('characters');

$app->run();