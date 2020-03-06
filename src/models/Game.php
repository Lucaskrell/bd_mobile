<?php

namespace mobileorm\models;
class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;

    public function characters() {
        return $this->belongsToMany('mobileorm\models\Character','game2character','game_id', 'character_id');
    }
}