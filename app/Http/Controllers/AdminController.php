<?php
/**
 * Created by PhpStorm.
 * User: Nudrat Ullah
 * Date: 12/20/2019
 * Time: 10:09 PM
 */

namespace App\Http\Controllers;
use App\Advertisement;
use App\Raw;
use App\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;
use App\User;
use PHPMailer\PHPMailer\PHPMailer;
use Yajra\DataTables\DataTables;
use Image;
class AdminController extends Controller
{


    public function view_users(Request $request)
    {


        return view('admin/view_users');
    }

    public function get_users()
    {
        $users = User::where('user_type','user');

        return Datatables::of($users)->addColumn('action', function ($users) {

            $b= '<a onclick="del_user(' . $users->id . ')" href="javascript:;" class="btn btn-xs btn-danger danger-alert"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';

            return $b;
        })->addColumn('wishlist', function ($users) {


            $b= '<a  href="'.route('watchlist-public',['cm' => $users->id]).'" class="btn btn-xs btn-primary primary-alert"><i class="glyphicon glyphicon-trash"></i> Wishlist</a> ';
            return $b;
        }) ->rawColumns(['wishlist', 'action'])->make(true);
    }




    public function users_watchlist()
    {
         //$wishlist = Watchlist::where(['user_id' => $id])->get();


        return view('admin/users_watchlist');
    }

    public function get_users_watchlist()
    {
        $users = Watchlist::all()->groupby('user_id');


        return Datatables::of($users)->addColumn('name', function ($users) {

            $b= User::where('id', $users->user_id)->value('name');

            return $b;
        })->addColumn('email', function ($users) {

            $b= User::where('id', $users->user_id)->value('email');

            return $b;
        })->addColumn('wishlist', function ($users) {


            $b= '<a  href="'.route('watchlist-public',['cm' => $users->code]).'" class="btn btn-xs btn-primary primary-alert"><i class="glyphicon glyphicon-trash"></i> Watchlist</a> ';
            return $b;
        }) ->rawColumns(['wishlist', 'name','email'])->make(true);
    }

    public function place_an_ad()
    {


        return view('admin/place_an_ad');
    }


    public function ad_post(Request $request)
    {
        try {

            $image = $request->file('photo');
            $input['imagename'] = time().'.'.$image->extension();

            $destinationPath = public_path('/advertisements');
            $img = Image::make($image->path());
            $img->resize(768, 1103, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);

            $destinationPath = public_path('/advertisements');
            $image->move($destinationPath, $input['imagename']);
            $url = "https://coinbuzzer.me/public/advertisements/".$input['imagename'];
            $advertisement = Advertisement::where('id', $request->id)->update(['image_url' => $url,'page' => $request->page,'referral_url'=> $request->referral_url]);


            if ($advertisement) {

                return response()->json(['success' => true, 'message' => 'Ad Successfully Placed']);

            } else {

                return response()->json(['success' => false, 'message' => 'AD Not Placed']);
            }

        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

    }

    public function update_requests()
    {


        return view('admin/update_requests');
    }


    public function delete_user(Request $request)
    {
        try{

            $user =  User::find($request->id)->delete();
            if($user)
            {
                return response()->json(['success' => true, 'message' => 'User Successfully Deleted ']);
            }else{
                return response()->json(['success' => false, 'message' => 'An Error Occured, User Not Deleted']);
            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }
    }


}
