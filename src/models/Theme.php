<?php


namespace mobileorm\models;


class Theme extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'theme';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;

    public function games() {
        return $this->belongsToMany('gamepedia\models\Game','game2theme','theme_id','game_id');
    }

}