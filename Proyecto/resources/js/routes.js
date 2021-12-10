const Mostrar = ()=> import('./components/usuarios/Users.vue')
const Crear = ()=> import('./components/usuarios/Crear.vue')
const Editar = ()=> import('./components/usuarios/Editar.vue')

export const routes = [ 
    {
        name:'mostrarUsuarios',
        path:'/',
        component: Mostrar
    },
    {
        name:'editarUsuario',
        path:'/editar/:id',
        component: Editar
    },  
    {
        name:'crearUsuario',
        path:'/crear',
        component: Crear
    },     
] 