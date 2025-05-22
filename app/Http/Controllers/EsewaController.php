<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;


require '../vendor/autoload.php';
use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config;
// use Cixware\Esewa\Client;
// use Cixware\Esewa\Config;

class EsewaController extends Controller
{
    public function esewaPay(Request $request){
                $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('LIVE_SECRET_KEY'),
        ])->get('https://dev.khalti.com/api/v2/');

    //     $pid = $request->product_id;
    //     $amount = $request->product_amount;
    //      $orders = DB::table('orders')
    //                 ->insert(
    //                     [
    //                         'product_id' => $request->product_id,
    //                         'user_id' => $request->user_id,
    //                         'amount' => $request->product_amount,
    //                         'esewa_status'=>'unverified',
    //                         'created_at' => Carbon::now()
    //                     ]
    //                     );
                    
    //     // Set success and failure callback URLs.
    //     $successUrl = url('/success');
    //     $failureUrl = url('/failure');

    //     // config for development
    //     $esewa = new Client([
    // 'merchant_code' => 'EPAYTEST',
    // 'success_url' => $successUrl,
    // 'failure_url' => $failureUrl,
    // ]);
    // $esewa->payment($pid, $amount, 0, 0, 0);

// Initialize eSewa client for development.
        // $esewa = new Client($config);
        // $esewa->process($pid,$amount,0,0,0);
            }

            public function esewaSuccess(){
                echo "Success";
            }

            public function esewaFail(Request $request){ 
                $txn_id = $request->transaction_uuid;
                // echo $txn_id;die;
                DB::table('orders')
        ->where('txn_id',$txn_id)
        ->update(
         [
            'esewa_status' => 'failed'
            
         ]);
                return view('paymentfail');
        }

        public function verifyPayment(){
            echo "success";
        }

        public function storePayment(){
            echo"success";
        }

        public function initiate(Request $request){
            $payamount = $request->product_amount;
             
    
        $process_url = 'https://rc-epay.esewa.com.np/api/epay/main/v2/form';
        $tuid = uniqid();
        $merchant_id = 'EPAYTEST';
        $message = "total_amount=" . $payamount . ",transaction_uuid=" . $tuid . ",product_code=" . $merchant_id;

        //insert into db
        $orders = DB::table('orders')
                    ->insert(
                        [
                            'user_id' => $request->user_id,
                            'product_id' => $request->product_id,
                            'txn_id' => $tuid,
                            'amount' => $request->product_amount,
                            'esewa_status' => 'unverified',
                            'created_at' => Carbon::now()
                        ]
                        );

        $data = [
            "amount" => $payamount,
            "failure_url" => route('payment.failed'),
            "success_url" => route('payment.success'),
            "product_delivery_charge" => "0",
            "product_service_charge" => "0",
            "product_code" => $merchant_id,
            "signature" => $this->generateSignature($message),
            "signed_field_names" => "total_amount,transaction_uuid,product_code",
            
            "tax_amount" => "0",
            "total_amount" => $payamount,
            "transaction_uuid" => $tuid
            
        ];
        return view('payment', [
        'process_url' => $process_url,
         'form_data' => $data,
        ]);
    }
    private function generateSignature($message): string
    {
        $signature = hash_hmac('sha256', $message, '8gBm/:&EnhH.1/q', true);
        return base64_encode($signature);
    }


    public function verifySuccess(Request $request)
{
    // $refId = $request->input('ref_id');
    $tuid = $request->input('transaction_uuid');

    $verifyUrl = 'https://rc.esewa.com.np/api/epay/transaction/status/';

    $response = Http::post($verifyUrl, [
        'transaction_uuid' => $tuid,
        'product_code' => 'EPAYTEST', // Use your merchant_id
    ]);

     $code = $_GET['data'];

    $decoded = base64_decode($code, true);
    $tid = json_decode($decoded);
    print_r($tid); die;
    print_r($tid->transaction_code); die;

    if ($response->successful()) {
        $data = $response->json();
        print_r($data);
        // if ($data['status'] === 'COMPLETE') {
        //     DB::table('orders')
        // ->where('txn_id',$data->transaction_uuid)
        // ->update(
        //  [
        //     'esewa_status' => 'completed'
            
        //  ]);
        //     return "Payment successful! Ref ID: " . $data;
        // } else {
        //     return "Payment verification failed!";
        // }
    } else {
        return "Error verifying transaction!";
    }
}

    }