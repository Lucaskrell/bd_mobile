<?php
require_once __DIR__ . '../../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use mobileorm\models\User;

$db = new DB();
$db->addConnection(parse_ini_file('../../src/conf/conf.ini'));

$db->setAsGlobal();
$db->bootEloquent();

$user = User::where('id', '=', 2)->first();


$com = $user->commentaires;

echo "Commentaires de : " . $user->nom . " " . $user->prenom ."<br><br>";

foreach ($com as $c){
    echo $c->id .  "   ||  " . $c->dateCreation . '<br>';
}
