<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     // Table Name
     protected $table = "members";
     // Primary Key
     public $primaryKey = "id";
     // Timestamps
     public $timestamps = true;
 
     public function organization(){
         return $this->belongsTo('App\User');
     }
}
