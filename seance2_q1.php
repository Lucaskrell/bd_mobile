<?php
require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$r = \mobileorm\models\Game2Character::select('name','deck')->characters()->where('id_game', '=', '12342')->get();

foreach($r as $value) {
    echo 'nom : '.$value->name.'<br>';
    echo 'deck : '.$value->deck.'<br>';
    echo '<br>';
}