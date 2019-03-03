<template>
    <div>
        <div id="event-header-info" class="container">
            <loader  v-if="!requested" class='loader'></loader>
            <div class="row justify-content-center" v-if="requested == true">
                <div class="event-info col-lg-12">
                    <div class="generic-banner-content event-header-name to-animate">
                        <h2 class="header-name">{{event.name}}<span class="header-x">X</span></h2>
                    </div>
                    <div class="event-photo to-animate">
                        <img :src="'/images/'+event['photo'].photo">
                    </div>

                    <div class="section-top-border">
                        <h5 class="mb-30 to-animate">{{event.description}}</h5>
                        <div class="row">
                            <div class="col-md-4 to-animate">
                                <div class="single-defination">
                                    <h4 class="mb-20"><i class="fa fa-microphone"></i> HOST</h4>
                                    <p>
                                        <a v-for="talk in event.talk" v-if="talk['user'].user_type_id == 1" :href="'/speaker/'+talk.id"><u style="color: blue;">{{talk["user"].name}}</u>&nbsp</a> 
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 to-animate">
                                <div class="single-defination">
                                    <h4 class="mb-20"><i class="fa fa-calendar"></i> DATE</h4>
                                    <p>18/8/2018 9:00AM - 05:00PM</p>
                                </div>
                            </div>

                            <div class="col-md-4 to-animate">
                                <div class="single-defination">
                                    <h4 class="mb-20"><i class="fa fa-map-marker-alt"></i> LOCATION</h4>
                                    <p>Saudi Germany Hospital Auditorium</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="requested == true" id="timeline" class="container">
            <h2 class="to-animate">Timeline</h2>
            <ul class="timeline">
                <li class="to-animate" v-for="talk in event.talk">
                    <div class="timeline-badge">
                        <a><i class="fa fa-circle" id=""></i></a>
                    </div>
                    <div class="timeline-panel">
                        <div class="padding-15">
                            <div class="row">
                                <div class="col-md-3">
                                    <img :src="'/images/'+talk['photo'].photo" :alt="talk['user'].name" class="img-fluid">
                                </div>
                                <div class="col-md-9 mt-sm-20">
                                    <div class="timeline-heading">
                                        <h4>{{talk['user'].name}}</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{talk.mini_bio}}</p>
                                        <a :href="'/speaker/'+talk.id" class="genric-btn primary radius medium">VIEW MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline-footer">
                            <p class="text-right"><i class="fa fa-clock"></i> {{talk.from.split(":")[0]}}:{{talk.from.split(":")[1]}}</p>
                        </div>
                    </div>
                </li>
                <li class="clearfix no-float"></li>
            </ul>
        </div>
    </div>
</template>

