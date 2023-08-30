<?php

namespace App\Http\Controllers;

use App\Coin;
use App\Order;
use App\Product;
use App\Home;
use App\Slider;
use App\UpdateRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user = auth()->user();

        if(Auth::User()->user_type=='admin'){

            $users = User::where('user_type', 'user')->count();
            $unverified = User::where(['user_type' => 'user','email_verified_at' => NULL])->count();

            $coins = Coin::all()->count();
           $new = Coin::where('status', 'new')->count();
            $updte = UpdateRequest::all()->count();
            $penidng = UpdateRequest::where('status', 0)->count();


            return view('admin.dashboard',['users' => $users,'coins' => $coins, 'new' => $new,'unverified' => $unverified,'updte' => $updte,'penidng' =>$penidng]);
        }else{

            return redirect()->route('watchlist');
        }
    }

    public function edit($id)
    {
        $home = Home::where(['id' => 1])->first();
        return view('admin/home',['home' =>$home]);
    }

    public function store(Request $request)
    {
        try {

            $home = Home::find($request->id);
            if ($home) {
                $home->fill($request->all());
                if ($home->save()) {

                    return response()->json(['success' => true, 'message' => 'Home Page Updated  Successfully ']);


                }
            } else {

                $home = new Home();

                $home->main_video_link = $request->main_video_link;
                $home->main_image_link = $request->main_image_link;

                if ($home->save()) {

                    return response()->json(['success' => true, 'message' => 'Home Page  Added Successfully ']);

                } else {

                    return response()->json(['success' => false, 'message' => 'Gallery Image Not Added ']);
                }

            }  }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }
}
