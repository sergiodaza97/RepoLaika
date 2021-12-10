const API_URL = "http://localhost:8000/api/datos/"
const contenedor = document.querySelector('tbody')
let resultados = ''

// const HTMLResponse = document.querySelector("#app");
const ul = document.createElement('ul'); 
const modalCrearUsuario =  new bootstrap.Modal(document.getElementById('modalCrearUsuario'))
const formUsuario = document.querySelector('form')
const nombre = document.getElementById('Nombre')
const apellido = document.getElementById('Apellido')
const email = document.getElementById('email')
const password = document.getElementById('password')
let opcion = ''

btnCrear.addEventListener('click', ()=> {
    nombre.value = ''
    apellido.value = ''
    email.value = ''
    password.value = ''
    modalCrearUsuario.show()
    opcion = 'crear'
})
getUsers()
const mostrar = (datos) =>{
    datos.forEach(dato =>{
        resultados +=   ` <tr>
                                <td>${dato.id}</td>
                                <td>${dato.Nombre}</td>
                                <td>${dato.Apellido}</td>
                                <td>${dato.email}</td>
                                <td>${dato.password}</td>
                                <td class="text-center"><a class="btnBorrar btn btn-outline-danger bi bi-trash-fill" title="Borrar"></a>
                                <a class="btnEditar btn btn-outline-warning bi bi-arrow-left-right" title="Editar" ></a></td>

                         </tr>
                     `

    })

    contenedor.innerHTML = resultados
    
}


//procedimiento Mostrar
console.log(API_URL)
function getUsers() {
    fetch(API_URL)
    .then( response => response.json() )
    .then( data => mostrar(data))
    .catch( error => console.log(error))

}

// fetch(`${API_URL}`)
//     .then((response)=> response.json())
//     .then((datos)=> {
//         users.forEach( (dato) => {
//             let elem = document.createElement("li");
//             elem.appendChild(
//                 document.createTextNode(`${dato.Nombre}`)
//             );
//             ul.appendChild(elem);
//         });

//         HTMLResponse.appendChild(ul);
//     } )

const xhr = new XMLHttpRequest();

// function onRequestHandler() {
//     if (this.readyState == 4 && this.status == 200) {
//         const data = JSON.parse(this.response);
//         const HTMLResponse = document.querySelector("#app");

//         const tpl = data.map((datos) => `<tr>
//         <td>${datos.id}</td>
//         <td>${datos.Nombre}</td>
//         <td>${datos.Apellido}</td>
//         <td>${datos.email}</td> 
//         <td>${datos.password}</td>
//         <td>
//         <a class="btnBorrar btn btn-outline-danger"><i class="bi bi-trash-fill" title="Borrar" class="btn btn-danger"></i></a>
//         <a class="btnEditar btn btn-outline-warning"><i class="bi bi-arrow-left-right" title="Editar" class="btn btn-warning"></i></a></td></tr>`);
//         HTMLResponse.innerHTML = `<table>
//         <tr>
//             <th><h5>ID</h5></th>
//             <th><h5>Nombre</h5></th>
//             <th><h5>Apellido</h5></th>
//             <th><h5>Email</h5></th>
//             <th><h5>Password</h5></th>
//             <th><h5>Opciones</h5></th>
//         </tr>
//         ${tpl}</table>`;
//     }
    
// }

// xhr.addEventListener("load", onRequestHandler);
// xhr.open('GET', `${API_URL}`);
// xhr.send();

const on =(element, event, selector, handler) => {
    element.addEventListener(event, e => {
        if(e.target.closest(selector)){
            handler(e)
        }
    })
}

on(document, 'click', '.btnBorrar', e => {
    window.eventCustom = e
    console.log(this, e);
    const fila = e.target.parentNode.parentNode
    const id = fila.firstElementChild.innerHTML
    

    alertify.confirm("Seguro que quiere eliminar el usuario.",
    function() {
        fetch(API_URL+id, {
            method: 'DELETE'
        })
        .then( res=>res.json())
        .then( ()=>{getUsers()})       
    },
    function() {
        alertify.error('cancel')
    })
})


let idForm = 0
    on(document, 'click','.btnEditar', e => {
        
        const fila = e.target.parentNode.parentNode
        idForm = fila.children[0].innerHTML
        const NombreForm = fila.children[1].innerHTML
        const ApellidoForm = fila.children[2].innerHTML  
        const emailForm = fila.children[3].innerHTML
        const passwordForm = fila.children[4].innerHTML

        nombre.value = NombreForm
        apellido.value = ApellidoForm
        email.value = emailForm
        password.value = passwordForm
        opcion = 'editar'
        modalCrearUsuario.show()
    })


    //para crear o editar
    formUsuario.addEventListener('submit', (e)=>{
        e.preventDefault()

        if(opcion=='crear'){             
            fetch(API_URL , {
                method:'POST',
                headers: {
                    'Content-Type':'application/json'
                },
                body: JSON.stringify({
                    Nombre:nombre.value,
                    Apellido:apellido.value,
                    email:email.value,
                    password:password.value
                })
            })
            .then( response => response.json() )
            .then( data => {
                const nuevoUsuario = []
                nuevoUsuario.push(data)
                mostrar(nuevoUsuario) 
            })
                .then(response => location.reload() )
        }           
        if(opcion=='editar'){
            fetch(API_URL+idForm , {
                method: 'PUT',
                headers: {
                     'Content-Type':'application/json'
                },
                body: JSON.stringify({
                    Nombre:nombre.value,
                    Apellido:apellido.value,
                    email:email.value,
                    password:password.value
                   
                })
            })
            .then(response => response.json() )
            .then(response => location.reload() )
         }

        modalCrearUsuario.hide()
    })