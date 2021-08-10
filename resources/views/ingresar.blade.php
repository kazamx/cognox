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
        Ingresar
    </h1>

<form method="post" action="{{route('inicio')}}">
    @csrf
    <div class="form-control">
        <label for="usuario" class="col-sm-2 col-form-label">USUARIO</label>
        <div>
            <input type="text"
            name="cedula"
            id="cedula"
            class="form-control">
        </div>
    </div>
    
    <div class="form-control">
        <label for="password" class="col-sm-2 col-form-label">CONTRASEÑA</label>
        <div>
            <input type="password"
            name="password"
            id="password"
            class="form-control">
        </div>
    </div>

    <div class="col-form-label">

            <button type="submit"
            class="btn btn-primary"
            value="Ingresar">
                Sign in
            </button>
       
      </div>

</form>


</body>
</html>


