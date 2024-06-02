<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/axion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body style="background-color: rgb(100, 194, 235);">
    <div class="d-flex justify-content-center mt-5">
<div class="row rounded-5 bg-white" style=" width: 600px">
    <div class="row text-center mb-4">
        <h1>Registro</h1>
        <hr>
    </div>
  
    <div class="d-block">
        <form action="/register" method="post">
            @csrf
            <div class="row justify-content-center text-center">
                <label for="tipoIdentificacion" class="form-label">selecciona el documento</label>
                <select name="tipoIdentificacion" id="tipoIdentificacion" class="form-control form-select mb-3 w-50" >
                    <option value="CC">CC</option>
                    <option value="TI">TI</option>
                    <option value="NUI">NUI</option>
                   </select>
                   <div class="row justify-content-center text-center">
                    <label for="txtRolChoose" class="form-label">selecciona un Rol</label>
                    <select name="" onchange="sendRol()" class="form-control form-select mb-3 w-50" id="txtRolChoose">
                     </select>
                   </div>
                 
            </div>
                <div class="row justify-content-center text-center">
                    <label for="txtRolChoose" class="form-label">identificacion</label>
                    <input class="mb-3 w-50 form-control" name="Identificaion" id="Identificaion" type="text" placeholder="identificacion">

                    <label for="txtRolChoose" class="form-label">Nombre del usuario</label>
                    <input class="mb-3 w-50 form-control" name="username" id="username" type="text" placeholder="usuario">

                    <label for="txtRolChoose" class="form-label">Correo</label>
                    <input class="mb-3 w-50 form-control" name="email" id="Correo" type="email" placeholder="correo">


                    <label for="txtRolChoose" class="form-label">Contraseña</label>
                    <input class="mb-3 w-50 form-control" name="password" id="password" type="password" placeholder="contraseña">

                    <label for="txtRolChoose" class="form-label">Verifica la Contraseña</label>
                    <input class="mb-3 w-50 form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="comprobar contraseña">

                    <input name="id_Rol" type="hidden" id="txtRolUSer" type="text">
                </div>
               
        <div class="d-flex justify-content-center mb-5 mt-4">
            <button type="submit" value="registrar" class="bg-danger w-50" >registrar</button>
        </div>
             
                 
                 @error('tipoIdentificacion')
                 <div class="text-danger">{{ $message }}</div>
             @enderror
             
             @error('Identificaion')
             <div class="text-danger">{{ $message }}</div>
         @enderror
         
         @error('username')
         <div class="text-danger">{{ $message }}</div>
        @enderror
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        
        @error('password')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        
        @error('password_confirmation')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        
        
        </form>
    </div>
  
</div>
    </div>
   
       
</body>
</html>
{{-- <script src="../js/registro.js"></script> --}}
<script src="../js/RolUser.js"></script>