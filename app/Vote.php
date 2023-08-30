<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model

{
    protected $table = 'votes';

    protected $fillable = [
        'id','user_id' ,'coin_id', 'date', 'created_at','updated_at'
    ];


}
