<template>
<div>
    <div class="ibox-content">
        <h2>Tareas rápidas</h2>
        <small >Esta es la lista de tareas para hoy</small>
            <div class="input-group" style="margin-top: 7px;">
                <input type="text" class="form-control" placeholder="Escriba la tarea" v-model="tarea.asunto" @keydown.enter="crear"><span class="input-group-btn">
                    <button class="btn btn-primary" @click="crear">+</button>
                </span>
            </div>

        <ul class="todo-list m-t small-list">
            <li v-for="tarea in tareas" :key="tarea.id">
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox" id="checkbox" v-model="tarea.completado" @click="completar(tarea)">
                    <label v-bind:class="{'todo-completed':  tarea.completado}" style="width: 80%;">{{tarea.asunto}}</label>
                    <span class="badge badge-plain pull-right" style="cursor: pointer" @click.prevent="eliminar(tarea)">x</span>
                </div>                
            </li>
        </ul>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            this.fetchData();
        },
        data(){
            return {
                tareas: [],
                tarea: {
                    asunto: ''
                }
            }
        },
        methods:{
            fetchData(){
                axios.get('tareas')
                .then((res) => {
                    this.tareas = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            crear (){
                axios.post('tareas', this.tarea)
                    .then((res) => {
                        this.tareas.unshift(res.data)
                        this.tarea.asunto = ''
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            completar(tarea){
                var url = 'tareas/'+tarea.id
                axios.put(url, {
                    completado: ! tarea.completado
                })
                .then((res) => {
                    console.log('Tarea updated')
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            eliminar(tarea){
                var url = 'tareas/'+tarea.id
                axios.delete(url)
                .then((res) => {
                    const tareaIndex = this.tareas.indexOf(tarea)
                    this.tareas.splice(tareaIndex, 1)
                })
                .catch((err) => {
                    console.log(err)
                })
            }
        }
    }
</script>
