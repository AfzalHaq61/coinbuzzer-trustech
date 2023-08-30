<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Home;
use App\Raw;
use App\UpdateRequest;
use App\User;

use App\Vote;
use App\Watchlist;
use Illuminate\Http\Request;
use App\Coin;
use Yajra\DataTables\DataTables;
use Image;
use Auth;
class CoinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function edit($id)
    {
        $coin = Coin::where(['id' => $id])->first();
        return view('admin/edit_coin',['coin' =>$coin]);
    }
    public function request_detail($id)
    {
        $coin = UpdateRequest::where(['id' => $id])->first();
        return view('admin/request_detail',['coin' =>$coin]);
    }

    public function view_coins(Request $request)
    {


        return view('admin/view_coins');
    }

    public function get_coins()
    {
        $coins = Coin::all();

        return Datatables::of($coins)->addColumn('action', function ($coins) {
            $b= '<a  href="'.route('coin-edit',['cm' => $coins->id]).'" class="btn btn-xs btn-dark primary-alert"><i class="glyphicon glyphicon-pencil"></i> Edit</a><br /> ';

            $b.= '<a onclick="del_coin(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Delete</a><br /> ';

            $b.= '<a  href="'.route('coin-detail',['cm' => $coins->id]).'" class="btn btn-xs btn-primary primary-alert"><i class="glyphicon glyphicon-trash"></i> View</a><br /> ';
            return $b;
        })->addColumn('promoted', function ($coins) {

            if($coins->promoted == 'yes'){
                $b= '<a onclick="not_promoted(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-success danger-alert"><i class="glyphicon glyphicon-trash"></i> Promoted</a><br /> ';
                return $b;
            }else{
                $b= '<a onclick="promoted(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Not Promoted</a><br /> ';
                return $b;

            }
        })->addColumn('approved', function ($coins) {

            if($coins->is_approve == 1){
                $b= '<a onclick="not_approved(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-success danger-alert"><i class="glyphicon glyphicon-trash"></i> Approved</a><br /> ';
                return $b;
            }else{
                $b= '<a onclick="approved(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Not Approved</a><br /> ';
                return $b;

            }

        })->rawColumns(['action','promoted','approved'])->make(true);
    }

    public function get_updates()
    {
        $coins = UpdateRequest::all();

        return Datatables::of($coins)->addColumn('action', function ($coins) {

            $b= '<a onclick="del_request(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Delete</a><br /> ';
            $b.= '<a  href="'.route('request-detail',['cm' => $coins->id]).'" class="btn btn-xs btn-primary primary-alert"><i class="glyphicon glyphicon-trash"></i> View Request</a><br /> ';
            if($coins->status == 0){
                $b.= '<a onclick="reject(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Reject</a><br /> ';
                $b.= '<a onclick="approve(' . $coins->id . ')" href="javascript:;" class="btn btn-xs btn-success danger-alert"><i class="glyphicon glyphicon-trash"></i> Approve</a><br /> ';
                

            }
            return $b;
        })->addColumn('request', function ($coins) {

            if($coins->status == 0){
                $b= '<a  href="javascript:;" class="btn btn-xs btn-info danger-alert"><i class="glyphicon glyphicon-trash"></i> Pending</a><br /> ';
                return $b;
            }elseif($coins->status == 1){
                $b= '<a  href="javascript:;" class="btn btn-xs btn-success danger-alert"><i class="glyphicon glyphicon-trash"></i> Approved</a><br /> ';
                return $b;

            }elseif($coins->status == 2){
                $b= '<a  href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Rejected</a><br /> ';
                return $b;

            }
        })->rawColumns(['action','request'])->make(true);
    }

    public function store(Request $request)
    {
        try {

            $coin = Coin::find($request->id);
            if ($coin) {
                $coin->fill($request->all());
                if ($coin->save()) {

                    return response()->json(['success' => true, 'message' => 'Coin Updated Successfully ']);
                }
            } else {

                $coin = new Coin();
                 $coin->name = $request->name;
                $coin->symbol = $request->symbol;
                $coin->presale = $request->presale;
                $coin->presale_link = $request->presale_link;
                $coin->network = $request->network;
                $coin->contract_address = $request->contract_address;
                $coin->description = $request->description;
                $coin->chart_link = $request->chart_link;
                $coin->swap_link = $request->swap_link;
                $coin->website_link = $request->website_link;
                $coin->telegram_link = $request->telegram_link;
                $coin->twitter_link = $request->twitter_link;
                $coin->discord_link = $request->discord_link                                                                                                                                                       ;
                $coin->launch_date = $request->date_created_year.'-'.$request->date_created_month.'-'.$request->date_created_day;
                $coin->image = $request->image_url;
                $coin->status = "new";
                $coin->promoted = "no";

                if ($coin->save()) {

                    return response()->json(['success' => true, 'message' => 'Coin Added Successfully ']);

                } else {

                    return response()->json(['success' => false, 'message' => 'Coin Not Added ']);
                }

            }  }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }

    public function coin_update(Request $request)
    {
        $user = auth()->user();
        try {

            $coin = Coin::find($request->id);
            if ($coin) {
                $coin->fill($request->all());
                if ($coin->save()) {

                    return response()->json(['success' => true, 'message' => 'Coin Updated Successfully ']);
                }
            } else {

                $coin = new UpdateRequest();
                $coin->coin_id = $request->listing_id;
                $coin->name = Coin::where('id',$request->listing_id)->value('name');
                $coin->submitted_by = $user->email;


                $coin->presale = $request->presale;
                $coin->presale_link = $request->presale_link;
                $coin->network = $request->network;
                $coin->contract_address = $request->contract_address;
                $coin->description = $request->description;
                $coin->chart_link = $request->custom_dex_link;
                $coin->swap_link = $request->custom_swap_link;
                $coin->website_link = $request->website_link;
                $coin->telegram_link = $request->telegram_link;
                $coin->twitter_link = $request->twitter_link;
                $coin->discord_link = $request->discord_link                                                                                                                                                       ;
                $coin->launch_date = $request->date_created_year.'-'.$request->date_created_month.'-'.$request->date_created_day;
                $coin->image = $request->image_url;

                if ($coin->save()) {

                    return response()->json(['success' => true, 'message' => 'Coin Added Successfully ']);

                } else {

                    return response()->json(['success' => false, 'message' => 'Coin Not Added ']);
                }

            }  }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }
    public function raw_image(Request $request)
    {
        try {

                 $raw = new Raw();
                 $image = $request->file('photo');
                 $input['imagename'] = time().'.'.$image->extension();

                 $destinationPath = public_path('/coins');
                 $img = Image::make($image->path());
                 $img->resize(768, 1103, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);

                 $destinationPath = public_path('/coins');
                $image->move($destinationPath, $input['imagename']);
                 $raw->image_url =  "https://coinbuzzer.me/public/coins/".$input['imagename'];
                 $url = "https://coinbuzzer.me/public/coins/".$input['imagename'];
                if ($raw->save()) {

                    return response()->json(['success' => true, 'url' => $url]);

                } else {

                    return response()->json(['success' => false, 'message' => 'Category Not Added ']);
                }

              }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }

    public function raw_image_update(Request $request)
    {
        try {

            $image = $request->file('photo');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('/coins');
            $img = Image::make($image->path());
            $img->resize(768, 1103, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/coins');
            $image->move($destinationPath, $input['imagename']);
            $url = "https://coinbuzzer.me/public/coins/".$input['imagename'];
            $status = Coin::where('id', $request->id)->update(['image' => $url]);

            if ($status) {

                return response()->json(['success' => true, 'message' => 'Logo Updated Successfully ']);

            } else {

                return response()->json(['success' => false, 'message' => 'Category Not Added ']);
            }

        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }

    public function coin_detail($id)
    {
        $user = auth()->user();
       $coin = Coin::where(['id' => $id])->first();
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();

        if (Auth::user()) {   // Check is user logged in
            $watchlist = Watchlist::where(['coin_id' => $coin->id,'user_id' => $user->id])->first();

        } else {
            $watchlist = "";
        }
        $watchlist_count = Watchlist::where(['coin_id' => $coin->id])->count();

       // die();
        return view('coin',['coin' =>$coin,'watchlist' =>$watchlist,'watchlist_count' =>$watchlist_count, 'promoted' => $promoted]);
    }
    
    
      public function show($id)
    {
        $user = auth()->user();
       $coin = Coin::where(['id' => $id])->first();
        $promoted = Coin::where('promoted', 'yes')->orderByDesc('vote')->take(11)->get();

        if (Auth::user()) {   // Check is user logged in
            $watchlist = Watchlist::where(['coin_id' => $coin->id,'user_id' => $user->id])->first();

        } else {
            $watchlist = "";
        }
        $watchlist_count = Watchlist::where(['coin_id' => $coin->id])->count();

       // die();
        return view('coin',['coin' =>$coin,'watchlist' =>$watchlist,'watchlist_count' =>$watchlist_count, 'promoted' => $promoted]);
    }

    public function watchlist_add(Request $request)
    {
        try {
            $user = auth()->user();


            $coin = Watchlist::find($request->id);
            if ($coin) {
                $coin->fill($request->all());
                if ($coin->save()) {

                    return response()->json(['success' => true, 'message' => 'Coin Updated Successfully ']);
                }
            } else {

                $watchlist = new Watchlist();

                $watchlist->user_id = $user->id;
                $watchlist->coin_id = $request->coin_id;
                $watchlist->code = $user->code;

                if ($watchlist->save()) {

                    return response()->json(['success' => true, 'message' => 'Coin Added Successfully ']);

                } else {

                    return response()->json(['success' => false, 'message' => 'Coin Not Added ']);
                }

            }  }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }

    public function watchlist_remove(Request $request)
    {
        try{
            $user = auth()->user();

            $watchlist =  Watchlist::where('coin_id',$request->coin_id)->delete();
            if($watchlist)
            {
                return response()->json(['success' => true, 'message' => 'Watchlist Successfully Deleted ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured, Watchlist Not Deleted']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    public function user_vote(Request $request)
    {
        try {
                $user = auth()->user();

                $coin = Coin::find($request->id);
                if ($coin) {
                    $coin->vote = $coin->vote +1;

                    if ($coin->save()) {

                        $vote = new Vote();

                        $vote->user_id = $user->id;
                        $vote->coin_id = $request->id;
                        $vote->date = date('Y-m-d');
                        if ($vote->save()) {

                            return back()->withInput();

                        } else {

                            return response()->json(['success' => false, 'message' => 'Coin Not Added ']);
                        }
                     }
                  }

        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }

    public function not_promoted(Request $request)
    {
        try{

            $promoted = Coin::where('id', $request->id)->update(['promoted' => 'no']);
            if($promoted)
            {
                return response()->json(['success' => true, 'message' => 'Coin Removed From Promotion ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    public function promoted(Request $request)
    {
        try{

            $promoted = Coin::where('id', $request->id)->update(['promoted' => 'yes']);
            if($promoted)
            {
                return response()->json(['success' => true, 'message' => 'Coin Successfully Promoted Now']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    public function not_approved(Request $request)
    {
        try{

            $approved = Coin::where('id', $request->id)->update(['is_approve' => 0]);
            if($approved)
            {
                return response()->json(['success' => true, 'message' => 'Coin Removed From Listings ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    public function approved(Request $request)
    {
        try{

            $approved = Coin::where('id', $request->id)->update(['is_approve' => 1]);
            if($approved)
            {
                return response()->json(['success' => true, 'message' => 'Coin Successfully Added in Listings']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }



    public function reject_update(Request $request)
    {
        try{

            $approved = UpdateRequest::where('id', $request->id)->update(['status' => 2]);
            if($approved)
            {
                return response()->json(['success' => true, 'message' => 'Request Rejected Successfully ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }

    public function approve_update(Request $request)
    {
        try{

            $approved = UpdateRequest::where('id', $request->id)->update(['status' => 1]);
            if($approved)
            {
                return response()->json(['success' => true, 'message' => 'Request Approved Successfully']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }


    public function request_remove(Request $request)
    {
        try{
            $user = auth()->user();

            $watchlist =  UpdateRequest::where('id',$request->id)->delete();
            if($watchlist)
            {
                return response()->json(['success' => true, 'message' => 'Request Successfully Deleted ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured, Watchlist Not Deleted']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }
    
     public function delete_coin(Request $request)
    {
        try{
            $user = auth()->user();

            $watchlist =  Coin::where('id',$request->id)->delete();
            if($watchlist)
            {
                return response()->json(['success' => true, 'message' => 'Coin Successfully Deleted ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured, Watchlist Not Deleted']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }
}
