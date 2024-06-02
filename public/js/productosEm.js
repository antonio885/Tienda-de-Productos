function apiProductos(){
    axios.get('https://api.escuelajs.co/api/v1/products')
    .then(res => {
        console.log(res)
        res.data.forEach(element => {
            let name = element.title
            let price = element.price * 100
            let description = element.description
            let categoryId = element.category.id
            let imagen = element.images[2]
             
            postInventario(name, price, description,categoryId,imagen )
        });
        
        
    })
    .catch(err => {
        console.error(err); 
    })
}

function postInventario(name, price, description, categoryId, imagen) {
    const formData = new FormData();
    formData.append("nomProducto", name);
    formData.append("PrecioProduct", price);
    formData.append("descripcionProduct", description);
    formData.append("gamaProducto", categoryId);
    formData.append("cantidadProduct", 100);
    formData.append("imagen", imagen);

    axios.post('inventaryProduct', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(res => {
        // console.log(res)
    })
    .catch(err => {
        console.error(err); 
    });
}

function getViewInventory(){
    let table = ""
    axios.get('viewInventary')
    .then(res => {
        console.log(res)
        res.data.forEach((element, index) => {
            table +=
            `<tr>
          
               <th scope="row">${index + 1}</th>
        
               <td>${element.nomProducto}</td>
               <td>${element.PrecioProduct}</td>
               <td>${element.descripcionProduct}</td>
               <td>${element.gamaProducto}</td>
               <td>${element.cantidadProduct}</td>
             </tr>
            `
        })
        tableInventory.innerHTML = table

        new DataTable("#tableProduct", {
            retrieve: true,
             language: {
               url: "../json/es-ES.json",
             },
             dom: "Bfrtip",
             buttons: [
               {
                 extends: "colvis",
                 text: "<i class='bi bi-funnel-fill'></i>",
                 titleAttr: "colvis",
                 className: "colvis",
               },
               {
                 extends: "excel",
                 text: "<i class='bi bi-file-earmark-excel'></i>",
                 titleAttr: "excel",
                 className: "excel",
                 exportOptions: {
                   columns: [0, 1, 2],
                 }
               },
               {
                 extends: "print",
                 text: "<i class='bi bi-printer'></i>",
                 titleAttr: "print",
                 className: "print",
                 exportOptions: {
                   columns: [0, 1, 2],
                 }
               },
               {
                 download: "open",
                 text: "<i class='bi bi-file-earmark-pdf'></i>",
                 titleAttr: "pdf",
                 className: "pdf",
                 exportOptions: {
                   columns: [0, 1, 2],
                 }
               },
               {
                 extends:"copy",
                 text: "<i class='bi bi-clipboard2-check'></i>",
                 titleAttr: "copy",
                 className: "copy",
                 exportOptions: {
                 columns: [0, 1, 2],
                             }
               },
       ],
           });
    })
    .catch(err => {
        console.error(err); 
    })
}
getViewInventory()
apiProductos()