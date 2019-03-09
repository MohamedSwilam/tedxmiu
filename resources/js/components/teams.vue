<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 to-animate">Our Teams</h1>
                    <p class="to-animate">Get in touch with our teams.</p>
                </div>
            </div>
        </div>
        <loader v-if="!requested" class='loader'></loader>
        <div class="row" v-if="requested">
            <div class="col-lg-6 outter-single-block" v-for="team in teams">
                <div class="single-blog to-animate">
                    <img class="img-fluid" :src="'/storage/'+team.photo" alt="">
                    <div class="single-blog-info">
                        <h4>{{team.year}}</h4>
                        <p class="open-team-btn">
                            <a :href="'/team/'+team.id" class="genric-btn primary radius">Open Team</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../public/js/animate.js';
    export default {
        name: "teams",
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                teams: [],
                requested: false
            }
        },
        methods: {
            getData(){
                var fire = this;
                axios.get(`/api/years`).then(function(response){
                    fire.teams = response.data.data;
                    fire.requested = true;
                    animate ("#teams", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style>
    #teams {
        padding-top: 120px;
    }

    #teams .open-team-btn {
        text-align: center;
        position: relative;
    }

    #teams .open-team-btn a{
        position: absolute;
        right: 0;
        top: -25px;
    }

    #teams .single-blog img {
        width: 100%;
        height: auto;
        border-radius: 0;
    }

    #teams .single-blog {
        padding: 0;
        border: 1px solid #cccccc;
    }

    #teams .outter-single-block {
        padding: 15px;
    }

    #teams .single-blog-info {
        padding: 15px;
    }
</style>
