<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Success;

class SetOrderController extends Controller
{
    public function store(Request $request)
    {
        // prende i dati del form vue
        $formData = $request->all();

        // crea una validazione per i dati del form
        $validator = Validator::make($formData, [
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|min:10|max:20',
            'address' => 'required|min:10|max:255',
            'restaurant_id' => 'required|exists:restaurant,id',
            'amount' => 'numeric|regex:/^\d{1,6}(\.\d{1,2})?$/',
        ]);

        // risponde negativamente con gli errori se i dati vengono inviati in modo errato
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // creaazione ordine, assegnazione dati e salvataggio nel db
        $newOrder = new Order;
        $newOrder->fill($formData);
        $newOrder->save();

        // invio della email di conferma ordine
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Success($newOrder));

        // risposta affermativa in js con l'ordine appena creato
        return response()->json([
            'success' => true,
            'order' => $newOrder
        ]);
    }
}
