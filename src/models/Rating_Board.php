<?php


namespace mobileorm\models;



class Rating_Board extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'rating_board';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function gameR2ratB(){
        return $this->hasMany('gamepedia\models\Game_Rating', 'id');
    }
}
