const codigo = generateCodePed(3)
const total = []
function showProductSelect(){
    let table = ""
    let totalshop = 0
    axios.get('showselect')
    .then(res => {
        console.log(res)
        res.data.forEach((element,index) =>{
            table += ` <tr>
            <th scope="row">${index}</th>
            <td>${element.nombrePro}</td>
            <td>${element.cantidad}</td>
            <td>${element.PrecioUnit}</td>
            <td>${element.PrecioTotal}</td>
          </tr>
          `
          totalshop += parseInt(element.PrecioTotal)
          
        })
        total.push(totalshop)
        document.getElementById('tableSelect').innerHTML = table
    })
    .catch(err => {
        console.error(err); 
    })
}
var formapago = []
function changeselect(){
    let select = selectformapago.value
    
    formapago.push(select)
    
   
}
function generateCodePed(longitud){
    let codeped = ""
    for(let i = 0; i < longitud; i++){
        codeped  += Math.floor(Math.random()*10)
    }
    return codeped
}
function sendpedForm(){
    let IdCustomer = document.getElementById('txtIdUser').value
    const date = new Date()
axios.post('formpedido',{
    'codigoPed': codigo,
    'fechaPed': date,
    'nombre': txtname.value,
    'apellido': txtlastname.value,
    'direccion': txtadress.value,
    'telefono': txtnumber.value,
    'totalPed': parseInt(total),
    'formaPago': String(formapago),
    'idPedCustomer':IdCustomer
})
.then(res => {
    console.log(res)
   
    const pedidoID = codigo
  
    document.dispatchEvent(new CustomEvent('submitPedido', {detail:codigo}))
    location.href = '/home'
})
.catch(err => {
    console.error(err); 
    if (err.response && err.response.data && err.response.data.errors) {
        const errors = err.response.data.errors;
        displayErrors(errors);
    }
    })
}
function displayErrors(errors) {
  

    if (errors.nombre && document.getElementById('errorNombre')) {
        document.getElementById('errorNombre').innerHTML = errors.nombre.join(', ');
        document.getElementById('errorNombre').className = 'd-inline alert alert-danger z-3 position-absolute p-2 mt-5 rounded-3'
       
    }
    if (errors.apellido && document.getElementById('errorApellido')) {
        document.getElementById('errorApellido').innerHTML = errors.apellido.join(', ');
        document.getElementById('errorApellido').className = 'd-inline alert alert-danger z-3 position-absolute p-2 mt-5 rounded-3'
    }
    if (errors.direccion && document.getElementById('errorDireccion')) {
        document.getElementById('errorDireccion').innerHTML = errors.direccion.join(', ');
        document.getElementById('errorDireccion').className = 'd-inline alert alert-danger z-3 position-absolute p-2 mt-5 rounded-3'
    }
    if (errors.telefono && document.getElementById('errorTelefono')) {
        document.getElementById('errorTelefono').innerHTML = errors.telefono.join(', ');
        document.getElementById('errorTelefono').className = 'd-inline alert alert-danger z-3 position-absolute p-2 mt-5 rounded-3'
    }
    if (errors.formaPago && document.getElementById('errorFormaPago')) {
        document.getElementById('errorFormaPago').innerHTML = errors.formaPago.join(', ');
        document.getElementById('errorFormaPago').className = 'd-inline alert alert-danger z-3 position-absolute p-2 mt-5 rounded-3'
    }
}

function productIdSend(){
    document.addEventListener('submitPedido', function(event){
        const codigoPed = event.detail

        console.log(codigoPed);
        axios.get(`storecodesearch/${codigoPed}`)
        .then(res => {
            console.log(res)
            let userIdPedChoose = res.data[0].idPedCustomer
            let idPedidoSelect =  res.data[0].id
        
            console.log(userIdPedChoose, idPedidoSelect);
            addIdSelectped(userIdPedChoose,idPedidoSelect)
        })
        .catch(err => {
            console.error(err); 
        })
    })
}

function addIdSelectped(userIdPedChoose, idPedidoSelect){
axios.post(`selectProducts/${userIdPedChoose}`,{
    'idPedidoSelect': idPedidoSelect
})  
.then(res => {
    console.log(res)
})
.catch(err => {
    console.error(err); 
})
}


function viewCompras(){
    let table = ""
    axios.get('viewcompras')
    .then(res => {
      console.log(res)
        res.data.forEach((element, index) =>{
            switch (element.estadoPedido) {
                case 'Enviado':
                    table +=  `<tr>
          
                    <th scope="row">${index + 1}</th>
                    <td>${element.nombre}</td>
                    <td>${element.apellido}</td>
                    <td>${element.totalPed}</td>
                    <td>${element.direccion}</td>
                    <td>${element.formaPago}</td>
                    <td>${element.estadoPedido}</td>
                    <td>${element.fechaPed}</td>
                    <td>${element.telefono}</td>
                    <td><button onclick="searchProductped(${element.id})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ver pedido
                  </button>| <a class="btn btn-info " href="/PDF/${element.id}">Generar factura</a> </td>
        
                  </tr>
                 `
                    break;
            
                default:
                    table +=  `<tr>
          
                    <th scope="row">${index + 1}</th>
                    <td>${element.nombre}</td>
                    <td>${element.apellido}</td>
                    <td>${element.totalPed}</td>
                    <td>${element.direccion}</td>
                    <td>${element.formaPago}</td>
                    <td>${element.estadoPedido}</td>
                    <td>${element.fechaPed}</td>
                    <td>${element.telefono}</td>
                    <td><button onclick="searchProductped(${element.id})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    ver pedido
                
        
                  </tr>
                 `
                    break;
            }
           
        })
        document.getElementById("tableInventory").innerHTML = table
    })
    .catch(err => {
      console.error(err); 
    })
    }

    function searchProductped(id){
        let table = ""
axios.get(`pedidoProducto/${id}`)
.then(res => {  
    console.log(res)
    res.data.forEach((element,index) => {
         table +=  `<tr>
          
            <th scope="row">${index + 1}</th>
            <td>${element.nombrePro}</td>
            <td>${element.cantidad}</td>
            <td>${element.PrecioUnit}</td>
            <td>${element.PrecioTotal}</td>
           
         
          </tr>`
    })
    document.getElementById("tableProductPed").innerHTML = table
})
.catch(err => {
    console.error(err); 
})
    }

viewCompras()
productIdSend()
showProductSelect()
