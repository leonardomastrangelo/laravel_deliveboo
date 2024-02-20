<div>
  <h2>Salve!!</h2>
  <p>
    Hai ricevuto un ordine, ecco i dettagli: <br>
      Nome: {{ $lead->name }} <br>
      Cognome: {{ $lead->surname }} <br>
      Email: {{ $lead->email }}<br>
      Address: {{ $lead->address }}<br>
      Phone Number: {{ $lead->phone_number }}<br>
      Totale: {{ $lead->amount}} <br>
  </p>
</div>