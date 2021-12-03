<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Hash;
use Validator;
use Auth;

class AgentController extends Controller
{
    public function agentDashboard()
    {
        $users = Agent::all();
        $success =  $users;

        return response()->json($success, 200);
    }

    public function agentRegister(Request $request)
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

        $user = Agent::create($allData);

        $resArr = [];
        $resArr['accessToken']=$user->createToken('api-application')->accessToken;
        $resArr['name']=$user->name;
        $resArr['email']=$user->email;
        $resArr['phone_number']=$user->phone_number;

        return response()->json($resArr, 200);
    }

    
    public function agentLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->errors()->all()]);
        }

        if(auth()->guard('agent')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'agent']);
            
            $agent = Agent::select('agents.*')->find(auth()->guard('agent')->user()->id);
            $success =  $agent;
            $success['accessToken'] =  $agent->createToken('MyApp',['agent'])->accessToken; 

            return response()->json($success, 200);
        }else{ 
            return response()->json(['message' => ['Invalid Phone number or Transaction pin.']], 200);
        }
    }
}
