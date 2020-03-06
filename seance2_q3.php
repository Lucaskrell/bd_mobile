<?php
require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\Company;

$db = new DB();
$db->addConnection(parse_ini_file('src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();


$comp = Company::where("name", "like","%sony%")->get();

foreach ($comp as $c) {
    $jeux = $c->games_dev;
    foreach ($jeux as $j) {
        echo $j->name . "<br>";
    }
}
