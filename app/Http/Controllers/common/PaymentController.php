<?php

namespace App\Http\Controllers\common;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
        public function payment(Request $req){
            try{
                $data=New Payment;
                $data->payment_status=$req->payment_status;
                $data->payment_reference=$req->payment_reference;
                $result=$data->save();
                if ($result) {
                    return response()->json([
                        "message" => "Payment has been created",
                        'data' => $result,
                    ], 200);
                } else {
                    return response()->json([
                        'message' => 'Credentials are wrong',
                        'data' => null,
                    ], 400);
                }
            }catch (\Exception $ex) {
                return response()->json([
                    'message' => 'Payment request failed',
                    'error' => $ex->getMessage(),
                ], 500);
            }
        }

   
}
