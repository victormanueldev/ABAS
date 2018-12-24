<template>
<div class="ibox">
    <div class="ibox-content">
        <h2>Documentos</h2>
        <small >Listado de documentos del cliente</small>

        <ul class="todo-list m-t small-list">
            <li>
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox"  v-model="docs.rut" :checked="docs.rut" @click="updateDocs('rut')">
                    <label  >RUT</label>
                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                </div>                
            </li>
            <li v-if="typeClient == 'Persona Juridica'">
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox"  v-model="docs.camAndCommerce" :checked="docs.camAndCommerce" @click="updateDocs('camAndCommerce')">
                    <label  >Cámara y Comercio</label>
                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                </div>                
            </li>
            <li >
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox"  v-model="docs.ident" :checked="docs.ident" @click="updateDocs('ident')">
                    <label  v-if="typeClient == 'Persona Juridica'">Cédula Rep. Legal</label>
                    <label  v-else>Cédula</label>
                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                </div>                
            </li>
        </ul>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
           this.fetchDocsClient();
        },
        data(){
            return{
                typeClient: '',
                docs:{
                    rut: false,
                    camAndCommerce: false,
                    ident: false,
                },
                idClient: ''
            }
        },
        methods: {
            fetchDocsClient(){
                const url = window.location.pathname.split("/")
                this.idClient = url[2]
                axios.get(`/clientes/${this.idClient}/edit`)
                    .then(res => {
                        this.typeClient = res.data[0].tipo_cliente
                        this.docs.rut = res.data[0].doc_rut
                        this.docs.camAndCommerce = res.data[0].doc_camara_comercio
                        this.docs.ident = res.data[0].doc_identidad
                    })
                    .catch(err => {
                        console.log(err)
                    })
            },
            updateDocs(type){
                axios.put(`/clientes/${this.idClient}`, {
                    docToUpdate: `doc_${type}`,
                    value: this.docs[type] == true ? false : true
                })
                    .then(res => {
                        console.log(res)
                    })
                    .catch(err => {
                        console.log(err)
                    }) 
            }
        }
    }
</script>
