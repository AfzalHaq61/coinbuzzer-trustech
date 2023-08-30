<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model

{
    protected $table = 'settings';

    protected $fillable = [
        'id','tax' ,'email', 'office', 'fax', 'ttax', 'address','ftext','mainh1','mainl1','mainl2','mainl3','mainl4','created_at','	updated_at'
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
