function ChooseROl(){
    let table = ""
    axios.get('rolUserview')
    .then(res => {
        table += `
        <option value="seleccionar" >seleccionar</option> `
        console.log(res)
        res.data.forEach(element => {
            table += `<option  value="${element.idRol}">${element.nombreRol}</option>` 
        });
        document.getElementById('txtRolChoose').innerHTML = table
    })
    .catch(err => {
        console.error(err); 
    })
}
function sendRol(){
let selects = document.getElementById('txtRolChoose').value
console.log(selects);

document.getElementById("txtRolUSer").value = selects
}
ChooseROl()