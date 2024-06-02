<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../js/axion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand me-3 fs-5" href="#" ><i class="bi bi-google "></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
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
    <h1>compras</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Precio</th>
            <th scope="col">Direccion</th>
            <th scope="col">Forma de pago</th>
            <th scope="col">estado</th>
            <th scope="col">Fecha de pago</th>
            <th scope="col">telefono</th>
          </tr>
        </thead>
        <tbody id="tableInventory">
          
        </tbody>
      </table>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Productos</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="tableProduct">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">precio total</th>
                   
                  </tr>
                </thead>
                <tbody id="tableProductPed">
                  
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" onclick="UpdateEstado()" class="btn btn-primary">modificar</button>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
<script src="../js/formShopping.js"></script>