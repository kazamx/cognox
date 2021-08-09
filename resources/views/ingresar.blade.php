<h1>Ingresar</h1>

<form method="post" action="{{route('inicio')}}">
    @csrf
    <div class="form-group row">
        <label for="usuario" class="col-sm-2 col-form-label">USUARIO</label>
        <div>
            <input type="text"
            name="cedula"
            id="cedula"
            class="form-control"
            placeholder="Usuario">
        </div>
    </div>
    
    <div>
        <label for="password" class="col-sm-2 col-form-label">CONTRASEÑA</label>
        <div>
            <input type="password"
            name="password"
            id="password"
            class="form-control"
            placeholder="password">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit"
            class="btn btn-primary"
            value="Ingresar">
                Sign in
            </button>
        </div>
      </div>

</form>

