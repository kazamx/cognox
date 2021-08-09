<h1>Transferencias cuenta terceros</h1>

<form method="post" action="{{route('tercerostore')}}">
    @csrf
   <label for="">Cuenta destino Externa</label>
   <select name="destino">
       @foreach ($externas as $externa)
            <option value="{{$externa->id}}">{{$externa->cuenta}}</option>
       @endforeach
   </select>
   <div>
    <input type="hidden"
    name="idOrigen"
    value="{{$idOrigen}}"
    id="monto"
    class="form-control"
    placeholder="monto">

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
                Transferir a cuenta externa
            </button>
        </div>
      </div>
</form>