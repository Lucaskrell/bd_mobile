<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\User;

$db = new DB();
$db->addConnection(parse_ini_file('../../src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$users = User::get();


foreach ($users as $u) {
    $com = $u->commentaires;
    $i = 0;
    foreach ($com as $c) {
        $i++;
    }
    if ($i >= 5) {
        echo $u->nom . " | " . $i . " commentaires<br>";
    }
}