<script>
    import animate from '../../../public/js/animate.js';
    export default {
        name: 'event-info',
        mounted() {
            this.getData(this.eventid);
        },props:{
            eventid: {
                required: true
            }
        },
          data: function () {
            return {
                event: [],
                requested: false
            }
          },
        methods: {
            getData(eventID){
                var fire = this;
                axios.get(`/api/events/${eventID}`).then(function(response){
                    fire.event = response.data.data;
                    fire.requested = true;
                    animate ("#event-header-info", 300);
                    setTimeout(function(){
                        animate ("#timeline", 1000);
                    }, 1000)

                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style type="text/css">
    /******************************** START EVENT HEADER ***********************************/
    #event-header {
        background-color: white;
        color: black;
    }

    #event-header .event-info {
        text-align: center;
    }

    #event-header .event-header-name {
        margin: auto;
        width: fit-content;
        margin-bottom: 40px;
    }

    #event-header .event-photo {
        margin: auto;
        border: 1px solid;
        width: fit-content;
        padding: 5px;
        color: black;
        border-radius: 5px
    }

    #event-header .event-photo img {
        width: auto;
        height: auto;
        max-width: 700px;
        max-height: 700px;
        border-radius: 5px;
    }

    @media (max-width: 840px) {
        #event-header .event-photo img {
            max-width: 400px;
            max-height: 400px;
        }
    }

    @media (max-width: 465px) {
        #event-header .event-photo img {
            max-width: 100%;
            max-height: 400px;
        }
    }
    /******************************** END EVENT HEADER *********************************/

    /******************************** START TIMLEINE ***********************************/
    @import url(//fonts.googleapis.com/css?family=Open+Sans);
    #timeline {
        margin-bottom: 30px;
    }

    #timeline h2 {
        margin-bottom: 30px;
        color: #000000;
        font-weight: bold;
        text-align: center;
    }

    #timeline p.footer {
        margin-bottom: 20px;
        color: #999999;
        font-size: 18px;
        text-align: center;
    }


    .timeline {
        list-style: none;
        padding: 10px 0;
        position: relative;
        font-weight: 300;
    }

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 2px;
        background: black;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline>li {
        margin-bottom: 20px;
        position: relative;
        width: 50%;
        float: left;
        /* box-shadow: 0 3px 7px black; */
        clear: left;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li:before,
    .timeline>li:after {
        content: " ";
        display: table;
    }

    .timeline>li:after {
        clear: both;
    }

    .timeline>li>.timeline-panel {
        width: calc(100% - 25px);
        width: -moz-calc(100% - 25px);
        width: -webkit-calc(100% - 25px);
        float: left;
        /* border: 1px solid red; */
        background: #ffffff;
        position: relative;
        box-shadow: 0 4px 10px black;
    }

    .timeline>li>.timeline-panel:before {
        position: absolute;
        top: 26px;
        right: -15px;
        background: black;
        display: inline-block;
        border-top: 15px solid transparent;
        border-left: 15px solid #000000;
        border-right: 0 solid red;
        border-bottom: 15px solid transparent;
        /* content: " "; */
    }

    .timeline>li>.timeline-panel:after {
        position: absolute;
        top: 27px;
        right: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-left: 14px solid black;
        border-right: 0 solid black;
        border-bottom: 14px solid transparent;
        content: " ";
    }

    .timeline>li>.timeline-badge {
        color: #ffffff;
        width: 24px;
        height: 24px;
        line-height: 50px;
        text-align: center;
        position: absolute;
        top: 16px;
        right: -12px;
        z-index: 100;
    }

    .timeline>li:nth-child(even)>.timeline-panel {
        float: right;
    }

    .timeline>li:nth-child(even)>.timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    .timeline>li:nth-child(even)>.timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }

    .timeline-badge>a {
        color: black !important;
    }

    .timeline-badge a:hover {
        color: red !important;
    }

    .timeline-title {
        margin-top: 0;
        color: inherit;
    }

    .timeline-heading h4 {
        font-weight: 400;
        padding: 0 15px;
        color: black;
        font-weight: bold;
    }

    .timeline-body>p,
    .timeline-body>ul {
        padding: 10px 15px;
        margin-bottom: 0;
        color: black;
    }

    .timeline-footer {
        padding: 5px 15px;
        background-color: black;
        color: white;
        font-weight: bold;
    }

    .timeline-footer p {
        margin-bottom: 0;
    }

    .timeline-footer>a {
        cursor: pointer;
        text-decoration: none;
    }

    .timeline>li:nth-child(even) {
        float: right;
        clear: right;
    }

    .timeline>li:nth-child(2) {
        margin-top: 60px;
    }

    .timeline>li:nth-child(even)>.timeline-badge {
        left: -12px;
    }

    .no-float {
        float: none !important;
    }

    #timeline .padding-15 {
        padding: 15px;
    }

    @media (max-width: 767px) {
        ul.timeline:before {
            left: 40px;
        }
        ul.timeline>li {
            margin-bottom: 0px;
            position: relative;
            width: 100%;
            float: left;
            clear: left;
        }
        ul.timeline>li>.timeline-panel {
            width: calc(100% - 65px);
            width: -moz-calc(100% - 65px);
            width: -webkit-calc(100% - 65px);
        }
        ul.timeline>li>.timeline-badge {
            left: 28px;
            margin-left: 0;
            top: 16px;
        }
        ul.timeline>li>.timeline-panel {
            float: right;
        }
        ul.timeline>li>.timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }
        ul.timeline>li>.timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
        .timeline>li:nth-child(even) {
            float: left;
            clear: left;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        .timeline>li:nth-child(even)>.timeline-badge {
            left: 28px;
        }
    }
    /******************************** END TIMLEINE ***********************************/
</style>
