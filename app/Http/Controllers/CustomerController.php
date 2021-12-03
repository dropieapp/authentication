<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;
use Auth;

class CustomerController extends Controller
{
    public function userDashboard()
    {
        $users = User::all();
        $success =  $users;

        return response()->json($success, 200);
    }
    public function userRegister(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validation->fails())
        {
            return response()->json($validation->errors(), 202);
        }
        $allData = $request->all();
        $allData['password'] = bcrypt($allData['password']);

        $user = User::create($allData);

        $resArr = [];
        $resArr['accessToken']=$user->createToken('api-application')->accessToken;
        $resArr['name']=$user->name;
        $resArr['email']=$user->email;
        $resArr['name']=$user->name;

        return response()->json($resArr, 200);
    }

    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->all()]);
        }

        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'user']);
            
            $user = User::select('users.*')->find(auth()->guard('user')->user()->id);
            $success =  $user;
            $success['token'] =  $user->createToken('MyApp',['user'])->accessToken; 

            return response()->json($success, 200);
        }else{ 
            return response()->json(['message' => ['Invalid Phone number or Transaction pin.']], 200);
        }
    }
}
