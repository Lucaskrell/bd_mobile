<?php

use mobileorm\models\Comment;
use mobileorm\models\Game;
use mobileorm\models\User;

$faker = Faker\Factory::create();
if (User::first() == null) {
    for ($i = 0; $i < 10; $i++) {
        $insert = false;
        while (!$insert) {
            try {
                $tmp = explode(' ', $faker->name);
                $user['fname'] = $tmp[0];
                $user['name'] = $tmp[1];
                $user['address'] = $faker->address;
                $user['email'] = $faker->email;
                $user['tel'] = $faker->e164PhoneNumber;
                $user['date'] = $faker->date('Y-m-d', '2005-01-01');
                User::create($user['fname'], $user['name'], $user['email'], $user['address'], $user['tel'], $user['date']);
                $insert = true;
            } catch (PDOException $Exception) {
                echo("Duplicate data : recreating new fake");
            }
        }
    }
}
if (Comment::first() == null) {
    for ($i = 0; $i < 100; $i++) {
        $insert = false;
        while (!$insert) {
            try {
                $id_user = random_int(0, 9);
                $id_game = random_int(0, 9);
                $user = User::skip($id_user)->take(1)->first();
                $game = Game::skip($id_game)->take(1)->first();
                $title = $faker->text(50);
                $content = $faker->text(200);
                $date = $faker->date('Y-m-d', '2015-02-01');
                Comment::create($game->id, $user->email, $title, $content, $date);
                $insert = true;
            } catch (PDOException $Exception) {
                echo("Duplicate data : recreating new fake");
            }
        }
    }
}
