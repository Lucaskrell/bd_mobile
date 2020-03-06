<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\Game;

$db = new DB();
$db->addConnection(parse_ini_file('../../src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

echo '<pre>';

$games = Game::where("name", "like","%mario%")->get();

foreach ($games as $g) {
    echo $g->name . "  --  ";
    $ogr = $g->original_game_ratings;
    if($ogr->isEmpty()){
        echo "Pas de notation";
    } else {
        foreach ($ogr as $rating) {
            echo $rating['name'];
        }
    }
    echo "<br>";
}