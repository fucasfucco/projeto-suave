<?php
if(!empty($_GET["ID"])){
    $produtos = file_get_contents('http://localhost:3000/seller/' . $_GET["ID"]);
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
    <link rel="stylesheet" href="../../css/produtos.css">
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
      <li class="nav-item">
      <a style="color:white;" class="nav-link" href="../login/login.php">Login<span class="sr-only">(current)</span></a>
      </li>
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
      echo '<form action="http://localhost:3000/update/seller/'. $_GET['ID'] .'" method="post">';
      echo '   <label"><h1>Atualização de Seller.</h1><a href="crud-seller.php">Outras alternativas</a></label>';
      echo '    <div class="form-group"> ';
      echo '    <label>Nome do Seller</label>';
      echo '    <input type="text" class="form-control" name="name" value="' . $jsonObj->name . '" placeholder="Nome do Seller"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Comissão do vendedor</label>';
      echo '    <input type="number" class="form-control" name="sellerComission" value="' . $jsonObj->sellerComission . '" placeholder="Comissão do vendedor"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>forma de envio</label>';
      echo '    <input type="text" class="form-control" name="shipping" value="' . $jsonObj->shipping . '" placeholder="forma de envio"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Status(enabled)</label>';
      echo '    <input type="text" class="form-control" name="status" value="' . $jsonObj->status . '" placeholder="Status"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>descrição</label>';
      echo '    <input type="text" class="form-control" name="description" value="' . $jsonObj->description . '" placeholder="descrição"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Rua</label>';
      echo '    <input type="text" class="form-control" name="address[street]" value="' . $jsonObj->address->street . '" placeholder="Rua"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Bairro</label>';
      echo '    <input type="text" class="form-control" name="address[district]" value="' . $jsonObj->address->district . '" placeholder="Bairro"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Número</label>';
      echo '    <input type="text" class="form-control" name="address[number]" value="' . $jsonObj->address->number . '" placeholder="Número"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>CEP</label>';
      echo '    <input type="text" class="form-control" name="address[CEP]" value="' . $jsonObj->address->CEP . '" placeholder="CEP"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Cidade</label>';
      echo '    <input type="text" class="form-control" name="address[city]" value="' . $jsonObj->address->city . '" placeholder="Cidade"required>';
      echo '  </div>';
      echo '  <div class="form-group">';
      echo '    <label>Estado</label>';
      echo '    <input type="text" class="form-control" name="address[state]" value="' . $jsonObj->address->state . '" placeholder="Estado"required>';
      echo '  </div>';
      echo '  <button type="submit" class="btn btn-primary btn-block">Criar</button>';
      echo '</form>';
      echo '</div>'; 
      echo '<div class="col-sm-8"><div class="card" style="margin:2%; margin-bottom:10%;">';
      echo  '<div class="card-body card-margin">';
      echo '<form action="seller.php" method="GET">';
      echo '<input type="hidden" name="ID" value="' . $jsonObj->id . '">';
      echo  '<h5 class="card-title name">Nome: ' . $jsonObj->name . '</h5>';
      echo '<label class="price "><h3>meio de entrega: ' . $jsonObj->shipping . '</h3></label>';
      echo '<hr><h5 class="card-title name">Comissão: ' . $jsonObj->sellerComission . '</h5>';
      echo  '<p class="card-text">Descrição: ' . $jsonObj->description . '</p>';
      echo '<p>Status do seller -> ' . $jsonObj->status . '</p>';
      echo '<p>Rua:' . $jsonObj->address->street . '.</p>';
      echo' <p>Bairro: ' .$jsonObj->address->district . '.</p>';
      echo '<p>Número: ' . $jsonObj->address->number . '.</p>';
      echo '<p>CEP: ' . $jsonObj->address->CEP . '.</p>';
      echo '<p>Cidade: ' . $jsonObj->address->city . '.</p>';
      echo '<p>Estado: ' . $jsonObj->address->state . '.</p>';
      echo  '<button type="submit" href="produto.php" class="btn btn-light" style="float: right;">Atualizar</a></form>';
      echo '<form action="http://localhost:3000/delete/seller/' . $jsonObj->id .'" method="post"><button type="submit" class="butao btn btn-danger">X</button></form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
}else{
  echo '<div class="formulario">';
echo '<form action="http://localhost:3000/sellers" method="post">';
echo '   <label"><h1>Criação de Seller.</h1><a href="crud-product.php">Outras alternativas</a></label>';
echo '    <div class="form-group"> ';
echo '    <label>Nome do Seller</label>';
echo '    <input type="text" class="form-control" name="name"  placeholder="Nome do Seller"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Comissão do vendedor</label>';
echo '    <input type="number" class="form-control" name="sellerComission"  placeholder="Comissão do vendedor"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>forma de envio</label>';
echo '    <input type="text" class="form-control" name="shipping"  placeholder="forma de envio"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Status(enabled)</label>';
echo '    <input type="text" class="form-control" name="status"  placeholder="Status"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>descrição</label>';
echo '    <input type="text" class="form-control" name="description"  placeholder="descrição"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Rua</label>';
echo '    <input type="text" class="form-control" name="address[street]"  placeholder="Rua"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Bairro</label>';
echo '    <input type="text" class="form-control" name="address[district]"  placeholder="Bairro"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Número</label>';
echo '    <input type="text" class="form-control" name="address[number]"  placeholder="Número"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>CEP</label>';
echo '    <input type="text" class="form-control" name="address[CEP]"  placeholder="CEP"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Cidade</label>';
echo '    <input type="text" class="form-control" name="address[city]"  placeholder="Cidade"required>';
echo '  </div>';
echo '  <div class="form-group">';
echo '    <label>Estado</label>';
echo '    <input type="text" class="form-control" name="address[state]"  placeholder="Estado"required>';
echo '  </div>';
echo '  <button type="submit" class="btn btn-primary btn-block">Criar</button>';
echo '</form>';
echo '</div>';
}
?>
</body>
</html>