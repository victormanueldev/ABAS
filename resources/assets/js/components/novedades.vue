<template>
<div>
    <div class="social-feed-box" v-for="novedad in novedadesOrdenadas" :key="novedad.id">
        <div class="pull-right social-action dropdown">
            <button data-toggle="dropdown" class="dropdown-toggle btn-white">
                <i class="fa fa-angle-down"></i>
            </button>
            <ul class="dropdown-menu m-t-xs">
                <li><a href="#">Ocultar</a></li>
            </ul>
        </div>
        <div class="social-avatar">
            <a href="#" class="pull-left">
                <img alt="image" :src="'/storage/'+novedad.foto_user1">
            </a>
            <div class="media-body">
                <a href="#" style="color: #676a6c;">
                    {{novedad.nombres_user1}} {{novedad.apellidos_user1}}
                </a>
                <small class="text-muted">{{novedad.hora_creacion}} - {{novedad.fecha_creacion}}</small>
            </div>
        </div>

        <div class="social-body">
            <p>
                {{novedad.descripcion}}
            </p>


        </div>
        <div v-if="novedad.estado == 'resuelta'" class="social-footer">

            <div class="social-comment">
                <a href="" class="pull-left">
                    <img alt="image" :src="'/storage/'+novedad.foto_user2">
                </a>
                <div class="media-body">
                    <a href="#" style="color: #676a6c;">
                        {{ novedad.nombres_user2 }} {{ novedad.apellidos_user2 }}
                    </a>
                    Ha resuelto la novedad.
                    <br/>
                    <a href="#" class="small" style="color: #676a6c;"><i class="fa fa-check"></i> Resuelto!</a> -
                    <small class="text-muted">{{ novedad.fecha_resuelto }} - {{ novedad.hora_resuelto }}</small>
                </div>
            </div>
        </div>
        <div v-else-if="novedad.id_auth == novedad.id_user1">
        </div>
        <div v-else class="social-footer">
            <div class="social-comment">
                <a href="" class="pull-left">
                    <img alt="image" :src="'/storage/'+novedad.foto_auth">
                </a>
                <div class="media-body">
                    <div class="form-group">
                        <textarea v-model="comentario_text[novedad.id]" class="form-control" placeholder="Escribe un comentario..."></textarea>
                    </div>

                    <div class="btn-group text-muted pull-right">
                        <a v-if="novedad.estado == 'publicada'" class="btn btn-outline btn-success btn-xs" @click.prevent="resolver(novedad)"><i class="fa fa-check-square-o"></i> Resolver</a>
                        <a v-else class="btn btn-default btn-xs "><i class="fa fa-check"></i> Resuelto</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
    //Importacion del Loadash
    import lodash from 'lodash';    
    Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });
    export default {
        //Se ejecuta cuando se carga el documento
        mounted() {
            this.fetchData();
        },
        data() {
            /**
            * Inicializacion de datos y variables
            */
            return {
                novedades: [],
                nueva_novedad: {
                    id: '',
                    descripcion: '',
                    area: ''
                },
                 comentario_text: []
            }
        },
        methods: {
            /**
            * Método para listar todas las novedades que se reciben desde el ENDPOINT
            * convierte la respuesta del servidor en una novedad
            */
            fetchData(){
                axios.get('novedades')
                .then((res) => {
                    this.novedades = res.data
                })
                .catch((err) => {
                    console.log(err)
                });
            },
            /**
            * Método para resolver la novedad
            * envia una variable al servicio para actualizar la novedad
            **/
            resolver(novedad){
                var url = 'novedades/'+novedad.id
                axios.put(url, {
                    estado: 'resuelta',
                    comentario: this.comentario_text[novedad.id]
                })
                .then((res) => {
                    this.fetchData()
                })
                .catch((err) => {
                    console.log(err)
                })
            }

        },
        computed: {
            /**
            * Ordena las novedades de forma descendiente por fecha y por hora de creacion
            **/
            novedadesOrdenadas(){
                return _.orderBy(this.novedades, ['fecha_creacion', 'hora_creacion'], ['desc', 'desc'])
            }
        }
    }
</script>
