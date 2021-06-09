<?php
$produtos = file_get_contents('http://localhost:3000/product/' . $_GET["ID"]);
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
$random = rand(1, 20);
$outros_produtos = file_get_contents('http://localhost:3000/product/' . $random);
$outros_produtos_decode = json_decode($outros_produtos);
    if($jsonObj->status == "enabled"){
   echo '<div class="col-sm-9"><div class="card" style="margin:1%; margin-bottom:10%;">';
   echo  '<div class="card-body card-margin">';
   echo '<div class="full-description"><p>' . $jsonObj->fullDescription . '</p><hr></div>';
   echo  '<img class="img-fluid image-product" src="'. $jsonObj->image .'" alt="">';
   echo  '<h5 class="card-title name">' . $jsonObj->name . '</h5>';
   echo '<hr><div class="dimensoes container-fluid"><p>Largura: ' . $jsonObj->dimensions->width . 'cm.</p>';
   echo '<p>Altura:' . $jsonObj->dimensions->height . 'cm.</p>';
   echo'<p>quantidade: ' .$jsonObj->dimensions->weight . 'ml.</p>';
   echo '<p>Tamanho: ' . $jsonObj->dimensions->length . 'cm.</p></div>';
   echo '<h5 class="card-title name">' . $jsonObj->category . '    -   ' . $jsonObj->alcohool .'% de álcool</h5>';
   echo  '<p class="card-text">' . $jsonObj->description . '</p>';
   echo  '<label class="price "><h3>R$' . $jsonObj->price . '</h3></label><a href="mailto:fucoieemc@gmail.com" class="btn btn-light btn-block" style="float: right;">Comprar</a>';
   echo '</div>';
   echo '</div>';
   echo '</div>';
    }
    if($outros_produtos_decode->status == "enabled"){
        echo '<div class="first-product col-sm-3"><div class="first-product card" style="margin:2%; margin-bottom:10%;">';
        echo  '<div class="card-body card-margin">';
        echo '<form action="produto.php" method="GET">';
        echo '<input type="hidden" name="ID" value="' . $random . '">';
        echo  '<img class="img-fluid image" src="'. $outros_produtos_decode->image .'" alt="">';
        echo  '<h5 class="card-title name">' . $outros_produtos_decode->name . '</h5>';
        echo  '<label class="price "><h3>R$' . $outros_produtos_decode->price . '</h3></label><button type="submit" href="produto.php" class="btn btn-light" style="float: right;">Comprar</a></form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
         }
         $random = rand(1, 20);
         $outros_produtos = file_get_contents('http://localhost:3000/product/' . $random);
        $outros_produtos_decode = json_decode($outros_produtos);
        if($outros_produtos_decode->status == "enabled"){
            echo '<div class="col-sm-3"id="second-product"><div class="card" style="margin:2%; margin-bottom:10%;">';
            echo  '<div class="card-body card-margin">';
            echo '<form action="produto.php" method="GET">';
            echo '<input type="hidden" name="ID" value="' . $random . '">';
            echo  '<img class="img-fluid image" src="'. $outros_produtos_decode->image .'" alt="">';
            echo  '<h5 class="card-title name">' . $outros_produtos_decode->name . '</h5>';
            echo  '<label class="price "><h3>R$' . $outros_produtos_decode->price . '</h3></label><button type="submit" href="produto.php" class="btn btn-light" style="float: right;">Comprar</a></form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
             }
?>
</div>
<div class="bottom-container">
      <a class="footer-link" href="https://br.linkedin.com/in/lucas-gois-da-silva-8099b11b0?trk=people-guest_people_search-card"><em>LinkedIn</em></a>
      <a class="footer-link" href="https://github.com/fucasfucco"><em>Github</em></a>
      <a class="footer-link" href="https://www.facebook.com/lucas.goisdasilva.3"><em>Facebook</em></a>
      <p class="copyright">©2021 Projeto Suave.</p>
    </div>
</body>
</html>