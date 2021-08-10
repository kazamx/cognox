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
    <h1 class="text-center mb-5 bg-primary text-light">Bienvenido {{$usuario->nombre}} {{$usuario->apellido}}</h1>

<div>
    <div>
        <a
        value=""
        name="list"
        id="clist"
        class="form-control mx-sm-3"
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
        class="form-control mx-sm-3"
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
        class="form-control mx-sm-3"
        href="{{route('tercero',$usuario->id)}}"
        >
            Transferencias a cuentas de terceros
        </a>
    </div>
</div>

</div>

</body>
</html>

    