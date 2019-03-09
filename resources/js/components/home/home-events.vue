<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 to-animate">Our Events</h1>
                    <p class="to-animate">In the spirit of TED’s mission, “ideas worth spreading,” the TEDx program helps communities, organizations
                        and individuals produce TED-style events at the local level. TEDx events are planned and coordinated
                        independently, on a community-by-community basis, under a free license from TED.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 outter-single-block" v-for="event in events">
                <div class="single-blog to-animate">
                    <img class="img-fluid" :src="'/storage/'+event.photo" alt="">
                    <div class="single-blog-info">
                        <a href="#">
                            <h4>{{event.name}}</h4>
                        </a>
                        <!--31st January, 2018-->
                        <p class="post-date">{{event.date}}</p>
                        <p v-html="event.mini_description">
                            <!--{{event.mini_description}}-->
                        </p>
                        <p class="open-event-btn">
                            <a :href="'/event/'+event.id" class="genric-btn primary radius">Open Event</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="title text-center to-animate" style="width: 100%;">
                <a href="/event" class="genric-btn primary radius arrow">All Events<span class="lnr lnr-arrow-right"></span></a>
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
                events: []
            }
        },
        methods: {
            getData(){
                var fire = this;
                axios.get(`/api/home/events/2`).then(function(response){
                    fire.events = response.data.data;
                    animate ("#events", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style>
    #events {
        padding-top: 60px;
    }

    #events .open-event-btn {
        text-align: center;
    }

    #events .single-blog img {
        width: 100%;
        height: 290px;
        border-radius: 0;
    }

    #events .single-blog {
        padding: 0;
        border: 1px solid #cccccc;
    }

    #events .outter-single-block {
        padding: 15px;
    }

    #events .single-blog-info {
        padding: 15px;
    }
</style>
