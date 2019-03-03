<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-10">
                <div class="title text-center">
                    <h1 class="mb-10 to-animate">Our Speakers</h1>
                    <p class="to-animate">Who are in extremely love with eco friendly system.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 single-offer d-flex flex-row pb-30 to-animate" v-for="speaker in speakers">
                <div class="icon">
                    <img :src="'/images/'+speaker['photo'].photo" alt="">
                </div>
                <div class="desc">
                    <a :href="'/speaker/'+speaker.id">
                        <h4>{{speaker["user"].name}}</h4>
                    </a>
                    <p>
                        {{speaker.mini_bio}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../../public/js/animate.js';
    export default {
        name: "home-speakers",
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                speakers: []
            }
        },
        methods: {
            getData(){
                var fire = this;
                axios.get(`/api/home/speakers`).then(function(response){
                    fire.speakers = response.data.data;
                    animate ("#speakers", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style>
    #speakers {
        padding-bottom: 50px;
    }

    #speakers .icon img {
        width: 100px;
    }
</style>
