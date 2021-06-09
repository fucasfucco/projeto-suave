
<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Projeto Suave</title>

  </head>

<style>
  body{
    background-color:#deedf0;
  }
  .img{
    margin-top: 100px;
  }
</style>
<?php

?>

  <body class="text-center">
    <form class="form-signin">
      <div class="mb-4 container-fluid">
      <img class="mb-4 img" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">

      <h1 class="h3 mb-3 font-weight-normal">Conecte-se</h1>
      <label for="inputEmail" class="sr-only">Nome do Usuário</label>

      <input style="display:inline;" type="text" name="user" id="user" class="form-control mb-4 col-sm-6" placeholder="Nome do Usuário" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>

      <input style="display:inline;" type="password" id="password" name="password" class="form-control mb-4 col-sm-6 " placeholder="Senha" required>

      </div>
      <button class="btn btn-lg btn-light" type="submit">Iniciar</button>
      <button class="btn btn-lg btn-dark" type="submit">Registrar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021 :)</p>
    </form>
  </body>
</html>
