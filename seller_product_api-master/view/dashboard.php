<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/produtos.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
        rel="stylesheet">
</head>

<body>

    <nav style="background-color: #7b113a;" class="navbar navbar-expand-lg navbar-light">
        <a style="color:white;" class="navbar-brand" href="./user/produtos.php">Projeto Suave</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="./user/about.php">sobre nos <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="./login/login.php">login<span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="products.php" method="GET" class="form-inline my-2 my-lg-0">
                <input type="text" name="product-name" class="form-control mr-sm-2"
                    placeholder="Digite Nome do Produto">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">pesquisar</button>
            </form>
        </div>
    </nav>

    <div class="row" style="margin:2%;">

        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="user/produtos.php" method="GET">
                        <img class="img-fluid image"
                            src="https://s2.glbimg.com/q8GtQvGMG551k-5anFDx875JZUU=/620x466/e.glbimg.com/og/ed/f/original/2020/05/01/vinhos.jpg"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Produtos</h3>
                        </label><button type="submit" href="user/produtos.php" class="btn btn-light"
                            style="float: right;">Comprar</a>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="user/campanhas.php" method="GET">
                        <img class="img-fluid image"
                            src="data:image/jpeg;base64,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"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Campanhas</h3>
                        </label><button type="submit" href="user/campanhas.php" class="btn btn-light"
                            style="float: right;">Comprar</a>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="user/about.php" method="GET">
                        <img class="img-fluid image"
                            src="data:image/jpeg;base64,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"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Sobre nós</h3>
                        </label><button type="submit" href="user/about.php" class="btn btn-light"
                            style="float: right;">Comprar</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="alert alert-dark" role="alert">
        Você está logado! logo pode ver esse modal abaixo.
    </div>

    <div class="row" style="margin:2%;">

        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="../view/admin/seller.php" method="GET">
                        <img class="img-fluid image"
                            src="https://comps.canstockphoto.com.br/admin-stamp-desenho_csp19822598.jpg"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Sellers</h3>
                        </label><button type="submit" href="../view/admin/seller.php" class="btn btn-light"
                            style="float: right;">Criar</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="../view/admin/crud-campanha.php" method="GET">
                        <img class="img-fluid image"
                            src="https://comps.canstockphoto.com.br/admin-stamp-desenho_csp19822598.jpg"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Campanhas</h3>
                        </label><button type="submit" href="../view/admin/crud-campanha.php" class="btn btn-light"
                            style="float: right;">Criar</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="../view/admin/produto-att.php" method="GET">
                        <img class="img-fluid image"
                            src="https://comps.canstockphoto.com.br/admin-stamp-desenho_csp19822598.jpg"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Produtos</h3>
                        </label><button type="submit" href="../view/admin/produto-att.php" class="btn btn-light"
                            style="float: right;">Criar</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row" style="margin:2%;">

    <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="../view/admin/crud-seller.php" method="GET">
                        <img class="img-fluid image"
                            src="https://comps.canstockphoto.com.br/admin-stamp-desenho_csp19822598.jpg"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Sellers</h3>
                        </label><button type="submit" href="../view/admin/crud-seller.php" class="btn btn-light"
                            style="float: right;">Gerenciar</a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card" style="margin:2%;">
                <div class="card-body">
                    <form action="../view/admin/crud-product.php" method="GET">
                        <img class="img-fluid image"
                            src="https://comps.canstockphoto.com.br/admin-stamp-desenho_csp19822598.jpg"
                            alt="">
                        <h5 class="card-title name">-----</h5>
                        <label class="price ">
                            <h3>Produtos</h3>
                        </label><button type="submit" href="../view/admin/crud-product.php" class="btn btn-light"
                            style="float: right;">Gerenciar</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class=" bottom-container">
        <a class="footer-link"
            href="https://br.linkedin.com/in/lucas-gois-da-silva-8099b11b0?trk=people-guest_people_search-card"><em>LinkedIn</em></a>
        <a class="footer-link" href="https://github.com/fucasfucco"><em>Github</em></a>
        <a class="footer-link" href="https://www.facebook.com/lucas.goisdasilva.3"><em>Facebook</em></a>
        <p class="copyright">©2021 Projeto Suave.</p>
    </div>

</body>

</html>