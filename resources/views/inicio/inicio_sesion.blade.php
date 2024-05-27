<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Support Sync | Login </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/img_6.png">
    <link rel="stylesheet" href="assets/css/global_estilo.css">
    <link rel="stylesheet" href="assets/css/inicio/login_estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="box_nav">
      <img src="assets/img/img_2.png" alt="">
    </nav>

    <div class="container_transparete">
      <div class="box_login">
          <h2>Inicio de Sesión</h2>
          <form method="POST" action="{{ route('login') }}">
              @csrf <!-- Agregar protección CSRF -->
              @if ($errors->any())
                  <div class="alert alert-danger">
                      {{ $errors->first() }}
                  </div>
              @endif
              <div class="mb-3 mt-3">
                  <label for="email" class="form-label">Usuario</label>
                  <input type="email" class="form-control" id="email" placeholder="Usuario" name="email">
              </div>
              <div class="mb-3">
                  <label for="pwd" class="form-label">Contraseña:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Contraseña" name="password">
              </div>
              <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-danger">Ingresar</button>
              </div>
          </form>
      </div>
  </div>

</body>
</html>
