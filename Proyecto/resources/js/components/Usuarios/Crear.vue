<template>
    <div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Usuarios</h4></div>
                <div class="card-body">
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" v-model="dato.Nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" class="form-control" v-model="dato.Apellido">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="dato.email">
                                </div>
                            </div><div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="dato.password">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
export default {
    name:"crear-usuario",
    data(){
        return {
            dato:{
                Nombre:"",
                Apellido:"",
                email:"",
                password:""
            }
        }
    },
    methods:{
        async crear(){
            await this.axios.post('/api/datos', this.dato).then(response=>{
                this.$router.push({name:"mostrarUsuarios"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>