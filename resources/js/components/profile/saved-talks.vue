<template>
    <div class="container">
        <div class="row d-flex justify-content-center" v-if="talks.length > 0">
            <div class="menu-content col-lg-8">
                <div class="title text-center to-animate">
                    <h1 class="mb-10  fadeInUp ">Saved Talks</h1>
                </div>
            </div>
        </div>
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested" class="row">
            <div v-for="talk in talks" class="col-lg-2 col-md-3 col-sm-6 outter-single-block to-animate">
                <div class="single-blog">
                    <img class="img-fluid  fadeInU " :src="'/storage/'+talk.talk.photo" alt="">
                    <div class="single-blog-info  fadeInUp ">
                        <a :href="'/speaker/'+talk.talk_id">
                            <h4>{{talk.talk.user.name}}</h4>
                        </a>
                        <p class="post-date">{{talk.talk.title}}</p>
                    </div>
                </div>
            </div>
            <br>
            <div v-if="talks.length == 0" class="empty"><h1>No Saved Talks Available!</h1></div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../../public/js/animate.js';
    export default {
        name: "saved-talks",
        mounted() {
            this.getData(this.user.id);
        },props:{
            user: {
                required: true
            }
        },
        data: function () {
            return {
                talks: [],
                requested: false
            }
        },
        methods: {
            getData(user_id){
                var fire = this;
                axios.get(`/api/save-talk/saved-talks/${user_id}`).then(function(response){
                    console.log(response);
                    fire.talks = response.data.data;
                    fire.requested = true;
                    animate ("#saved-talks", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style>
    #saved-talks .open-event-btn {
        text-align: center;
    }

    #saved-talks .single-blog-info {
        padding: 15px;
        text-align: center;
    }

    #saved-talks .single-blog img {
        max-width: 150px;
        max-height: 150px;
    }

    #saved-talks .single-blog {
        padding: 0;
    }

    #saved-talks .outter-single-block {
        padding: 15px;
        text-align: center;
    }

    #saved-talks .single-blog-info {
        padding: 15px;
    }

    .latest-blog-area .single-blog h4 {
        padding-bottom: 0px;
    }

    .empty{
        text-align: center;
        width: 100%;
    }
</style>
