<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Our Events</h1>
                    <p>In the spirit of TED’s mission, “ideas worth spreading,” the TEDx program helps communities,
                        organizations
                        and individuals produce TED-style events at the local level. TEDx events are planned and
                        coordinated
                        independently, on a community-by-community basis, under a free license from TED.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <loader v-if="!requested" class='loader'></loader>
            <div v-for="(event, index) in events" class="col-lg-6 outter-single-block to-animate">
                <div class="single-blog">
                    <img class="img-fluid" :src="'/storage/images/'+event.photo.photo" alt="">
                    <div class="single-blog-info">
                        <a :href="'/event/'+event.id">
                            <h4>{{event.name}}</h4>
                        </a>
                        <!--31st January, 2018-->
                        <p class="post-date">{{event.date.split(" ")[0]}}</p>
                        <p>{{event.mini_description}}</p>
                        <p class="open-event-btn">
                            <a :href="'/event/'+event.id" class="genric-btn primary radius">Open Event</a>
                        </p>
                    </div>
                </div>
            </div>


            <h1 v-if="events.length == 0 && requested == true" style="text-align:center;width:100%;margin-top:25px;">No
                Events Available Yet!</h1>
        </div>
    </div>
</template>

<script>
    import AOS from 'aos';
    import 'aos/dist/aos.css';
    import animate from '../../../public/js/animate.js'

    Vue.use(AOS)

    export default {
        name: 'events',
        created() {
            AOS.init();
        },
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                events: [],
                requested: false
            }
        },
        methods: {
            getData() {
                var fire = this;
                axios.get(`/api/events`).then(function (response) {
                    fire.events = response.data.data;
                    fire.requested = true;
                    animate ("#events", 300);

                }).catch(function (error) {
                    console.log(error);
                });
            }, tConv24(time24) {
                var ts = time24;
                var H = +ts.substr(0, 2);
                var h = (H % 12) || 12;
                h = (h < 10) ? ("0" + h) : h;  // leading 0 at the left for 1 digit hours
                var ampm = H < 12 ? " AM" : " PM";
                ts = h + ts.substr(2, 3) + ampm;
                return ts;
            }
        }
    }
</script>

<style type="text/css">
    .animate {
        transition-delay: .1s;
        transition-duration: .7s;
        transition-timing-function: ease-in;
    }

    .slide-up {
        transform: translateY(100px);
    }

    .slide-up.animate-active {
        transform: translateY(0px);
    }

    #events {
        padding-top: 160px;
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
