<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/datatables.css">
    <link rel="stylesheet" href="../CSS/alertify.css">
    <link rel="stylesheet" href="../CSS/style.css">
  
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/datatables.js"></script>
    <script src="../js/alertify.js"></script>
    <script src="../js/axion.js"></script>

    <script src="../js/productosEm.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    
    
</head>
<body >
  
  

 
  <nav  class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="bi bi-award-fill"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
             <a name="" id="" class="btn btn-primary" href="/PedShow" role="button">pedidos</a>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    agregar producto
  </button>
          </li>
         
        </ul>
        @auth
  <div>{{auth()->user()->username}}</div> 
  <a class="btn btn-success me-5" href="/logout"><i class="bi bi-box-arrow-right"></i></a>
  @endauth
        
      </div>
    </div>
  </nav>

 
  

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar pedido</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/productosinventario" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nombre Del Producto</label>
              <input name="nombre" placeholder="nombre" type="text"  class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput2" class="form-label">Precio Del Producto</label>
              <input name="precio" placeholder="precio" class="form-control" id="exampleFormControlInput2" type="number">
            </div>
            
            <div class="mb-3">
              <label for="exampleFormControlInput3" class="form-label">Descripcion Del Producto</label>
              <input name="descripcion" placeholder="descripcion" type="text" class="form-control" id="exampleFormControlInput3">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput4" class="form-label">Categoria</label>
              <input name="categoria" placeholder="categoria" type="number" class="form-control" id="exampleFormControlInput4">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput5" class="form-label">Cantidad Del Producto</label>
              <input name="cantidad" placeholder="cantidad" type="text" class="form-control" id="exampleFormControlInput5">
            </div>
            
            <div class="mb-3">
              <label for="formFile" class="form-label">imagen del Producto</label>
              <input name="imagen" class="form-control" placeholder="imagen" type="file">
            </div>

            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>

          <button type="submit" class="btn btn-primary">crear producto</button>
          </form>
     
        </div>
      </div>
    </div>
  </div>

    <h1>productos</h1>
    <table id="tableProduct" class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">precio</th>
            <th scope="col">descripcion</th>
            <th scope="col">categoria</th>
            <th scope="col">cantidad</th>
          </tr>
        </thead>
        <tbody id="tableInventory">
          
        </tbody>
      </table>
</body>
</html>
