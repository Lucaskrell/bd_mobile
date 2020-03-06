<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\Game;

$db = new DB();
$db->addConnection(parse_ini_file('../../src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$game = Game::where("name", "like","mario%")->get();

foreach ($game as $g){
    $p = $g->characters;
    $i = 0;
    foreach ($p as $perso){
        $i++;
    }
    if($i>=3) {
        echo $g->name . "<br>";
    }
}
