<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UpdateRequest extends Model

{
    protected $table = 'update_requests';

    protected $fillable = [
        'id','name' ,'symbol','coin_id', 'presale', 'presale_link','network', 'contract_address', 'submitted_by','description','coinmarket_link', 'coingecko_link', 'chart_link','poo_link',
        'bogged_link','swap_link','pancake_link','flooz_link','website_link', 'telegram_link', 'twitter_link',
        'discord_link','price_custom', 'marketcap','launch_date','price_usd','status','promoted','vote', 'image','is_approve','created_at','updated_at'
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
