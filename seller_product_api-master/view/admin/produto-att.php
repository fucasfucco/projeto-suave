<?php
session_start();
if(!empty($_GET["ID"])){
    $produtos = file_get_contents('http://localhost:3000/product/' . $_GET["ID"]);
    $jsonObj = json_decode($produtos);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/produtos.css">
</head>
<style>

.formulario{
        width: 30%;
        float: right;
        margin: 2%;
        margin-top:0;
    }
</style>
<body>
<nav style="background-color: #7b113a;" class="navbar navbar-expand-lg navbar-light">
    <a style="color:white;" class="navbar-brand" href="../user/produtos.php">Projeto Suave</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
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
      <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Pesquisar</button>
    </form>
  </div>
</nav>
<?php
if(!empty($_GET["ID"])){
      echo '   <div class="formulario">';
      echo '<form action="http://localhost:3000/update/product/'. $_GET['ID'] .'" method="post">';
      echo '   <label"><h1>Atualização de Produtos.</h1><a href="crud-product.php">Outras alternativas</a></label>';
      echo '    <div class="form-group"> ';
      echo '    <label>Nome do Produto</label>';
      echo '    <input type="text" class="form-control" name="name" value="' . $jsonObj->name . '" placeholder="Nome do produto"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Preço do produto</label>';
      echo '    <input type="text" class="form-control" name="price" value="' . $jsonObj->price . '" placeholder="Preço do produto"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Id do seller</label>';
      echo '    <input type="number" class="form-control" name="sellerId" value="' . $jsonObj->sellerId . '" placeholder="Id do seller"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Status(enabled)</label>';
      echo '    <input type="text" class="form-control" name="status" value="' . $jsonObj->status . '" placeholder="Status"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>breve descrição</label>';
      echo '    <input type="text" class="form-control" name="description" value="' . $jsonObj->description . '" placeholder="Breve descrição"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>descrição completa</label>';
      echo '    <input type="text" class="form-control" name="fullDescription" value="' . $jsonObj->fullDescription . '" placeholder="Descrição completa"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Url do produto</label>';
      echo '    <input type="text" class="form-control" name="productUrl" value="' . $jsonObj->productUrl . '"  placeholder="Url do produtoa"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Categoria(ex: tinto)</label>';
      echo '    <input type="text" class="form-control" name="category" value="' . $jsonObj->category . '" placeholder="Categoria"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Porcentagem de álcool</label>';
      echo '    <input type="number" class="form-control" name="alcohool" value="' . $jsonObj->alcohool . '" placeholder="Porcentagem de álcool"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Url da imagem</label>';
      echo '    <input type="text" class="form-control" name="image" value="' . $jsonObj->image . '" placeholder="Url da imagem"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Quantidade em estoque</label>';
      echo '    <input type="number" class="form-control" name="stock" value="' . $jsonObj->stock . '" placeholder="Quantidade em estoque"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Largura</label>';
      echo '    <input type="number" class="form-control" name="dimensions[width]" value="' . $jsonObj->dimensions->width . '" placeholder="Largura"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Altura</label>';
      echo '    <input type="number" class="form-control" name="dimensions[height]" value="' . $jsonObj->dimensions->height . '" placeholder="Altura"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Tamanho</label>';
      echo '    <input type="number" class="form-control" name="dimensions[length]" value="' . $jsonObj->dimensions->length . '" placeholder="Tamanho"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Quantidade(ml)</label>';
      echo '    <input type="number" class="form-control" name="dimensions[weight]" value="' . $jsonObj->dimensions->weight . '" placeholder="Quantidade(ml)"required>';
      echo '  </div>';
      echo '  <button type="submit" class="btn btn-primary btn-block">Atualizar</button>';
      echo '  </form>';
      echo '  </div>';
        echo '<div class="col-sm-8"><div class="card" style="margin:1%; margin-bottom:10%;">';
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
}else{
  echo '<div class="formulario">';
echo '<form action="http://localhost:3000/products" method="post">';
echo '   <label"><h1>Criação de Produtos.</h1><a href="crud-product.php">Outras alternativas</a></label>';
echo '    <div class="form-group"> ';
echo '    <label>Nome do Produto</label>';
echo '    <input type="text" class="form-control" name="name"  placeholder="Nome do produto"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Preço do produto</label>';
echo '    <input type="text" class="form-control" name="price"  placeholder="Preço do produto"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Id do seller</label>';
echo '    <input type="number" class="form-control" name="sellerId"  placeholder="Id do seller"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Status(enabled)</label>';
echo '    <input type="text" class="form-control" name="status"  placeholder="Status"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>breve descrição</label>';
echo '    <input type="text" class="form-control" name="description"  placeholder="Breve descrição"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>descrição completa</label>';
echo '    <input type="text" class="form-control" name="fullDescription"  placeholder="Descrição completa"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Url do produto</label>';
echo '    <input type="text" class="form-control" name="productUrl"  placeholder="Url do produtoa"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Categoria(ex: tinto)</label>';
echo '    <input type="text" class="form-control" name="category"  placeholder="Categoria"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Porcentagem de álcool</label>';
echo '    <input type="number" class="form-control" name="alcohool"  placeholder="Porcentagem de álcool"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Url da imagem</label>';
echo '    <input type="text" class="form-control" name="image"  placeholder="Url da imagem"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Quantidade em estoque</label>';
echo '    <input type="number" class="form-control" name="stock"  placeholder="Quantidade em estoque"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Largura</label>';
echo '    <input type="number" class="form-control" name="dimensions[width]"  placeholder="Largura"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Altura</label>';
echo '    <input type="number" class="form-control" name="dimensions[height]"  placeholder="Altura"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Tamanho</label>';
echo '    <input type="number" class="form-control" name="dimensions[length]"  placeholder="Tamanho"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Quantidade(ml)</label>';
echo '    <input type="number" class="form-control" name="dimensions[weight]"  placeholder="Quantidade(ml)"required>';
echo '  </div>';
echo '  <button type="submit" class="btn btn-primary btn-block">Criar</button>';
echo '</form>';
echo '</div>';
}
?>

</body>
</html>