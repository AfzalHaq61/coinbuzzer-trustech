<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model

{
    protected $table = 'watchlist';

    protected $fillable = [
        'id','user_id' ,'coin_id',  'created_at','	updated_at'
    ];


    /* public function user_meta()
     {
         return $this->belongsTo('App\User');
     }

     public function campaign_meta()
     {
         return $this->hasMany('App\CampaignEmailMeta','campaign_id');
     }*/

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
