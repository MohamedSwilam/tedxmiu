<template>
    <div>
        <loader v-if="!requested" class='loader'></loader>
        <figure v-if="requested" style="width: 255px;height: 150px;text-align: center;">
            <img :src="'/storage/'+holder.user.avatar" alt="" class="img-fluid" style="max-width: 100%;max-height: 100%;">
            <figcaption><b style="color: black;font-weight: bold;">{{holder.user.name}}</b><br>License Holder</figcaption>
        </figure>
    </div>
</template>

<script>
    export default {
        name: "license-holder",
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                holder: [],
                requested: false
            }
        },
        methods: {
            getData(){
                var fire = this;
                axios.get(`/api/years/license-holder`).then(function(response){
                    fire.holder = response.data.data[0];
                    fire.requested = true;
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
