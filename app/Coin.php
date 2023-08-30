<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model

{
    protected $table = 'coins';

    protected $fillable = [
        'id','name' ,'symbol', 'presale', 'presale_link','network', 'contract_address', 'description','coinmarket_link', 'coingecko_link', 'chart_link','poo_link',
        'bogged_link','swap_link','pancake_link','flooz_link','website_link', 'telegram_link', 'twitter_link',
        'discord_link','price_custom', 'marketcap','launch_date','price_usd','status','promoted','vote', 'image','is_approve','created_at','updated_at'
    ];

}
