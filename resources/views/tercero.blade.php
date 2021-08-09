<h1>
    Cuentas de terceros
</h1>

<form method="post" action="{{route('tercerostore')}}">
    @csrf
   <label for="">Cuenta origen</label>
   <select name="origen">
       @foreach ($cuentas as $cuenta)
            <option value="{{$cuenta->id}}">{{$cuenta->cuenta}}</option>
       @endforeach
   </select>
   <label for="">Cuenta destino Externa</label>
   <select name="destino">
       @foreach ($externas as $externa)
            <option value="{{$externa->id}}">{{$externa->cuenta}}</option>
            <h2>{{$externa->cuenta}}</h2>
       @endforeach
   </select>
   <div>
   <label for="monto" class="col-sm-2 col-form-label">Monto</label>
        
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