<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Simple State Challenge</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="https://www.mercadolibre.com.ar/brandprotection/enforcement/images?src=meli-logo.png" width="30"
             height="30" alt="">
        Mercadolibre
    </a>
</nav>

<div class="container">
    @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    @isset($products)
    <div class="row col-md-12">
        <ul class="list-group">
            @foreach($products->products as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <p>{{ $product->title }}
                        <br>
                        <small><b>Price</b> ${{ $product->price }}</small>
                        <br>
                        <small><b>Sold quantity</b> {{ $product->sold_quantity }}</small>
                    </p>
                    <div class="image-parent">
                        <img src={{ $product->img }} class="img-fluid" alt="quixote">
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <h3>Suma total precios: ${{ $products->price }}</h3>
    <h3>Cantidad total vendidos: {{ $products->sold }}</h3>
    @endisset
    @isset($url)
    <div class="content text-center mt-3">
        <a class="btn btn-warning" href={{ $url }}>
            Login
        </a>
    </div>
    @endisset
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
