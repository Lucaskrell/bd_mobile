<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\Game;

$db = new DB();
$db->addConnection(parse_ini_file('../../src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

echo '<pre>';

$r = \mobileorm\models\Game::find(12342)->characters()->get();

foreach($r as $value) {
    echo 'nom : '.$value->name.'<br>';
    echo 'deck : '.$value->deck.'<br>';
    echo '<br>';
}