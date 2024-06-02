<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/axion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Primary</button>
    <div id="viewProduct"></div>

    @auth
    <input id="txtIdUser" type="hidden" value="{{auth()->user()->id}}">
    @endauth
  


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" >
          <div class="offcanvas-body" id="shoppingP">
      <div class="row my-3">
          <div class="col-4 text-center">
      
          </div>
          <div class="col-8">
              <div class="row fw-bold">nombre</div>
              <div class="row fw-bold">precio</div>
              <div class="row fw-bold">cantidad</div>
          </div>
      </div>
          </div>
        </div>  
        <div class="offcanvas-bottom">
          <h2 id="quantityTotal"></h2>
        </div>
        <div class="offcanvas-bottom">
          <a name="" onclick="chooseProductsend()" id="" class="btn btn-primary"  href="/formShop"  role="button">comprar</a>
        </div>
      </div>
</body>
</html>
<script src="../js/searchProduct.js"></script>
<script src="../js/archivo.js"></script>