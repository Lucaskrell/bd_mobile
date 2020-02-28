<?php
require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$r = \mobileorm\models\Game::select('id', 'name')->where('name', 'LIKE', '%mario%')->get();

foreach($r as $value) {
    echo 'id : '.$value->id.'<br>';
    echo 'nom : '.$value->name.'<br>';
    echo '<br>';
}