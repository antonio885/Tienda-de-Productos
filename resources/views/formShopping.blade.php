<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="row text-center"> 
    <h1>formulario de compras</h1>
    <hr>
    &nbsp;
  </div>
   <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">producto</th>
          <th scope="col">cantidad</th>
          <th scope="col">precio unitario</th>
          <th scope="col">precio total</th>
        </tr>
      </thead>
      <tbody id="tableSelect">
       
      </tbody>
    </table>
<input id="txtIDPed" type="hidden">
<hr>
    <div class="d-block">
      <div class="d-flex justify-content-center text-center mt-5">
        <div class="col-6 d-block">
          <label for="txtname" class="form-label fw-bolder">NOMBRE</label>
          <div class="d-flex justify-content-center">
            <input class=" form-control w-50 text-center border-black border-1 fw-medium" id="txtname"  type="text" placeholder="nombre ">
          
            <div  class="alert alert-danger d-none" role="alert" id="errorNombre"></div>
       
         
          </div>
         

         
          
        </div>
        <div class="col-6 d-block">
          <label for="txtlastname" class="form-label fw-bolder">APELLIDO</label>
          <div class="d-flex justify-content-center">
            <input class="form-control w-50 text-center  border-black border-1 fw-medium"  id="txtlastname" type="text" placeholder="apellido ">
            <div  class="alert alert-danger d-none" role="alert" id="errorApellido"></div>
          </div>
          

         

        </div>
      </div>
      <div class="d-block mt-3 text-center ">
        <label for="txtadress" class="form-label fw-bolder ">DIRECCION</label>
        <div class="d-flex justify-content-center text-center">
          <input class="form-control w-50 text-center  border-black border-1 fw-medium" id="txtadress" type="text" placeholder="direccion ">

          
          <div  class="alert alert-danger d-none" role="alert" id="errorDireccion">
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
          </div>
         
        </div>
       
      </div>

      <div class="d-flex justify-content-center text-center mt-3">
        <div class="col-6">
          <label for="txtnumber" class="form-label fw-bolder">TELEFONO</label>
          <div class="d-flex justify-content-center">
            <input  class="form-control w-50 text-center  border-black border-1 fw-medium" id="txtnumber" type="number" placeholder="telefono ">
            <div  class="alert alert-danger d-none" role="alert" id="errorTelefono"></div>
          </div>
          
        </div>
        <div class="col-6">
          <label for="selectformapago" class="form-label fw-bolder">FORMA DE PAGO</label>
          <div class="d-flex justify-content-center">
            <select class="form-select form-control w-50 border-black border-1 fw-medium" aria-label="Default select example" onchange="changeselect()" name="" id="selectformapago">
              <option selected>Forma de pago</option>
              <option value="Transferencia">Transferencia</option>
              <option value="Contraentrega">Contraentrega</option>
              <option value="Consignacion">Consignacion</option>
            </select>
            <div  class="alert alert-danger d-none" role="alert" id="errorFormaPago"></div>
          </div>

        </div>
      </div>
     
   
      <div class="d-flex justify-content-center mt-5">
        <a type="button" onclick="sendpedForm()" class="btn btn-primary w-25">enviar</a>
      </div>
      <input id="txtIdUser" type="hidden" value="{{auth()->user()->id}}">
     
     
      

     
     

    </div>
   </div>
   

</body>
</html>

<script src="../js/formShopping.js"></script>