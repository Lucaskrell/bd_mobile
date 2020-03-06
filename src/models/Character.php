<?php

namespace mobileorm\models;
use Illuminate\Database\Eloquent\Builder;
class Character extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'character';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;

    public function games() {
        return $this->belongsToMany('gamepedia\models\Game','game2character','character_id','game_id');
    }
}