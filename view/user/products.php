<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $jsonObj->name ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/produtos.css">
   
</head>
<nav style="background-color: #7b113a;" class="navbar navbar-expand-lg navbar-light">
    <a style="color:white;" class="navbar-brand" href="produtos.php">Projeto Suave</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a href="about.php">sobre nos <span class="sr-only">(current)</span></a>
      </li>
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
<div class="row" style="margin:2%;">
<?php
$produtos = file_get_contents('http://localhost:3000/product/name/' . str_replace(' ', '%20',$_GET["product-name"]));
$jsonObj = json_decode($produtos);

foreach ($jsonObj as &$product){
    if($product->status == "enabled"){
   echo '<div class="col-sm-2"><div class="card" style="margin:2%; margin-bottom:10%;">';
   echo  '<div class="card-body card-margin">';
   echo '<form action="produto.php" method="GET">';
   echo '<input type="hidden" name="ID" value="' . $product->id . '">';
   echo  '<img class="img-fluid image" src="'. $product->image .'" alt="">';
   echo  '<h5 class="card-title name">' . $product->name . '</h5>';
   echo '<hr><h5 class="card-title name">' . $product->category . '</h5>';
   echo  '<p class="card-text">' . $product->description . '</p>';
   echo  '<label class="price "><h3>R$' . $product->price . '</h3></label><button type="submit" href="produto.php" class="btn btn-light" style="float: right;">Comprar</a></form>';
   echo '</div>';
   echo '</div>';
   echo '</div>';
    unset($product);
    }
}
?>
</div>
<div class="fixed-bottom bottom-container">
      <a class="footer-link" href="https://br.linkedin.com/in/lucas-gois-da-silva-8099b11b0?trk=people-guest_people_search-card"><em>LinkedIn</em></a>
      <a class="footer-link" href="https://github.com/fucasfucco"><em>Github</em></a>
      <a class="footer-link" href="https://www.facebook.com/lucas.goisdasilva.3"><em>Facebook</em></a>
      <p class="copyright">©2021 Projeto Suave.</p>
    </div>
</body>
</html>
