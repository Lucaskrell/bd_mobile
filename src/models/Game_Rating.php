<?php


namespace mobileorm\models;


class Game_Rating extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game_rating';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        "name",
        "rating_board_id"
    ];

    public function original_game_ratings(){
        return $this->belongsToMany('gamepedia\models\Game', "game2rating", 'rating_id', 'game_id');
    }

    public function gameR2ratB(){
        return $this->belongsTo('gamepedia\models\Rating_Board', 'id');
    }

}