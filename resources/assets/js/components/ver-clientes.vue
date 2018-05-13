<template>
    <div class="row">
        <div class="col-lg-8">
        
            <div class="ibox">
                <div class="ibox-content">
                    <span class="text-muted small pull-right">Última modificación: <i class="fa fa-clock-o"></i> 2:10 pm - 25.04.2018</span>
                    <h2>Clientes</h2>
                    <p>
                        Listado general de clientes de Sanicontrol S.A.S.
                    </p>
                    <div class="input-group">
                        <input type="text" placeholder="Buscar Cliente" class="input form-control" v-model="buscar">
                        <span class="input-group-btn">
                                <button type="button" class="btn btn btn-primary"> <i class="fa fa-search" ></i> Buscar</button>
                        </span>
                    </div>
                    <div class="clients-list">
                    <ul class="nav nav-tabs">
                        <span class="pull-right small text-muted">1406 Clientes</span>
                        <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-user"></i> Personas</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-briefcase"></i> Empresas</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        <tr v-for="cliente in clientesFiltrados" v-if="cliente.cedula" :key="cliente.id">
                                            <td><a data-toggle="tab" :href="'#contact-'+cliente.id" class="client-link" @click="capturarValoresPersonas(cliente)">{{cliente.nombre_cliente}}</a></td>
                                            <td> C.C. {{cliente.cedula}}</td>
                                            <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                            <td> {{cliente.email}}</td>
                                            <td class="client-status" v-if="cliente.id == 3"><span class="label label-primary" style="padding: 3px 15px;">Cliente</span></td>
                                            <td class="client-status" v-else><span class="label label-warning">Prospecto</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="full-height-scroll">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                        <tr v-for="cliente in clientesFiltrados" v-if="cliente.razon_social" :key="cliente.id">
                                            <td><a data-toggle="tab" :href="'#company-'+cliente.id" class="client-link" @click="capturarValoresEmpresas(cliente)">{{cliente.razon_social}}</a></td>
                                            <td>NIT {{ cliente.nit}}</td>
                                            <td><i class="fa fa-flag"></i> {{cliente.sector_economico}}</td>
                                            <td class="client-status" v-if="cliente.id <= 4"><span class="label label-primary">Cliente</span></td>
                                            <td class="client-status" v-else><span class="label label-warning">Prospecto</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-4">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="tab-content">
                        <div :id="'contact-'+personas.id" class="tab-pane active">
                            <div class="row m-b-lg">
                                <div class="col-lg-4 text-center">
                                    <h2>{{personas.nombre}}</h2>

                                    <div class="m-b-sm">
                                        <p>Persona Natural</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <strong>
                                        Cliente 00{{personas.id}}
                                    </strong>

                                    <p>
                                        Presiona click en el botón para editar los datos del cliente,
                                        o completar los datos faltantes
                                    </p>
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i
                                            class="fa fa-edit"></i> Editar Cliente
                                    </button>
                                </div>
                            </div>
                            <div class="client-detail">
                            <div class="full-height-scroll">

                                <strong>Información básica</strong>

                                <ul class="list-group clear-list">
                                    <li class="list-group-item fist-item">
                                        <span class="pull-right"> {{personas.cedula}} </span>
                                        Número de Cédula
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right"> {{personas.nombre_contacto}} </span>
                                        Nombre del Contacto
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right"> {{personas.cargo_contacto}} </span>
                                        Cargo del Contacto
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right"> {{personas.email}} </span>
                                        Email
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right"> {{personas.celular}} </span>
                                        Celular
                                    </li>
                                    <li class="list-group-item">
                                        <span class="pull-right"> {{personas.direccion}} </span>
                                        Dirección
                                    </li>
                                </ul>
                                <!-- <strong>Notes</strong>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua.
                                </p> -->
                                <hr/>
                                <strong>Registro de Interacción</strong>
                                <div id="vertical-timeline" class="vertical-container dark-timeline">
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Llamada para confirmar el servicio.
                                            </p>
                                            <span class="vertical-date small text-muted"> 2:10 pm - 12.03.2018 </span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Visita para cotización.
                                            </p>
                                            <span class="vertical-date small text-muted"> 4:20 pm - 15.03.2018 </span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-file-text"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Revisión de documentos para generación de certificados.
                                            </p>
                                            <span class="vertical-date small text-muted"> 06:10 pm - 16.03.2018 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div :id="'company-'+empresas.id" class="tab-pane">
                            <div class="m-b-lg">
                                    <h2>{{empresas.razon_social}}</h2>
                                    <div>
                                        <small>Documentación entregada: 48%</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </div>
                            </div>
                            <div class="client-detail">
                                <div class="full-height-scroll">

                                    <strong>Sedes</strong>

                                    <ul class="list-group clear-list" v-if="empresas.id == 1">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <a class="btn btn-primary btn-xs" >Detalles</a> </span>
                                            Barrio Guayacanes
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <a class="btn btn-primary btn-xs" >Detalles</a></span>
                                            Barrio Santa Helena
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <a class="btn btn-primary btn-xs" >Detalles</a> </span>
                                            Barrio Obrero
                                        </li>
                                    </ul>
                                    <ul class="list-group clear-list" v-else>
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <a class="btn btn-primary btn-xs" >Detalles</a> </span>
                                            CC. Unico Outlet
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <a class="btn btn-primary btn-xs" >Detalles</a></span>
                                            Barrio La Rivera II
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <a class="btn btn-primary btn-xs" >Detalles</a> </span>
                                            Barrio Andrés Sanin
                                        </li>
                                    </ul>
                                    <strong>Documentación Soporte</strong>

                                    <ul class="list-group clear-list" v-if="empresas.id == 1">
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <span class="label label-primary" style="padding: 3px 11px;">Revisado</span> </span>
                                            RUT
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-warning" >Entregado</span></span>
                                            Camara & Comercio
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-danger" style="padding: 3px 13px;">Faltante</span> </span>
                                            Certificado Bancario
                                        </li>
                                    </ul>
                                    <ul class="list-group clear-list" v-else>
                                        <li class="list-group-item fist-item">
                                            <span class="pull-right"> <span class="label label-primary" style="padding: 3px 11px;">Revisado</span> </span>
                                            RUT
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-primary" style="padding: 3px 11px;">Revisado</span></span>
                                            Camara & Comercio
                                        </li>
                                        <li class="list-group-item">
                                            <span class="pull-right"> <span class="label label-warning">Entregado</span> </span>
                                            Certificado Bancario
                                        </li>
                                    </ul>
                                    <hr/>
                                    <strong>Registro de Actividad</strong>
                                    <div id="vertical-timeline" class="vertical-container dark-timeline">
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Llamada para confirmar el servicio.
                                                </p>
                                                <span class="vertical-date small text-muted"> 2:10 pm - 12.03.2018 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Visita para cotización.
                                                </p>
                                                <span class="vertical-date small text-muted"> 4:20 pm - 15.03.2018 </span>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-block">
                                            <div class="vertical-timeline-icon gray-bg">
                                                <i class="fa fa-file-text"></i>
                                            </div>
                                            <div class="vertical-timeline-content">
                                                <p>Revisión de documentos para generación de certificados.
                                                </p>
                                                <span class="vertical-date small text-muted"> 06:10 pm - 16.03.2018 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import lodash from 'lodash';
    Object.defineProperty(Vue.prototype, '$lodash', { value: lodash });
        export default {
            //Se ejecuta cuando se carga el documento
            mounted() {
                this.fetchData()
            },
            data(){
                return {
                    clientes: [],
                    personas: {
                        id: '',
                        nombre_cliente: '',
                        cedula: '',
                        direccion: '',
                        nombre_contacto: '',
                        cargo_contacto: '',
                        email: '',
                        celular: ''
                    },
                    empresas: {
                        id: '',
                        nombre_cliente: '',
                        razon_social: '',
                        nit: '',
                        sector_economico: '',
                        municipio: '',
                        direccion: '',
                        barrio: '',
                        nombre_contacto: '',
                        contacto_tecnico: '',
                        cargo_contacto_tecnico: '',
                        cargo_contacto: '',
                        email: '',
                        telefono: '',
                        telefono2: '',
                        extension: '',
                        celular: '',
                        empresa_actual: '',
                        razon_cambio: ''
                    },
                    buscar: ''
                }
            },
            methods: {
                fetchData(){
                    axios.get('/clientes')
                    .then((res) => {
                        this.clientes = res.data
                    })
                    .catch((err) => {
                        console.log(err)
                    })
                },
                /**
                * Llena el array de personas con la informacion respectiva de la respuesta JSON
                 */
                capturarValoresPersonas(cliente){
                    this.personas.id = cliente.id
                    this.personas.nombre = cliente.nombre_cliente
                    this.personas.cedula = cliente.cedula
                    this.personas.nombre_contacto = cliente.nombre_contacto
                    this.personas.cargo_contacto = cliente.cargo_contacto
                    this.personas.email = cliente.email
                    this.personas.celular = cliente.celular
                    this.personas.direccion = cliente.direccion
                },
                /** 
                * Llena el array de Empresa con la informacion respectiva de la respuesta JSON
                 */
                capturarValoresEmpresas(cliente){
                    this.empresas.id = cliente.id
                    this.empresas.nombre_cliente = cliente.nombre_cliente
                    this.empresas.razon_social = cliente.razon_social
                    this.empresas.nit = cliente.nit
                    this.empresas.sector_economico = cliente.sector_economico
                    this.empresas.municipio = cliente.municipio
                    this.empresas.direccion = cliente.direccion
                    this.empresas.barrio = cliente.barrio
                    this.empresas.nombre_contacto = cliente.nombre_contacto
                    this.empresas.contacto_tecnico = cliente.contacto_tecnico
                    this.empresas.cargo_contacto_tecnico = cliente.cargo_contacto_tecnico
                    this.empresas.cargo_contacto= cliente.cargo_contacto
                    this.empresas.email = cliente.email
                    this.empresas.telefono = cliente.telefono
                    this.empresas.telefono2 = cliente.telefono2
                    this.empresas.extension = cliente.extension
                    this.empresas.celular = cliente.celular
                    this.empresas.empresa_actual = cliente.empresa_actual
                    this.empresas.razon_cambio = cliente.razon_cambio
                }
            },
            computed:{
                /**
                * Filtra los clientes por nombre_cliente
                 */
                clientesFiltrados(){
                    var self = this
                    return this.clientes.filter(function (cliente) {//Llama a la funcion filter del array
                        return _.includes(cliente.nombre_cliente ,self.buscar)//Retorna los clientes quietes poseen en el atributo nombre de cliente, el texto del input buscar
                    })
                }
            }
            
            
        }
</script>
