<h1>
    Cuenta
</h1>

<form method="post" action="{{route('cuentastore')}}">
    @csrf
   <label for="">Cuenta origen</label>
   <select name="origen">
       @foreach ($cuentas as $cuenta)
            <option value="{{$cuenta->id}}">{{$cuenta->cuenta}}</option>
       @endforeach
   </select>
   <label for="">Cuenta destino</label>
   <select name="destino">
       @foreach ($cuentas as $cuenta)
            <option value="{{$cuenta->id}}">{{$cuenta->cuenta}}</option>
       @endforeach
   </select>
   <label for="monto" class="col-sm-2 col-form-label">Monto</label>
        <div>
            <input type="text"
            name="monto"
            id="monto"
            class="form-control"
            placeholder="monto">
        </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit"
            class="btn btn-primary"
            value="transferir">
                Transferir
            </button>
        </div>
      </div>