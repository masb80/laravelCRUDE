<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
  //ta
  protected $table = 'comments';
  public $primaryKey = 'id';
  public $timestamps = true;

// for relationship between model
  public function user(){
    return $this-> belongsTo('App\User'); // post has a relationship that belongsTo user
  }
  

}
