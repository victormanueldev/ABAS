<template>
    <div class="row" style="margin: auto; padding: 0 15px">
        <div class="ibox-content" style="padding: 0">
            <div class="col-md-12" style="margin-bottom: 10px">
                <h2>Novedades Temporales</h2>
                <small >Selecciona la sede para empezar.</small>
            </div>
            <div class="col-sm-12 col-md-6" style="margin-bottom: 10px">
                <select v-model="idSede" id="sedes">
                    <option value="0" :selected="true">Seleccionar sede</option>
                    <option v-for="sede in sedes" :key="sede.id" :value="sede.id">{{sede.nombre}}</option>
                </select>
            </div>
            <div class="col-md-12">
                <div class="input-group" style="margin-top: 7px;">
                    <input type="text" class="form-control" placeholder="Escriba la novedad" v-model="novedad.descripcion" @keydown.enter="crear"><span class="input-group-btn">
                        <button class="btn btn-primary" @click="crear">+</button>
                    </span>
                </div>
            </div>
            <div class="col-md-12">
                    <ul class="todo-list m-t small-list ">
                        <li v-for="novedad in novedadesTemporales" :key="novedad.id">
                            <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                                <input type="checkbox" id="checkbox" v-model="novedad.completado" @click="completar(novedad)">
                                <label v-bind:class="{'todo-completed':  novedad.completado}" style="width: 80%;">{{novedad.descripcion}}</label>
                                <span class="badge badge-plain pull-right" style="cursor: pointer" @click.prevent="eliminar(novedad)">x</span>
                            </div>                
                        </li>
                    </ul>
            </div>
        </div> 
    </div>
</template>

<script>
export default {
    mounted(){
        this.fetchSedes()
    },
    data(){
        return {
            idSede:'',
            sedes: [],
            idClient: '',
            novedadesTemporales: [],
            novedad: {
                descripcion: '',
                idCliente: '',
                idSede: ''
            }
        }
    },
    methods: {
        fetchSedes() {
            const url = window.location.pathname.split("/")
            this.idClient = url[2]
            this.novedad.idCliente = url[2]
            axios.get(`/sedes/cliente/${this.idClient}`)
                .then( res => {
                    if(res.data.length === 0){
                        this.sedes.push({nombre: 'Sede Única', id: 'unique'})
                        this.idSede = '0';
                    }else{
                        this.sedes = res.data
                    }
                    console.log(this.sedes)
                })
                .catch( err => {
                    console.log(err)
                })
            document.getElementById('sedes').addEventListener('change', e => {
            axios.get(`/temporales/novedad/${this.idClient}/${e.target.value == 'unique' ? '0' : e.target.value}`)
                .then(res => {
                    this.novedadesTemporales = res.data
                })
                .catch( err => {
                    console.log(err)
                })
                
        })
        },
        crear() {
            this.novedad.idSede = this.idSede == 'unique' ? '0' : this.idSede
            axios.post(`/temporales/novedad`, this.novedad)
                .then( res => {
                    this.novedadesTemporales.unshift(res.data)
                    this.novedad.descripcion = ''
                })
                .catch( err  => {
                    console.log(err)
                })
        },
        completar(novedad) {
            axios.put(`/temporales/novedad/${novedad.id}`, {
                completado: ! novedad.completado
            })
                .then( res => {
                    console.log(res)
                })
                .catch( err => {
                    console.log(err)
                })

        },
        eliminar(novedad) {
            axios.delete(`/temporales/novedad/${novedad.id}`)
                .then( res => {
                    const novedadIndex = this.novedadesTemporales.indexOf(novedad)
                    this.novedadesTemporales.splice(novedadIndex, 1)
                })
                .catch( err => {
                    console.log(err)
                })
        }
    }
}
</script>

