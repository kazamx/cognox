<h1>Mis cuentas</h1>

<form method="post" action="{{route('cuentaexterna')}}">
    @csrf
   <label for="">Cuenta origen</label>
   <select name="origen">
       @foreach ($cuentas as $cuenta)
            <option value="{{$cuenta->id}}">{{$cuenta->cuenta}}</option>
       @endforeach
   </select>

   <div class="form-group row">
        <button type="submit"
        class="btn btn-primary"
        value="transferir">
            Ir a transferencia
        </button>
  </div>
</form>