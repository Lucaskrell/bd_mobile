<?php


namespace mobileorm\models;


class Theme extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'theme';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;
}