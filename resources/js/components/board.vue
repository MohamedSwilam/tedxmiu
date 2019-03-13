<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center to-animate">
                    <h1 class="mb-10  fadeInUp ">HIGH BOARD</h1>
                    <h4 class="mb-10  fadeInUp ">{{board[0].year.year}}</h4>
                </div>
            </div>
        </div>
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested" class="row">
            <div v-for="member in board" class="col-lg-2 col-md-3 col-sm-6 outter-single-block to-animate">
                <div class="single-blog">
                    <img class="img-fluid  fadeInU " :src="'/storage/'+member['user'].avatar" alt="">
                    <div class="single-blog-info  fadeInUp ">
                        <a v-if="member.user.user_type.has_members == 1" :href="'/team/'+member.year_id+'/'+member['user'].id">
                            <h4>{{member["user"].name}}</h4>
                        </a>
                        <h4 v-else>{{member["user"].name}}</h4>
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
    #team{
        margin-top: 70px;
    }

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
