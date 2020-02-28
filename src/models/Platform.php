<?php


namespace mobileorm\models;


class Platform extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'platform';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;
}