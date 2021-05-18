<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>

    .formulario{
        width: 50%;
        margin: auto;
    }
</style>
<body>
<div class="formulario">
<form action="http://localhost:3000/products" method="post">
   
    <div class="form-group"> 
    <label>Nome do Produto</label>
    <input type="text" class="form-control" name="name"  placeholder="Nome do produto"required>
  </div>
  <div class="form-group">
    <label>Preço do produto</label>
    <input type="text" class="form-control" name="price"  placeholder="Preço do produto"required>
  </div>
  <div class="form-group">
    <label>Id do seller</label>
    <input type="number" class="form-control" name="sellerId"  placeholder="Id do seller"required>
  </div>
  <div class="form-group">
    <label>Status(enabled)</label>
    <input type="text" class="form-control" name="status"  placeholder="Status"required>
  </div>
  <div class="form-group">
    <label>breve descrição</label>
    <input type="text" class="form-control" name="description"  placeholder="Breve descrição"required>
  </div>
  <div class="form-group">
    <label>descrição completa</label>
    <input type="text" class="form-control" name="fullDescription"  placeholder="Descrição completa"required>
  </div>
  <div class="form-group">
    <label>Url do produto</label>
    <input type="text" class="form-control" name="productUrl"  placeholder="Url do produtoa"required>
  </div>
  <div class="form-group">
    <label>Categoria(ex: tinto)</label>
    <input type="text" class="form-control" name="category"  placeholder="Categoria"required>
  </div>
  <div class="form-group">
    <label>Porcentagem de álcool</label>
    <input type="number" class="form-control" name="alcohool"  placeholder="Porcentagem de álcool"required>
  </div>
  <div class="form-group">
    <label>Url da imagem</label>
    <input type="text" class="form-control" name="image"  placeholder="Url da imagem"required>
  </div>
  <div class="form-group">
    <label>Quantidade em estoque</label>
    <input type="number" class="form-control" name="stock"  placeholder="Quantidade em estoque"required>
  </div>
  <div class="form-group">
    <label>Largura</label>
    <input type="number" class="form-control" name="dimensions[width]"  placeholder="Largura"required>
  </div>
  <div class="form-group">
    <label>Altura</label>
    <input type="number" class="form-control" name="dimensions[height]"  placeholder="Altura"required>
  </div>
  <div class="form-group">
    <label>Tamanho</label>
    <input type="number" class="form-control" name="dimensions[length]"  placeholder="Tamanho"required>
  </div>
  <div class="form-group">
    <label>Quantidade(ml)</label>
    <input type="number" class="form-control" name="dimensions[weight]"  placeholder="Quantidade(ml)"required>
  </div>
  <button onclick="window.location.href = '/teste/projeto/produtos.php' " type="submit" class="btn btn-primary btn-block">Criar</button>
</form>
</div>
</body>
</html>
