<?php

namespace App\Http\Controllers\Auth\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth ;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        Session::put('key', '123');
        return view('user/home');
    }
    public function edit ()
    {
        $data =  User::find(Auth::id());
        return view('user/auth/update' ,['value' => $data]);
    }
    public function update (Request $req)
    {
        $oid =$req->id;
        $data =  User::find($oid);
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name ;
        $data->address = $req->address;
        $data->date_of_birth = $req->date_of_birth ;
        $data->email = $req->email ;
        $data->password = Hash::make($req->password);
        $res = $data->save();
        if ($res)
            return view('user/home')->with('msg','profile update successfully');
    }
}
