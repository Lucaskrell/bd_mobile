<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\Game;

$db = new DB();
$db->addConnection(parse_ini_file('../../src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$timestart = microtime(true);

$game = Game::get();

$timeend=microtime(true);

$time = $timeend - $timestart;

$page_load_time = number_format($time, 3);

echo "<h2>Temps d'exécution de la requete : " . $page_load_time . " sec<br><br><br></h2>";

foreach ($game as $g) {
    echo $g->name . "<br>";
}
