<?php

namespace App\Http\Controllers;
use App\Home;
use App\Team;
use App\Website;
use Illuminate\Http\Request;
use App\Slider;
use Yajra\DataTables\DataTables;
use Image;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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


            $b= '<a  href="'.route('user-wishlist',['cm' => $users->id]).'" class="btn btn-xs btn-primary primary-alert"><i class="glyphicon glyphicon-trash"></i> Wishlist</a> ';
            return $b;
        }) ->rawColumns(['wishlist', 'action'])->make(true);
    }







}
