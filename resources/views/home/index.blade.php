<!DOCTYPE html >
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/axion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body onload="laodfuncion()">
  <style>
    body{
      background: radial-gradient(circle, rgb(3, 6, 6), rgb(0, 195, 255));
    } 
  </style>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand me-3 fs-5" href="#" ><i class="bi bi-google "></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/compras">compras</a>
          </li>
          
        </ul>
        <div>
          
          @guest
              <a href="/login">iniciar sesion</a>

                  
              @else
              <div>

              </div>
              <div class="d-flex">
                <div class="col-6">
                  <h4>{{auth()->user()->username}}</h4>
                </div> 
                <div class="col-6">
                  <a class="btn btn-success w-100 me-5" href="/logout"><i class="bi bi-box-arrow-right"></i></a>
                </div>
                
              </div>
             
            

          @endguest
        </div>
      </div>
    </div>
  </nav>

 @auth 
    
 @endauth

<div class="d-flex">
<div class="col-6">
  <button style="width: 10em" type="button" class="btn btn-primary ms-5 mt-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-cart"></i></button>
</div> 
<div class="col-6 d-flex justify-content-end align-item-center mt-3 ">
  <input style="width: 250px; height: 40px;" onkeyup="SearchProduct()" id="searchP" type="text"><i class="bi bi-search ms-2 fs-5 pe-5"></i>
  <div class="mt-5" id="productList"></div>   
</div>
</div>
    
 
   
        
    
    
    <div  class="mt-2  d-flex justify-content-center p-5 flex-wrap" id="productExhibition"></div>
  
  @auth
  <input id="txtIdUser" type="hidden" value="{{auth()->user()->id}}">
  @endauth




<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">CARRITO DE COMPRAS</h5>
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
    <div class="d-flex justify-content-center">
      <h2 id="quantityTotal"></h2>
    </div>
    
  </div>
  <div class="offcanvas-bottom">
    <hr>
    <div class="d-flex justify-content-center">
@guest
<a name=""  id="" class="btn btn-primary mb-4 w-75" href="/login" role="button">iniciar sesion</a>

@else
<a name="" onclick="chooseProductsend()" id="" class="btn btn-primary mb-4 w-75"  role="button">comprar</a> 

@endguest
    </div>
    
  </div>
</div>
</body>
</html>

<script src="../js/shop.js"></script>
<script src="../js/archivo.js"></script>