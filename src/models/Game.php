<?php

namespace mobileorm\models;
class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'game';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;

    public function companys_dev() {
        return $this->belongsToMany('gamepedia\models\Company','game_developers','game_id','comp_id')->as('developers');
    }

    public function companys_pub() {
        return $this->belongsToMany('gamepedia\models\Company','game_publishers','game_id','comp_id')->as('publishers');
    }

    public function genres() {
        return $this->belongsToMany('gamepedia\models\Genre','game2genre','game_id','genre_id');
    }

    public function themes() {
        return $this->belongsToMany('gamepedia\models\Theme','game2theme','game_id','theme_id');
    }

    public function characters() {
        return $this->belongsToMany('mobileorm\models\Character','game2character','game_id', 'character_id');
    }
}