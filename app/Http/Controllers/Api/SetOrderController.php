<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\Success;
use App\Models\Product;

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
            'restaurant_id' => 'required|exists:restaurants,id',
            'amount' => 'numeric|regex:/^\d{1,6}(\.\d{1,2})?$/',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|numeric|min:1',
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
        // $newOrder->fill($formData);
        $newOrder->name = $formData['name'];
        $newOrder->surname = $formData['surname'];
        $newOrder->email = $formData['email'];
        $newOrder->phone_number = $formData['phone_number'];
        $newOrder->address = $formData['address'];
        $newOrder->restaurant_id = $formData['restaurant_id'];
        $newOrder->amount = $formData['amount'];
        $newOrder->save();
        $products = $formData['products'];
        foreach ($products as $productData) {
            $product = Product::find($productData['id']);
            if ($product) {
                $newOrder->products()->attach($product->id, ['quantity' => $productData['quantity']]);
            }
        }
        // invio della email di conferma ordine
        // Mail::to(env('MAIL_FROM_ADDRESS'))->send(new Success($newOrder));
        // risposta affermativa in js con l'ordine appena creato
        return response()->json([
            'success' => true,
            'order' => $newOrder
        ]);
    }
}