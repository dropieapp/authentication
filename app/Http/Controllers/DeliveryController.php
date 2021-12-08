<?php

namespace App\Http\Controllers;


use Validator;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use Auth;

class DeliveryController extends Controller
{
    //
    public function createRequest(Request $request)
    {
            
        $input = $request->only(['customer_id', 'package_type', 'package_size', 'package_desc', 'pickup_location', 'receiver_number', 'receiver_email', 'package_image', 'payment_method', 'delivery_type',]);

        $validate_data = [
            
            'package_type' => 'required',
            'package_size' => 'required',
            'package_desc' => 'required',
            'pickup_location' => 'required',
            'receiver_number' => 'required|min:8',
            'receiver_email' => 'required|email',
            'package_image' => 'required',
            'payment_method' => 'required',
            'delivery_type' => 'required',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        $userId= auth()->guard('api')->user();
 
        $user = Delivery::create([
            'customer_id' => auth()->user()->id,
            'package_type' => $input['package_type'],
            'package_size' => $input['package_size'],
            'package_desc' => $input['package_desc'],
            'pickup_location' => $input['pickup_location'],
            'receiver_number' => $input['receiver_number'],
            'receiver_email' => $input['receiver_email'],
            'package_image' => $input['package_image'],
            'payment_method' => $input['payment_method'],
            'delivery_type' => $input['delivery_type'],
        ]);
         
        return response()->json([
            'success' => true,
            'message' => 'Request made succesfully.'
        ], 200);
    }
}
