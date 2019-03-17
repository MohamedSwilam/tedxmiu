<template>
    <div class="container">
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 outter-single-block to-animate">
                    <div class="single-blog">
                        <img class="img-fluid  fadeInUp " :src="'/storage/'+head[0]['user'].avatar" alt="">
                        <div class="single-blog-info  fadeInUp ">
                            <a>
                                <h4>{{head[0]["user"].name}}</h4>
                            </a>
                            <p class="post-date">{{head[0]["user"].user_type.type}}</p>
                        </div>
                    </div>
                </div>

                <div v-for="member in team" class="col-lg-2 col-md-3 col-sm-6 outter-single-block to-animate">
                    <div class="single-blog">
                        <img class="img-fluid  fadeInUp " :src="'/storage/'+member['user'].avatar" alt="">
                        <div class="single-blog-info  fadeInUp ">
                            <a>
                                <h4>{{member["user"].name}}</h4>
                            </a>
                            <p class="post-date">{{member["user"].user_type.type}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../public/js/animate.js';
    export default {
        name: "team",
        mounted() {
            this.getData(this.yearid, this.userid);
        },props:{
            yearid: {
                required: true
            }, userid:{
                required: true
            }
        },
        data: function () {
            return {
                head: [],
                team: [],
                requested: false
            }
        },
        methods: {
            getData(yearid, userid){
                var fire = this;
                axios.get(`/api/years/${yearid}/${userid}`).then(function(response){
                    fire.head = response.data[0].data;
                    fire.team = response.data[1].data;
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
