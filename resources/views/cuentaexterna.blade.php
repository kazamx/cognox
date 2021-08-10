<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Cuentas de terceros</title>
</head>
<body>
    <h1 class="text-center mb-5 bg-primary text-light">
        Transferencias cuenta terceros
    </h1>

<form method="post" action="{{route('tercerostore')}}">
    @csrf
    <div class="form-control">
        <label for="">Cuenta destino Externa</label>
        <select name="destino">
            @foreach ($externas as $externa)
                 <option value="{{$externa->id}}">{{$externa->cuenta}}</option>
            @endforeach
        </select>
    </div>
  
   <div>
    <input type="hidden"
    name="idOrigen"
    value="{{$idOrigen}}"
    id="monto"
    class="form-control">

   <label for="monto" class="col-sm-2 col-form-label">Monto</label>
        
        <div class="form-control">
            <input type="text"
            name="monto"
            id="monto"
            class="form-control">
        </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit"
            class="btn btn-primary"
            value="transferir">
                Transferir a cuenta externa
            </button>
        </div>
      </div>
</form>
</body>
</html>


