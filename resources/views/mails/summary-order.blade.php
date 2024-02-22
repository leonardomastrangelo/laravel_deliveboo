<div>
  <h2 class="text-center">Salve {{$order->name}}!</h2>
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
    Attendi il tuo ordine e inizia a gustarlo senza muovere un dito in cucina!
  </h5>
</div>