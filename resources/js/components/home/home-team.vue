<template>
    <div class="container">
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10 to-animate">Our Team</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 outter-single-block" v-for="member in board">
                    <div class="single-blog">
                        <img class="img-fluid to-animate" :src="'/storage/'+member['user'].avatar" alt="">
                        <div class="single-blog-info to-animate">
                            <a>
                                <h4>{{member["user"].name}}</h4>
                            </a>
                            <p class="post-date">{{member["user"].user_type.type}}</p>
                        </div>
                    </div>
                </div>
                <div class="title text-center to-animate" style="width: 100%;">
                    <a href="/team" class="genric-btn primary radius arrow">View All Teams<span class="lnr lnr-arrow-right"></span></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../../public/js/animate.js';
    export default {
        name: "home-events",
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                board: [],
                requested: false
            }
        },
        methods: {
            getData(){
                var fire = this;
                axios.get(`/api/home/lastboard`).then(function(response){
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
    #team {
        padding-top: 60px;
    }

    #team .open-event-btn {
        text-align: center;
    }

    #team .single-blog-info {
        padding: 15px;
        text-align: center;
    }

    #team .single-blog img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
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
