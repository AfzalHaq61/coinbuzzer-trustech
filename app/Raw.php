<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Raw extends Model

{
    protected $table = 'raw_images';

    protected $fillable = [
        'id','image_url' ,'created_at',',updated_at'
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
