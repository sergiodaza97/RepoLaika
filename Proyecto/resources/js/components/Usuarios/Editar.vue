 <template>
    <div>
        <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Usuarios</h4></div>
                <div class="card-body">
                    <form @submit.prevent="actualizar">
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
    name:"editar-usuario",
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
    mounted(){
        this.getUsers()
    },
    methods:{
        async getUsers(){
            await this.axios.get(`/api/datos/${this.$route.params.id}`).then(response=>{
                const { Nombre, Apellido, email, password } = response.data
                this.dato.Nombre = Nombre
                this.dato.Apellido = Apellido
                this.dato.email = email
                this.dato.password = password
                console.log(this.dato, response.data)
            }).catch(error=>{
                console.log(error)
            })
        },
        async actualizar(){
            await this.axios.put(`/api/datos/${this.$route.params.id}`,this.dato).then(response=>{
                this.$router.push({name:"mostrarUsuarios"})
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>