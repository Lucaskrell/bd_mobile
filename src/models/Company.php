<?php


namespace mobileorm\models;


class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'company';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;

    public function games_dev() {
        return $this->belongsToMany('mobileorm\models\Game','game_developers','comp_id','game_id')->as('developers');
    }

    public function games_pub() {
        return $this->belongsToMany('mobileorm\models\Game','game_publishers','comp_id','game_id')->as('publishers');
    }
}