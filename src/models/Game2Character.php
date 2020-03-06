<?php

namespace mobileorm\models;
class Game2Character extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game2character';
    protected $primaryKey = ['game_id','character_id'];
    public $timestamps = false ;
    public $incrementing = false;

    function games() {
        return $this->hasMany('mobileorm\models\Game', 'id');
    }

    function characters() {
        return $this->hasMany('mobileorm\models\Character', 'id');
    }
}