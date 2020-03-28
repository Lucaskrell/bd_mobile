<?php
namespace mobileorm\models;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public static function create($fname, $name, $email, $address, $numtel, $date){
        $obj = new User();
        $obj->name = $name;
        $obj->first_name = $fname;
        $obj->email = $email;
        $obj->address = $address;
        $obj->phone = $numtel;
        $obj->dateNaiss = $date;
        $obj->save();
        return $obj;
    }

    function comments(){
        return $this->hasMany('mobileorm\models\Comment', 'email');
    }
}
