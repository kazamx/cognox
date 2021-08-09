<h1>Bienvenido {{$usuario->nombre}} {{$usuario->apellido}}</h1>

<h2>
    INICIO
</h2>

<div>
    <div>
        <a
        value=""
        name="list"
        id="clist"
        class="form-control"
        href="{{route('lista')}}"
        >
            Lista de transacciones
        </a>
    </div>

    <div>
        <a
        value=""
        name="list"
        id="list"
        class="form-control"
        href="{{route('cuenta',$usuario->id)}}"
        >
            Transferencias entre cuentas propias
        </a>
    </div>
    <div>
        <a
        value=""
        name="tercero"
        id="tercero"
        class="form-control"
        href="{{route('tercero',$usuario->id)}}"
        >
            Transferencias a cuentas de terceros
        </a>
    </div>
</div>


