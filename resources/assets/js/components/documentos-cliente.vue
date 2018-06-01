<template>
<div class="ibox">
    <div class="ibox-content">
        <h2>Documentos</h2>
        <small >Listado de documentos del cliente</small>

        <ul class="todo-list m-t small-list">
            <li >
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox"  >
                    <label  >RUT</label>
                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                </div>                
            </li>
            <li >
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox"  >
                    <label  >Cámara y Comercio</label>
                    <!-- <span class="badge badge-success pull-right" >E</span> -->
                </div>                
            </li>
            <li >
                <div class="checkbox checkbox-success" style="padding-right: 3px;margin: 2px;">
                    <input type="checkbox"  >
                    <label  >Cédula Rep. Legal</label>
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
           console.log("componente-documents");
        }
    }
</script>
