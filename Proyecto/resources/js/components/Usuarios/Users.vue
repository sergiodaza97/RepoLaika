<template>
  <div>
    <h1 class="text-center">Gestionar Usuarios</h1>
    <hr />

    <router-link :to='{ name: "crearUsuario" }' class="btn btn-outline-primary"
      >Nuevo</router-link
    >
    <table class="table">
      <thead>
        <tr class="table-dark">
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody v-cloak>
        <tr v-for="dato in datos" :key="dato.id">
          <th scope="row">{{ dato.id }}</th>
          <td>{{ dato.Nombre }}</td>
          <td>{{ dato.Apellido }}</td>
          <td>{{ dato.email }}</td>
          <td>{{ dato.password }}</td>
          <td class="text-center">
            <router-link
              :to="{ name: 'editarUsuario', params: { id: dato.id } }"
              class="btnEditar btn btn-outline-warning bi bi-arrow-left-right"
              title="Editar"
            ></router-link>
            <a
              type="button"
              @click="borrarUsuario(dato.id)"
              class="btnBorrar btn btn-outline-danger bi bi-trash-fill"
              title="Borrar"
            ></a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
      name:"usuarios",
      data() {
        return{
          datos:[]
        }

          },
          mounted() {
              this.getUsers()
          },
          methods: {
              async getUsers() {
                await this.axios.get('/api/datos')
                  .then(response=>{
                    this.datos =response.data
                  })
                  .catch( error => console.log(error))
                  // fetch('http://localhost:8000/api/datos/')
                  // .then( response => response.json() )
                  // .then(json => {
                  //     this.datos = json
                  // })
              },
              borrarUsuario(id){
                if (confirm("¿Esta seguro de eliminar el usuario?")){
                  this.axios.delete('/api/datos/'+id)
                  .then(response=>{
                    this.getUsers()
                  })
                  .catch( error => console.log(error))
                }
              },
          computed:{
              eventMessage(){
                  console.log("Está editando message", this.message)
              }
          },
        }
}
</script>