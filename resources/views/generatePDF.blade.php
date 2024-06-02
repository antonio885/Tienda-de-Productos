<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Factura de Compra</h1>
    @foreach ($pedido as $pedido)
      <h3>Señor: {{$pedido->nombre}}  {{$pedido->apellido}}</h3>
&nbsp;
      <p>Estado del Producto: {{$pedido->estadoPedido}}</p>

      <p>direccion: {{$pedido->direccion}}</p>

      
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">compras</th>
            <th scope="col">producto</th>
            <th scope="col">cantidad</th>
            <th scope="col">precio</th>
            <th scope="col">total unitario</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($product as $product)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{$product->nombrePro}}</td>
            <td>{{$product->cantidad}}</td>
            <td>{{$product->PrecioUnit}}</td>
            <td>{{$product->PrecioTotal}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      &nbsp;
      <hr>
      <h4>Metodo de Pago: {{$pedido->formaPago}}</h4>
      <h3>total del pedido: {{$pedido->totalPed}}</h3>
     
    @endforeach
</body>
</html>