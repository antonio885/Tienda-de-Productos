class Productos{
    constructor(idProducto,nomProducto,cantidad,PrecioProduct){
        this.idProducto = idProducto;
        this.nomProducto = nomProducto;
        this.cantidad = cantidad;
        this.PrecioProduct = PrecioProduct;
    }
    get idProducto(){
        return $this._idProducto
    }
    set idProducto(nuevoid){
        this._idProducto = nuevoid
    }
    get nomProducto(){
        return $this._nombreProducto
    }
    set nomProducto(nuevoNombre){
        this._nombreProducto = nuevoNombre
    }
    get cantidad(){
        return $this._cantidad
    }
    set cantidad(nuevaCantidad){
        this._cantidad = nuevaCantidad
    }
    get PrecioProduct(){
        return $this._precioProduct
    }
    set PrecioProduct(nuevoprecio){
        this._precioProduct = nuevoprecio
    }
}