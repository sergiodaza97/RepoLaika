const API_URL = "http://localhost:8000/api/datos/";

fetch(API_URL+id , {
    method: 'PUT',
    headers: {
         'Content-Type':'application/json'
    },
    body: JSON.stringify({
        Nombre:Nombre.value,
        Apellido:Apellido.value,
        email:email.value,
       
    })
})
    .then(response => response.json() )
    .then(response => location.reload() )
