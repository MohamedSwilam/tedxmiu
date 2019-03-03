<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center to-animate">
                    <h1 class="mb-10  fadeInUp ">HIGH BOARD '19</h1>
                </div>
            </div>
        </div>
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested" class="row">
            <div v-for="member in board" class="col-lg-2 col-md-3 col-sm-6 outter-single-block to-animate">
                <div class="single-blog">
                    <img class="img-fluid  fadeInU " :src="'/images/'+member['photo'].photo" alt="">
                    <div class="single-blog-info  fadeInUp ">
                        <a :href="'/team/'+member.year_id+'/'+member['user'].id">
                            <h4>{{member["user"].name}}</h4>
                        </a>
                        <p class="post-date">{{member["user"].user_type.type}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../public/js/animate.js';
    export default {
        name: "board",
        mounted() {
            this.getData(this.yearid);
        },props:{
            yearid: {
                required: true
            }
        },
        data: function () {
            return {
                board: [],
                requested: false
            }
        },
        methods: {
            getData(yearid){
                var fire = this;
                axios.get(`/api/years/${yearid}`).then(function(response){
                    fire.board = response.data.data;
                    fire.requested = true;
                    animate ("#team", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style>
    #team .open-event-btn {
        text-align: center;
    }

    #team .single-blog-info {
        padding: 15px;
        text-align: center;
    }

    #team .single-blog img {
        max-width: 150px;
        max-height: 150px;
        /*border-radius: 50%;*/
    }

    #team .single-blog {
        padding: 0;
    }

    #team .outter-single-block {
        padding: 15px;
        text-align: center;
    }

    #team .single-blog-info {
        padding: 15px;
    }

    .latest-blog-area .single-blog h4 {
        padding-bottom: 0px;
    }
</style>
