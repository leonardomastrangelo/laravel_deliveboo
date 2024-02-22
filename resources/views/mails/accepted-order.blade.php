<div>
  <h2>Salve Ristoratore!</h2>
  <h3>Hai ricevuto un ordine, ecco i dettagli:</h3> 
  <ul>
    <li>
      Nome: {{ $order->name }} 
    </li>
    <li>
      Cognome: {{ $order->surname }} 
    </li>
    <li>
      Email: {{ $order->email }}
    </li>
    <li>
      Address: {{ $order->address }}
    </li>
    <li>
      Phone Number: {{ $order->phone_number }}
    </li>
  </ul>

  <h3>
    Prodotti ordinati
  </h3>
  <ul>
    @foreach ($order->products as $product)   
    <li>
      {{ $product->name }} | {{$product->price }} € | X {{$product->pivot->quantity}}
    </li>
    @endforeach
  </ul>
  <h1>
    Totale: {{ $order->amount}}€
  </h1>

  <h5>
    Il rider arriverà da voi appena possibile!
  </h5>
</div>