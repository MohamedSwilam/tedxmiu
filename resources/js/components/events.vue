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
                    <img class="img-fluid" :src="'/storage/'+event.photo" alt="">
                    <div class="single-blog-info">
                        <a :href="'/event/'+event.id">
                            <h4>{{event.name}}</h4>
                        </a>
                        <!--31st January, 2018-->
                        <p class="post-date">{{ordinal_suffix_of(event.date.split(" ")[0].split("-")[2])}} {{ monthNames[parseInt(event.date.split(" ")[0].split("-")[1])] }}, {{event.date.split(" ")[0].split("-")[0]}}</p>
                        <p v-html="event.mini_description"></p>
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
    import animate from '../../../public/js/animate.js';

    export default {
        name: 'events',
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                events: [],
                requested: false,
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
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
            }, ordinal_suffix_of(num) {
                let j = num % 10,
                    k = num % 100;
                if (j == 1 && k != 11) {
                    return num + "st";
                }
                if (j == 2 && k != 12) {
                    return num + "nd";
                }
                if (j == 3 && k != 13) {
                    return num + "rd";
                }
                return num + "th";
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
        margin-top: 80px;
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
