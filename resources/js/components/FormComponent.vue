<template>
    <div class="card">
        <div class="card-header">¿Que estás pensando?</div>

        <div class="card-body">

            <form action="" v-on:submit.prevent="nuevoPensamiento()">
                <div class="form-group">
                    <label for="thought">Ahora estoy pensando en:</label>
                    <input type="text" class="form-control" name="description" v-model="description">
                </div>
                <button type="submit" class="btn btn-primary">
                    Enviar pensamiento
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                description:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            nuevoPensamiento(){
                const params = {
                    description:this.description
                }

                this.description = '';

                axios.post('/pensamientos',params).then((response) => {
                    const pensamiento = response.data;
                this.$emit('new',pensamiento);
                });
                
                
            }
        }
    }
</script>
