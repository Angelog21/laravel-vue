<template>
    <div class="card" style="margin-top:50px">
        <div class="card-header">Publicado en {{pensamiento.created_at}}</div>
        <div class="card-body">
            
            <input v-if="editMode" type="text" class="form-control" name="description" v-model="pensamiento.description">
            <p v-else>{{pensamiento.description}}</p>

            <div class="card-footer">
                <button v-if="editMode" type="submit" class="btn btn-success" v-on:click="actualizarPensamiento()">Guardar Cambios</button>
                <button v-else type="submit" class="btn btn-warning" v-on:click="editarPensamiento()">Editar</button>
                <button type="submit" class="btn btn-danger" v-on:click="eliminarPensamiento()">Eliminar</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'pensamiento'
        ],
        data(){
            return {
                'editMode':false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            eliminarPensamiento(){
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then(() => {
                    this.$emit('eliminar');
                });
            },
            editarPensamiento(){
                this.editMode = true;
            },
            actualizarPensamiento(){
                const params = {
                    description: this.pensamiento.description
                }
                axios.put(`/pensamientos/${this.pensamiento.id}`,params).then((response) => {
                    this.editMode = false;
                    const pensamiento = response.data;
                    this.$emit('actualizar',pensamiento);
                });
            }
        }
    }
</script>