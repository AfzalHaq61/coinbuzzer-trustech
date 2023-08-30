<?php
/**
 * Created by PhpStorm.
 * User: Nudrat Ullah
 * Date: 12/20/2019
 * Time: 10:09 PM
 */

namespace App\Http\Controllers;

use App\Coin;
use App\Vote;
use App\Watchlist;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class FrontController extends Controller
{


    public function index()
    {
        $ldate = date('Y-m-d');

        $today = Vote::select('coin_id')->where('date', $ldate)->distinct()->orderByDesc('id')->pluck('coin_id');
        $coins = Coin::whereIn('id', $today)->paginate(50);
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();;

       // die();
        return view('welcome',['coins' => $coins, 'promoted' => $promoted]);
    }
        public function updateCoinPrice(){


        $ldate = date('Y-m-d');
        $today = Vote::select('coin_id')->distinct()->orderByDesc('id')->pluck('coin_id');
        $coins = Coin::all();  
       
       
        
        $id="";
        $data=[];
        // Ethereum -> eth   bsc ->BNB Chain   Polygon -> matic
        $bsc=[];
        $eth=[];
        $matic=[];
        $data=[];
        foreach($coins as $key => $c){
             if($c->network=="BSC"){
           
                array_push($bsc,$c->contract_address);
              }
              if($c->network=="ETH"){
                array_push($eth,$c->contract_address);
              }
              if($c->network=="MATIC"){
                array_push($matic,$c->contract_address);
              }
   
        }
        $data['56']=$bsc;
        $data['1']=$eth;
        $data['137']=$matic;
        // $data['56']=$bsc;
       
        $response = Curl::to('https://api.coinbrain.com/public/coin-info')
        ->withData($data)
        ->asJson( true )
        ->post();
     
        
   
        foreach($response as $res){
            if($res['priceUsd']!=null){
                $coin= Coin::where('contract_address',$res['address'])->first();
                $coin->price_usd=$res['priceUsd'];
                $coin->marketcap=$res['marketCapUsd'];
                $coin->save();
               
            }
          
        }
        echo "coins update successfully";
      
             
        
      
    //   foreach($coins as $key => $c){
    //         if($c->network=="BSC"){
    //            $id=56;
               
              
    //          }
    //          if($c->network=="ETH"){
    //             $id=1;
    //             $data=$eth;
    //          }
    //          if($c->network=="MATIC"){
    //             $id=137;
    //             $data=$matic;
    //          }
           

    //         //  $response = Curl::to('https://api.coinbrain.com/public/coin-info')
    //         //  ->withData( array( $id => array('0x7130d2a12b9bcbfae4f2634d864a1ee1ce3ead9c','0xe9e7cea3dedca5984780bafc599bd69add087d56','0x8ac76a51cc950d9822d68b83fe1ad97b32cd580d') ) )
    //         //  ->asJson( true )
    //         //  ->post();
    //         //   dd($response); 

  
    //    }
      
        
        // $response = Curl::to('https://api.coinbrain.com/public/coin-info')
        // ->withData( array( '56' => array('0x7130d2a12b9bcbfae4f2634d864a1ee1ce3ead9c','0xe9e7cea3dedca5984780bafc599bd69add087d56','0x8ac76a51cc950d9822d68b83fe1ad97b32cd580d') ) )
        // ->asJson( true )
        // ->post();
        //  dd($response);

       
        // $ldate = date('Y-m-d');
        // $today = Vote::select('coin_id')->distinct()->orderByDesc('id')->pluck('coin_id');
        // $coins = Coin::whereIn('id', $today)->get();
        
    
        // $result=[];
        // foreach($coins as $key => $c){
          
        //     $coin_id = strtolower(str_replace(' ', '-', $c->name));            
        //     $market_cap= $this->ftnMarketCap($coin_id);
        //     $results = Curl::to('https://api.coingecko.com/api/v3/simple/price?ids='.$coin_id.'&vs_currencies=usd')
        //     ->get();
            
        //     if($results){
        //         $r = json_decode($results,true);
        //         $result[]=$r[$coin_id]['usd'];
        //         if(!empty($r)){
        //             $updateDetails = [
        //                 'price_usd' => $r[$coin_id]['usd'],
        //                 'marketcap' => $market_cap
        //             ];
        //             Coin::where('name',$c->name)->update($updateDetails);
        //         }
        //     }   
          
        // }
       
    } 
    //  function ftnMarketCap($coin_id){

    //     $coinList = Curl::to('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids='.$coin_id.'&sparkline=false')
    //     ->get();
       
    //     $market_cap=0;
    //     if($coinList){
           
    //         $coinListsArr = json_decode($coinList,true);
           

    //         if( is_array($coinListsArr) &&  !empty($coinListsArr)){
                 
    //              try {
    //                  return  $market_cap= $coinListsArr[0]['market_cap'];
    //             }catch(Exception $e) {
    //               return  $market_cap;
    //             }
               
                 
    //         }
    //     }
        
    // }

    public function search(Request $request)
    {

        $coins =DB::table('coins')->where('name','LIKE','%'.$request->q."%")->get();

        if ($coins != '') {
            return response()->json($coins, 200);
        } else {
            return response()->json(['success' => false, 'message' => 'An error occured, coins not found']);
        }
    }

    public function submit()
    {
       // $team= Team::where('id', 1)->first();
        return view('submit');
    }


    public function privacy_policy()
    {

        //$smacp= Marketing::where('id', 1)->first();

        return view('privacy-policy');
    }

    public function anti_scam_guide()
    {

        //$smacp= Marketing::where('id', 1)->first();

        return view('anti-scam');
    }

    public function terms_and_conditions()
    {
       // $sc= Website::where('id', 1)->first();
        return view('terms-and-conditions');
    }


    public function contact()
    {


        return view('contact');
    }
    public function watchlist()
    {

        $user = auth()->user();

        $watch = Watchlist::where('user_id', $user->id)->pluck('coin_id');
        $watchlist = Coin::whereIn('id', $watch)->paginate(50);

        return view('watchlist',['watchlist' => $watchlist]);
    }

    public function watchlist_public(Request $request, $code)
    {


        $watch = Watchlist::where('code', $code)->pluck('coin_id');
        $watchlist = Coin::whereIn('id', $watch)->paginate(50);
        $route =  $request->path();

        return view('watchlist_public',['watchlist' => $watchlist,'route' =>$route]);
    }

    public function update_form()
    {

        //$services= Services::where('id', 1)->first();
        return view('update-form');
    }

    public function thank_you()
    {

        //$services= Services::where('id', 1)->first();
        return view('thank-you');
    }


    public function alltime()
    {

        $alltime = Coin::orderByDesc('vote')->paginate(50);
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();;

        return view('alltime',['alltime' => $alltime, 'promoted' => $promoted]);
    }

    public function new()
    {

        $new = Coin::where('status', 'new')->orderByDesc('created_at')->paginate(50);
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();;

        return view('new',['new' => $new, 'promoted' => $promoted]);
    }

    public function marketcap()
    {

        $marketcap = Coin::where('presale', 'no')->orderByDesc('marketcap')->paginate(50);
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();

        return view('marketcap',['marketcap' => $marketcap, 'promoted' => $promoted]);
    }

    public function presales()
    {

        $presale = Coin::where('presale', 'yes')->orderByDesc('created_at')->paginate(50);
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();;

        return view('presale',['presale' => $presale, 'promoted' => $promoted]);
    }
}
