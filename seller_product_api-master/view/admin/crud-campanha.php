<?php
session_start();
if(!empty($_GET["ID"])){
    $produtos = file_get_contents('http://localhost:3000/campaign/' . $_GET["ID"]);
    $jsonObj = json_decode($produtos);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/produtos.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Projeto Suave</title>
</head>
<style>
    body {
        color: white;
    }

    a {
        color: white;
    }

    a:hover {
        color: lightgray;
    }

    .butao {
        width: 50px;
        height: 30px;
        float: right;
    }

    h4 {
        color: black;
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
                    <a style="color:white;" class="nav-link" href="../user/about.php">sobre nos <span class="sr-only">(current)</span></a>
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
                <input type="text" name="product-name" class="form-control mr-sm-2" placeholder="Digite Nome do Produto">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">pesquisar</button>
            </form>
        </div>
    </nav>
    <?php

    if(!empty($_GET["ID"])){
        echo '<div id="campaign">';
        echo '<form method="post" action="http://localhost:3000/campaign/update/' . $_GET['ID'] .'">';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->name . '" name="name" placeholder="Nome da Campanha" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[0] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[1] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[2] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[3] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[4] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[5] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[6] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[7] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[8] . '" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" value="' . $jsonObj->items[9] . '" name="items" placeholder=Produtos" required>';
        echo '    <button type="submit" class="btn btn-primary btn-block">Atualizar</button>';
        echo '</form>';
        echo '</div>';
    }else{
        echo '<div id="campaign">';
        echo '<form method="post" action="http://localhost:3000/campaigns">';
        echo '    <input type="text" class="form-control" name="name" placeholder="Nome da Campanha" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder="Produtos" required>';
        echo '    <input type="text" class="form-control" name="items" placeholder=Produtos" required>';
        echo '    <button type="submit" class="btn btn-primary btn-block">Criar</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>



    <div class="row" style="margin:2%;">
        <?php
        $produtos = file_get_contents('http://localhost:3000/products');
        $jsonObj = json_decode($produtos);
        foreach ($jsonObj as &$product) {
            echo '<div class="col-sm-2"><div class="card" style="margin:2%; margin-bottom:10%;">';
            echo  '<div class="card-body card-margin">';
            echo '<form action="produto-att.php" method="GET">';
            echo '<input type="hidden" name="ID" value="' . $product->id . '">';
            echo  '<img class="img-fluid image" src="' . $product->image . '" alt="">';
            echo  '<h5 class="card-title name">' . $product->name . '</h5>';;
            echo '<hr><h5 class="card-title name">' . $product->category . '-ID = ' . $product->id . '</h5>';
            echo  '<p class="card-text">' . $product->description . '</p>';
            echo  '<label class="price "><h3>R$' . $product->price . '</h3></label>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            unset($product);
        }
        ?>
    </div>
    <div class=" bottom-container">
        <a class="footer-link" href="https://br.linkedin.com/in/lucas-gois-da-silva-8099b11b0?trk=people-guest_people_search-card"><em>LinkedIn</em></a>
        <a class="footer-link" href="https://github.com/fucasfucco"><em>Github</em></a>
        <a class="footer-link" href="https://www.facebook.com/lucas.goisdasilva.3"><em>Facebook</em></a>
        <p class="copyright">??2021 Projeto Suave.</p>
    </div>
</body>

</html>