var arreglocate = []

function SearchProduct(){
    let table = ""
let idProducto = localStorage.busqueda
axios.get(`searchProduct/${idProducto}`)
.then(res => {
    console.log(res)
    let categoria = res.data[0].gamaProducto

    table += `<div class="d-flex text-center mt-4">

    <div class="col-6 d-block justify-content-center border-end">
    
    <h2>${res.data[0].nomProducto}</h2>

    <div class="d-flex justify-content-center align-items-center mt-5">
    <img src="${res.data[0].imagen}" style="width:500px;">
    </div>

    <div class="mt-5 d-flex align-item-center justify-content-center" >

    <h2 id="txtcategoria${categoria}"></h2>
    </div>

    </div>

    <div class="col-6 mt-5 d-block justify-content-center align-item-center text-center">
    <div class=" d-block  justify-content-center align-content-center text-center">
    <label for="precioProduct" class="form-label">PRECIO</label>
    <h1 class="form-control fs-5 fw-bolder w-75 " style="margin-left: 95px; height:50px " id="precioProduct"> $ ${res.data[0].PrecioProduct}</h1>
    </div>
    
<div class=" mt-5 d-block">
<label for="txtcantidad${res.data[0].nomProducto}" class="form-label">ELEGIR CANTIDAD</label>
<input class="form-control text-center w-75" type="number" style="margin-left: 95px; height:50px" placeholder="cantidad" min="0" id="txtcantidad${res.data[0].nomProducto}">
</div>
  
    <div class="mt-5">
    <a name="" onclick="addCart('${res.data[0].nomProducto}')"  class="btn btn-primary w-75" href="#" role="button">COMPRAR</a></div>
    
    </div>
    
    </div>
<hr>
    <div class="pt-3 text-center ">
    <label for="descripcionProduct" class="form-label">DESCRIPCION</label>
    <h2 class="form-control border border-0" id="descripcionProduct">${res.data[0].descripcionProduct}</h2>
 
    </div>`
    document.getElementById("viewProduct").innerHTML = table
    
    getCategority(categoria)
})
.catch(err => {
    console.error(err); 

})
}
function getCategority(categoria){


    axios.get(`https://api.escuelajs.co/api/v1/categories/${categoria}`)
    .then(res => {
        console.log(res)
        let nombre = res.data.name
        document.getElementById(`txtcategoria${categoria}`).innerHTML = nombre
         
    })
    .catch(err => {
        console.error(err); 
    })


}
const shoppingcart = []
function addCart(nomProducto){
    axios.get(`getNombreProduct/${nomProducto}`)
    .then(res => {
      console.log(res)
      let cantidad = document.getElementById(`txtcantidad${nomProducto}`).value
      console.log(cantidad);
      if(cantidad >= 1){
        let productos = new Productos(res.data[0].idProducto, res.data[0].nomProducto, cantidad, res.data[0].PrecioProduct)
        shoppingcart.push(productos)
    
        localStorage.url = JSON.stringify(shoppingcart)
        const offcanvas = document.getElementById('offcanvasRight')
        const offcanvasIntance = new bootstrap.Offcanvas(offcanvas)
        offcanvasIntance.show()
        ShoppingProduct()
      }else{
        alert("cantidad insuficiente")
      }
      
    })
    .catch(err => {
      console.error(err); 
    })
    }

    
    function ShoppingProduct(){ 
      let table = ''
      let quantity = 0
      shoppingcart.forEach((element, index) =>{
        let idProduct = element._idProducto
        console.log(shoppingcart);
        quantity += element._precioProduct * element._cantidad
        
       table += `<div class="offcanvas-body" id="shoppingP">
        <div class="row my-3" >
      <div class="col-4" >
       <img src="" alt="">
       </div>
      <div class="col-8" >
     <div class="row fw-bolder" >${element._nombreProducto}</div>
     <div class="row fw-bolder" >${element._precioProduct}</div>
     <div class="row fw-bolder" >${element._cantidad} X ${element._precioProduct} = ${element._precioProduct * element._cantidad}</div>
     
     </div>
     <input type="number" onkeyup="UpdatesQuantity(this, ${index})">
     <button onclick="deletesProduct(${index})" type="button" class="btn btn-danger">eliminar</button>
     </div>
     </div>`
      })
     document.getElementById("shoppingP").innerHTML  = table
     document.getElementById("quantityTotal").innerHTML = quantity
    
    }
    // function sendProduct(){
    //   let data = JSON.parse(localStorage.url)
    //   data.forEach(element =>{
    //     shoppingcart.push(element)
    //   })
    //   ShoppingProduct()
    // }
    // sendProduct()
    
    
    function UpdatesQuantity(element, index){
      shoppingcart[index]._cantidad = element.value
      localStorage.url = (JSON.stringify(shoppingcart))
      ShoppingProduct()
    }
    function deletesProduct(index){
    shoppingcart.splice(1, index)
    localStorage.url = (JSON.stringify(shoppingcart))
    ShoppingProduct()
    }
    function chooseProductsend(){
        let vairable = document.getElementById('txtIdUser').value
        console.log(vairable);
        shoppingcart.forEach(element =>{
          axios.post('selectProduct',{
          'nombrePro': element._nombreProducto,
          'cantidad': element._cantidad,
          'PrecioUnit': element._precioProduct,
          'PrecioTotal': element._precioProduct * element._cantidad,
          'userIdPedChoose': vairable
          })
          .then(res => {
            console.log(res)
          })
          .catch(err => {
            console.error(err); 
          })
        })
        
      }

SearchProduct()