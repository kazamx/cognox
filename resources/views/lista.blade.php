<h1>
    Lista de transacciones
</h1>


<div class="form-group row">
    <table>
        <tr>
            <th>Numero de transaccion</th>
            <th>Cuenta origen</th>
            <th>Cuenta destino</th>
            <th>Tipo de cuenta</th>
            <th>Fecha</th>
            <th>Monto</th>
        </tr>
        @foreach ($transacciones as $transaccion)
        <tr>
            <td>{{$transaccion->id}}</td>
            <td>{{$transaccion->cuenta_origen}}</td>
            <td>{{$transaccion->cuenta_destino}}</td>
            <td>{{$transaccion->tipo_cuenta}}</td>
            <td>{{$transaccion->created_at}}</td>
            <td>{{$transaccion->monto}}</td>
        </tr>
            
        @endforeach
    </table>
</div>


