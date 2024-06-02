const shoppingcart = []


function viewshop(){
  
    let table = ""
    axios.get('shopInventary')
    .then(res => {
        console.log(res)
        res.data.forEach(element => {
          let ids = element.idProducto
          let nombrePro = element.nomProducto
          
            table += `
         
            <div class="card ms-5 mt-5 text-center " style="width: 18rem;">
            <img src="${element.imagen}"  class="card-img-top" alt="">
            <div class="card-body h-75 d-flex align-items-center justify-content-center">
              <h5 class="card-title">${element.nomProducto}</h5>
              
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">$ ${element.PrecioProduct}</li>
             
            </ul>
            <div class="card-body">
              <input type="number" placeholder="cantidad" min="0" id="txtcantidad${element.nomProducto}">
              <a name="" onclick="addCart('${element.nomProducto}')" id="" class="btn btn-primary mt-4" href="#" role="button">comprar</a>
              
            </div>
          </div>
        </div>
          </div>`

          
        });
        document.getElementById("productExhibition").innerHTML = table
    })
    .catch(err => {
        console.error(err); 
    })
}

// function viewimages(nombrePro){
  
// axios.get(`https://api.escuelajs.co/api/v1/products/?title=${nombrePro}`)
// .then(res => {
//  res.data.forEach(element =>{
  
//   const imagenes =  element.images[0]
//   document.getElementById(`imagen${nombrePro}`).addEventListener('load', function() {
//     console.log('La imagen se ha cargado correctamente.');
//   document.getElementById(`imagen${nombrePro}`).src = imagenes
//   })
//  })
     
    
  

// })
// .catch(err => {
//   // console.error(err); 
// })
// }



function addCart(nomProducto){
  
axios.get(`getNombreProduct/${nomProducto}`)
.then(res => {
  console.log(res)
  let cantidad = document.getElementById(`txtcantidad${nomProducto}`).value
  console.log(cantidad);
  if(cantidad >= 1){
    let productos = new Productos(res.data[0].idProducto, res.data[0].nomProducto, cantidad, res.data[0].PrecioProduct)
    Swal.fire({
      title: "Producto agregado",
      text: "Su producto se agrego correctamente al carrito",
      color:  '#EDF4ED',
      icon: "success"
    });
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
 <div class=" fw-bolder d-flex" >
 <div class="col-10">
 ${element._nombreProducto} 
 </div>

 <div class="col-2">
 <button onclick="deletesProduct(${index})" type="button" class="btn btn-danger "><i class="bi bi-x-lg"></i></button></div>

 </div>
 <div class="row fw-bolder" >${element._precioProduct}</div>
 <div class="row fw-bolder" >${element._cantidad} X ${element._precioProduct} = ${element._precioProduct * element._cantidad}</div>
 
 </div>
 <div class="d-flex justify-content-center">
 <input class="w-75" placeholder="cantidad" type="number" onkeyup="UpdatesQuantity(this, ${index})">
 </div>
 <div class="d-flex justify-content-center mt-3">

 </div>
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
      location.href = "/formShop"
    })
    .catch(err => {
      console.error(err); 
    })
  })
  
}

let arregloProduct = []
function laodfuncion(){
  axios.get('shopInventary')
  .then(res => {
    console.log(res)
    arregloProduct = Object.values(res.data)
  })
  .catch(err => {
    console.error(err); 
  })
}

function SearchProduct(){
  let search = document.getElementById("searchP").value


  if(search.length >= 3 ){
    const filtroProduct = arregloProduct.filter(filtrarProduct)
    let table = `<div class="list-group position-absolute ">`

    filtroProduct.forEach(element=>{
      table += `<a onclick="storageProduct(${element.idProducto})" href="/productSearch" class="list-group-item list-group-item-action active ">${element.nomProducto}</a>`
    })
        table += `</div>`
        document.getElementById("productList").innerHTML = table
        document.getElementById("productList").style = "  overflow:scroll; height:400px; width:22%;  position: absolute;   background-color: rgb(13, 110, 253); z-index: 4;"
  } else {
        document.getElementById("productList").innerHTML = ""
        document.getElementById("productList").style = "overflow: hidden;"
    }
}
function storageProduct(idProducto){
  localStorage.busqueda = idProducto
}
function filtrarProduct(element){
 
let search = document.getElementById("searchP").value
let nombre = element.nomProducto.toUpperCase()

return nombre.includes(search.toUpperCase() ) 
}


ShoppingProduct()
viewshop()