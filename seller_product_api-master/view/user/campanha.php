<?php
session_start();
$produtos = file_get_contents('http://localhost:3000/campaign/' . $_GET["ID"]);
$jsonObj = json_decode($produtos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $jsonObj->name ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/produtos.css">
   
</head>
<nav id="navbar" style="background-color: #7b113a;" class="navbar navbar-expand-lg navbar-light">
    <a style="color:white;" class="navbar-brand" href="produtos.php">Projeto Suave</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a href="about.php">sobre nos <span class="sr-only">(current)</span></a>
      </li>
      <?php
                 if (!empty($_SESSION['usuario'])) {
                    echo '<li class="nav-item">';
                    echo '<a style="color:white;" class="nav-link" href="../../login/logout.php">logout<span class="sr-only">(current)</span></a>';
                    echo '</li>';
                 }else{
                    echo '<li class="nav-item">';
                    echo '<a style="color:white;" class="nav-link" href="../../login/index.php">login<span class="sr-only">(current)</span></a>';
                    echo '</li>';
                 }
                ?> 
    </ul>
    <form action="products.php" method="GET" class="form-inline my-2 my-lg-0">
      <input type="text" name="product-name"class="form-control mr-sm-2" placeholder="Digite Nome do Produto">
      <button type="submit" class="btn btn-outline-success my-2 my-sm-0">pesquisar</button>
    </form>
  </div>
</nav>
<style>
    body{
        color: white;
    }
    a{
        color: white;
    }
    a:hover{
        color: lightgray;
    }
</style>
<body>
<div id="alert" style="display: none;" class="alert alert-dark" role="alert">
        Campanha deletada com sucesso.
    </div>
<div id="some"class="container-fluid about-us">
    <h1 class="about">Projeto Suave</h1>
    <form action="http://localhost:3000/campaign/delete/<?php echo $jsonObj->campaignId ?>" method="post"><button onclick="some()"type="submit" class="butao btn btn-danger">X</button></form>
    <h2 class="about-h2"><?php echo $jsonObj->name ?>.</h2>
    <form action="" method="post"></form>
    <img class="third img-fluid image" src="data:image/jpeg;base64,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" alt="">
    <img class="second img-fluid image" src="https://statics.divvino.com.br/divvino/files/4246850/4246850_1_medium.jpg" alt="">
    <img class="first img-fluid image" src="https://statics.angeloni.com.br/super/files/produtos/4370242/4370242_1_medium.jpg" alt="">    
</div>
<div id="campaign" class="row" style="margin:2%;">
<?php
foreach ($jsonObj->items as &$miniProduct) {
  $novo = file_get_contents('http://localhost:3000/product/' . $miniProduct);
  $decodificado = json_decode($novo);
  echo '<div class="col-sm-2"><div class="card" style="margin:2%; margin-bottom:10%;">';
  echo  '<div class="card-body card-margin">';
  echo '<form action="produto-att.php" method="GET">';
  echo '<input type="hidden" name="ID" value="' . $decodificado->id . '">';
  echo  '<img class="img-fluid image" src="' . $decodificado->image . '" alt="">';
  echo  '<h5 class="card-title name">' . $decodificado->name . '</h5>';
  echo '<hr><h5 class="card-title name">' . $decodificado->category . '</h5>';
  echo  '<p class="card-text">' . $decodificado->description . '</p>';
  echo  '<label class="price "><h3>R$' . $decodificado->price . '</h3></label><button type="button" onclick="addProduct(' . $decodificado->id . ')" class="btn btn-light" style="float: right;">Adicionar</a></form>';
  echo '<form action="http://localhost:3000/delete/product/' . $decodificado->id . '" method="post"><button type="submit" class="butao btn btn-danger">X</button></form>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  unset($miniProduct);
}
?>
</div>
<div id="footer" class="bottom-container">
      <a class="footer-link" href="https://br.linkedin.com/in/lucas-gois-da-silva-8099b11b0?trk=people-guest_people_search-card"><em>LinkedIn</em></a>
      <a class="footer-link" href="https://github.com/fucasfucco"><em>Github</em></a>
      <a class="footer-link" href="https://www.facebook.com/lucas.goisdasilva.3"><em>Facebook</em></a>
      <p class="copyright">??2021 Projeto Suave.</p>
    </div>
</body>
<script>
function some(){
  document.getElementById('some').style.display = "none";
  document.getElementById('campaign').style.display = "none";
  document.getElementById('footer').style.display = "none";
  document.getElementById('alert').style.display = "block";
}
</script>
</html>

