<?php

namespace mobileorm\models;
use Illuminate\Database\Eloquent\Builder;
class Character extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'character';
    protected $primaryKey = 'id';
    public $timestamps = false ;
    public $incrementing = false;
}