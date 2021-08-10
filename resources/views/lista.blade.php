<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center mb-5 bg-primary text-light">
        Lista de transacciones
    </h1>
    
    
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Numero de transaccion</th>
                    <th scole="col">Cuenta origen</th>
                    <th scole="col">Cuenta destino</th>
                    <th scole="col">Tipo de cuenta</th>
                    <th scole="col">Fecha</th>
                    <th scole="col">Monto</th>
                </tr>
            </thead>
            @foreach ($transacciones as $transaccion)
            <tr>
                <td class = "col-12 justify-content-center d-flex">{{$transaccion->id}}</td>
                <td>{{$transaccion->cuenta_origen}}</td>
                <td>{{$transaccion->cuenta_destino}}</td>
                <td class = "col-12 justify-content-center d-flex">{{$transaccion->tipo_cuenta}}</td>
                <td>{{$transaccion->created_at}}</td>
                <td class = "col-12 justify-content-center d-flex">{{$transaccion->monto}}</td>
            </tr>
                
            @endforeach
        </table>
    </div>
    
    
    
</body>
</html>

