const API_URL = "http://localhost:8000/api/datos";

// fetch(API_URL + id, {
//   method: 'DELETE',
// })
// .then(res => res.text()) // or res.json()
// .then(res => console.log(res))
const deleteMethod = {
    method: 'DELETE', // Method itself
    headers: {
     'Content-type': 'application/json; charset=UTF-8' // Indicates the content 
    },
    // No need to have body, because we don't send nothing to the server.
   }
   // Make the HTTP Delete call using fetch api
   fetch(API_URL + id, deleteMethod) 
   .then(response => response.json())
   .then(data => console.log(data)) // Manipulate the data retrieved back, if we want to do something with it
   .catch(err => console.log(err)) // Do something with the error

fetch("http://localhost:8000/api/datos"),{
    method:'Delete',
    headers: {
        'Content-type': 'application/json; charset=UTF-8' // Indicates the content 
       },
}
   .then(response => response.json())
   .then(data => console.log(data)) // Manipulate the data retrieved back, if we want to do something with it
   .catch(err => console.log(err))
// const HTMLResponse = document.querySelector("#Eliminar");

// const xhr = new XMLHttpRequest();

// function onRequestHandler() {
//     if (this.readyState == 4 && this.status == 200) {
//         const data = JSON.parse(this.response);
//         const HTMLResponse = document.querySelector("#Eliminar");

//         const tpl = data.map((datos) => `<tr>
//         <td>${datos.id}</td>
//         <td>${datos.Nombre}</td>
//         <td>${datos.Apellido}</td>
//         <td>${datos.email}</td> 
//         <td>${datos.password}</td>
//         </tr>`);
//         HTMLResponse.innerHTML = `
//         alert("${tpl}");
//         `;
//     }
    
// }
// const data = JSON.parse(this.response);
// data.map(datos);

// xhr.addEventListener("load", onRequestHandler);
// xhr.open('DELETE', `${API_URL}/${datos.id}`);
// xhr.send();