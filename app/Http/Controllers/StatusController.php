<?php

namespace App\Http\Controllers;


use App\Coin;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use App\Timezone;
use GuzzleHttp;
use Socialite;
use Google_Client;
use Google_Service_Gmail;
use Google_Service_Calendar;
use Google_Service_Gmail_Message;
use DB;
use App\FollowupMeta;
use Goutte\Client;


class StatusController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StatusUpdate()
    {


        $coins = DB::select("SELECT * FROM `coins` where vote > '499' and status = 'new'");

        if ($coins) {

            foreach ($coins as $coin) {


                $status = Coin::where('id', $coin->id)->update(['status' => 'listed']);
                if ($status) {

                    echo " coins  with 500 votes";
                }
            }
        } else {

            echo "no coins found with 500 votes";

        }


    }

    public function PresaleUpdate()
    {


        $coins = DB::select("SELECT * FROM `coins` where presale = 'Yes' ");

        if ($coins) {

            foreach ($coins as $coin) {


                $status = Coin::where('id', $coin->id)->update(['marketcap' => 'Presale']);
                if ($status) {

                    echo " coins  with presale status updated";
                }
            }
        } else {

            echo "no coins found with Presale Status";

        }


    }
    public function PriceUpdateBsc()
    {
        $coins = DB::select("SELECT * FROM `coins`");

        if ($coins) {
            foreach ($coins as $coin) {


                $client = new Client();
                $crawler = $client->request('GET', 'https://www.coingecko.com/en/coins/0xfa17b330bcc4e7f3e2456996d89a5a54ab044831',['proxy' => '39.37.185.255']);

                   echo $price = $crawler->filter('span.tw-text-white tw-text-3xl')->text(''); echo "<br>";
                  echo  $marketcap = $crawler->filter('span.tw-text-gray-900.tw-font-medium')->text(''); echo "<br>";
                  echo  $custom = $crawler->filter('div.tw-mb-3')->text(''); echo "<br>";


                 if($price  && $marketcap && $custom){
                     $custom2 =  substr($custom,20,-5);
                  $status = Coin::where('id', $coin->id)->update(['marketcap' => $marketcap,  'price_usd' => $price,'price_custom' => $custom2]);
                    echo "yupp Coin  Found On CoinGecko";

                 }else{
                     $price = "-";
                    $marketcap = "-";
                     $custom2 = "-";
                     $status = Coin::where('id', $coin->id)->update(['marketcap' => $marketcap,  'price_usd' => $price,'price_custom' => $custom2]);
                    echo "Sorry Coin Not Found On CoinGecko";
                 }
               if ($status) {

                    echo " coin price updated successfully";
                }
            }
        } else {

            echo "no coins found with network bsc";

        }


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
