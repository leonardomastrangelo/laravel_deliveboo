<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '5pbryjzfb6jtngmk',
            'publicKey' => 'wp5dnr224gm4wb4t',
            'privateKey' => '0cf2f24a03ec81ad4b745f9ab485f120'
        ]);
        $nonce = $request->input('paymentMethodNonce');
        $amount = '1'; // Specifica l'importo del pagamento
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => ['submitForSettlement' => true]
        ]);
        if ($result->success) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}