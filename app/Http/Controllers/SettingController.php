<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $setting = Setting::find($request->id);
            if ($setting) {

                $setting->fill($request->all());
                if ($setting->save()) {

                    $admin = User::where('id',$request->uid)->first();
                    $admin->email= $request->username;
                    if($request->password !== ""){
                        $admin->password=  Hash::make($request->password);

                    }
                    $admin->save();
                    return response()->json(['success' => true, 'message' => 'Settings Updated  Successfully ']);
                }
            }  else {

                return response()->json(['success' => false, 'message' => 'Settings Not Update ']);

            }


        }
        catch (\Exception $e ) {

            return response()->json(['success' => false, 'message' => $e->getMessage()], 200);
        }

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
        $setting = Setting::where(['id' => 1])->first();
        $user = User::where(['id' => 1])->first();
        return view('admin/settings',['setting' =>$setting, 'user' => $user]);
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
