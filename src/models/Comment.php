<?php
namespace mobileorm\models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamps = false ;

    public static function create($id_game, $email, $title, $content, $createdAt){
        $obj = new Comment();
        $obj->email = $email;
        $obj->id_game =$id_game;
        $obj->title = $title;
        $obj->content = $content;
        $obj->created_at = $createdAt;
        $obj->updated_at = $createdAt;
        $obj->save();
        return $obj;
    }

    function game(){
        return $this->BelongsTo('mobileorm\models\Game','id_game');
    }
    function user(){
        return $this->BelongsTo('mobileorm\models\User', 'email');
    }
}
