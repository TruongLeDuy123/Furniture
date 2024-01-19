<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        return view('customer.payment-page');
    }

    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request['price']
                    ]
                ]
            ]
        ]);
        // dd($response);
        if (isset($response['id']) && $response['id'] != null)
        {
            foreach($response['links'] as $link)
            {
                if ($link['rel'] === 'approve')
                {
                    return redirect()->away($link['href']);
                }
            }
            return redirect()->route('checkout')->with('error', $response['message'] ?? "Lỗi thanh toán !");
        }
        else
        {
            return redirect()->route('checkout', ['makh' => $request['customer']])->with('error', $response['message'] ?? "Lỗi thanh toán !");
        }
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED')
        {
            return redirect('/payment-page')->with('success', 'Thanh toán PayPal thành công!');
        }
        else 
        {
            return redirect()->route('checkout', ['makh' => $request['customer']])->with('error', $response['message'] ?? "Lỗi thanh toán !");
        }
    }

    public function cancelTransaction(Request $request)
    {
        // return "Payment is cancel!";
        return redirect()->route('checkout', ['makh' => $request['customer']])->with('error', "Bạn đã đóng giao dịch !");

    }
}
