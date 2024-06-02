
function viewCompras(){
    let table = ""
    axios.get('viewcompras')
    .then(res => {
      console.log(res)
        res.data.forEach((element, index) =>{
          if(element.estadoPedido !== 'Enviado'){
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
          </button>|<button onclick="Showoption(${element.id})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MOdificEstado">
         confirmar pedido
        </button> </td>
          </tr>
         `
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


function Showoption(id){
document.getElementById('hiddenid').value = id

}
function selectped(){
    let estadoPedido = document.getElementById("selectPedadmin").value
   
}

function UpdateEstado(){
 
  let id = document.getElementById('hiddenid').value
  let estadoPedido = document.getElementById("selectPedadmin").value
      axios.put(`UpdateEstado/${id}`, {
          'estadoPedido': estadoPedido  
      })
      .then(res => {
          console.log(res);
      })
      .catch(err => {
          console.error(err); 
      });

}
viewCompras()