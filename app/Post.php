<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //ta

    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;
    //protected $fillable = 'cbody';

// for relationship between model
    public function user(){
      return $this-> belongsTo('App\User'); // post has a relationship that belongsTo user
    }
}
