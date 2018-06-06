<template>
<li class="dropdown ">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
            <i class="fa fa-bell"></i>  <span class="label label-warning" v-text="notificaciones.length" v-if="notificaciones.length"></span>
        </a>
        <ul class="dropdown-menu dropdown-messages " v-if="notificaciones.length">
            <div v-for="notificacion in notificaciones" :key="notificacion.id">
                <li >
                    <div class="dropdown-messages-box">
                        <a href="/novedades/listado" class="pull-left">
                            <img alt="image" class="img-circle" :src="'/storage/'+notificacion.data.foto">
                        </a>
                        <div class="media-body">
                            <small @click="eliminarNotificacion(notificacion)" style="cursor: pointer" class="pull-right badge badge-default"><i class="fa fa-times"></i></small>
                            <strong v-text="notificacion.data.nombres +' '+ notificacion.data.apellidos"></strong> 
                            <p v-if="notificacion.type == 'ABAS\\Notifications\\NovedadResuelta'" style="padding: 0;margin: 0;">ha resuelto tu novedad</p> 
                            <p v-else style="padding: 0;margin: 0;">ha publicado una nueva novedad</p>
                            <small class="text-muted" v-text="notificacion.created_at"></small>
                        </div>
                    </div>
                </li>
            <li class="divider"></li>
            </div>
            <li>
                <div class="text-center link-block">
                    <a @click="eliminarTodasNotificaciones(notificacion)">
                        <i class="fa fa-envelope-open"></i> <strong>Marcar todo como leído</strong>
                    </a>
                </div>
            </li>

        </ul>
</li >

</template>

<script>
    export default {
        //Se ejecuta cuando se carga el documento
        mounted() {
            console.log('Notificaciones Montado')
            this.notificacionesNoLeidas()
        },
        data(){
            return{
                notificaciones: [],
                notificacion: []
            }
        },
        methods: {
            /**
            * Obtiene todas las notificaciones No leidas del usuario autenticado 
             */
            notificacionesNoLeidas(){
                axios.get('/notificaciones')
                .then((res) => {
                    this.notificaciones = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            /**
            * Elimina una notificacion de la base de datos 
             */
            eliminarNotificacion(notificacion){
                axios.delete('/notificaciones/'+notificacion.id)
                .then((res) => {
                    this.notificaciones = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            },
            /**
            * Elimina todas las notificaciones de la base de datos del usuario autenticado
             */
            eliminarTodasNotificaciones(notificacion){
                this.notificaciones.forEach(notificacion => {
                    this.eliminarNotificacion(notificacion)
                });
            }
        }
    }
</script>
