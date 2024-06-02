<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/axion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<body style="background-color: gray">

    @if (session('error'))
    <script>
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            color: "#716add",
            icon: "error"
        });
    </script>
@endif

    <div class="d-flex justify-content-center align-items-center">
        
        <div style="margin-top:5em; height: 35em; width: 25em; background-color: rgb(212, 200, 200)" class="d-block align-items-center justify-content-center  rounded-4">
            <div class="d-flex align-items-center justify-content-center text-center">
                <h1 class="mt-3">LOGIN</h1>
            </div>
             <hr>
            <div class="d-block mt-5 justify-content-center text-center">
                <form action="/login" method="POST">
                    @csrf
                    <div class="d-block mt-4">
                        <label for="labelnombre" class="form-label fw-bolder">usuario/correo</label>
                        <div class="d-flex justify-content-center">
                            <input style="width: 20em" type="text"  class="form-control" id="labelnombre" name="username" id="txtusuario">
                        </div>
                    
                </div>
                <div class="d-block mt-4">
                    <label for="labelcontraseña" class="form-label fw-bolder">contraseña</label>
                    <div class="d-flex justify-content-center">
                        <input style="width: 20em"  class="form-control" id="labelcontraseña" type="password" name="password" id="txtpassword">
                    </div>
                   
                </div>
                    <button style="margin-top: 6em; height: 40px; width: 8em" class="btn btn-info fw-bolder" value="iniciar" type="submit">Iniciar Sesion</button>
            
                </form>
                <div class="mt-5">
                    <h5>¿no tienes cuenta? <a href="/register">registrate</a></h5>
                </div>
            </div>
           
         </div>
    </div>
   


</body>
</html>
{{-- <script src="../js/login.js"></script> --}}