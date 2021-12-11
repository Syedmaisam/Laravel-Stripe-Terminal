<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripeTerminalController extends Controller
{
    //
    public function create(Request $request){
        // dd($request->all());
        // header('Content-Type: application/json');

        try {
        //   $json_str = file_get_contents('php://input');
        //   $json_obj = json_decode($json_str);


          // For Terminal payments, the 'payment_method_types' parameter must include
          // 'card_present' and the 'capture_method' must be set to 'manual'
          Stripe\Stripe::setApiKey('sk_test_jy8tWx31HOuWkNjssfGSt5vy00Klfg7jqg');
          $intent = Stripe\PaymentIntent::create([
            'amount' => $request->amount,
            'currency' => 'usd',
            'payment_method_types' => [
              'card_present',
            ],
            'capture_method' => 'manual',
          ]);

          echo json_encode(array('client_secret' => $intent->client_secret));
        } catch (\Exception $e) {
          http_response_code(500);
          echo json_encode(['error' => $e->getMessage()]);
        }
    }


    public function token(Request $request){
        try {
            // The ConnectionToken's secret lets you connect to any Stripe Terminal reader
            // and take payments with your Stripe account.
            // Be sure to authenticate the endpoint for creating connection tokens.
            Stripe\Stripe::setApiKey('sk_test_jy8tWx31HOuWkNjssfGSt5vy00Klfg7jqg');

            $connectionToken = Stripe\Terminal\ConnectionToken::create();
            echo json_encode(array('secret' => $connectionToken->secret));

          } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
          }
    }

    public function capture(Request $request){
        try {
            // retrieve JSON from POST body
            // $json_str = file_get_contents('php://input');
            // $json_obj = json_decode($json_str);
            Stripe\Stripe::setApiKey('sk_test_jy8tWx31HOuWkNjssfGSt5vy00Klfg7jqg');

            $intent = Stripe\PaymentIntent::retrieve($request->id);
            $intent = $intent->capture();

            echo json_encode($intent);

          } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
          }
    }
}
