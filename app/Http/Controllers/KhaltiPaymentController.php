<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class KhaltiPaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
    $response = Http::withHeaders([
        'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
        'Content-Type' => 'application/json',
    ])->post(env('KHALTI_BASE_URL') . 'epayment/initiate/', [
        'return_url' => env('KHALTI_RETURN_URL'),
        'website_url' => env('KHALTI_WEBSITE_URL'),
        'amount' => 1300, // in paisa
        'purchase_order_id' => 'order_' . uniqid(),
        'purchase_order_name' => 'Sample Product',
        'customer_info' => [
            'name' => 'Test User',
            'email' => 'user@example.com',
            'phone' => '9800000001',
        ],
        'amount_breakdown' => [
            ['label' => 'Base Price', 'amount' => 1000],
            ['label' => 'VAT', 'amount' => 300],
        ],
        'product_details' => [
            [
                'identity' => '123456',
                'name' => 'Test Product',
                'total_price' => 1300,
                'quantity' => 1,
                'unit_price' => 1300,
            ],
        ],
        'merchant_username' => 'your_merchant_name',
        'merchant_extra' => 'optional_info'
    ]);

    if ($response->successful()) {
        $data = $response->json();
        return redirect()->away($data['payment_url']);
    }

    return response()->json(['error' => 'Payment initiation failed'], 500);
}

public function paymentCallback(Request $request)
{
    $status = $request->get('status');
    $pidx = $request->get('pidx');

    // Optional: Save these details to DB for logs

    if ($status === 'Completed') {
        // Verify payment with lookup
        return redirect()->route('khalti.lookup', ['pidx' => $pidx]);
    }

    return response('Payment was not completed: ' . $status);
}
public function verifyPayment(Request $request)
{
    $pidx = $request->get('pidx');

    $response = Http::withHeaders([
        'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
    ])->post(env('KHALTI_BASE_URL') . 'epayment/lookup/', [
        'pidx' => $pidx
    ]);

    $data = $response->json();

    if (isset($data['status']) && $data['status'] === 'Completed') {
        // Payment success. Grant service here.
        return response()->json(['message' => 'Payment verified and successful.']);
    }

    return response()->json(['error' => 'Payment not completed.', 'status' => $data['status'] ?? 'unknown']);
}

public function returnUrl(){
    echo "Success";
}


}
