<template>
    <div class="container">
        <loader  v-if="!requested" class='loader'></loader>
        <div v-if="requested">
            <div class="speaker-header">
                <h2 class="speaker-name to-animate">{{speaker["user"].name}}</h2>
                <h2 class="speaker-title to-animate">{{speaker.title}}</h2>
            </div>
            <div class="section-top-border to-animate">
                <h3 class="mb-30 to-animate">ABOUT</h3>
                <div class="row">
                    <div class="col-md-3 speaker-img to-animate">
                        <img :src="'/images/'+speaker['photo'].photo" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20 justify to-animate">
                        <p>{{speaker.bio}}</p>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="mb-30 to-animate">TALK</h3>
                <div class="row to-animate">
                    <section class="video-area col-lg-12">
                        <div class="overlay overlay-bg"></div>
                        <div class="container">
                            <div class="video-content">
                                <a :href="speaker['video'].url" class="play-btn"><img src="/images/play-btn.png" alt=""></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import animate from '../../../public/js/animate.js';
    export default {
        name: "speaker",
        mounted() {
            this.getData(this.speakerid);
        },props:{
            speakerid: {
                required: true
            }
        },
        data: function () {
            return {
                speaker: [],
                requested: false
            }
        },
        methods: {
            getData(speakerid){
                var fire = this;
                axios.get(`/api/speaker/${speakerid}`).then(function(response){
                    fire.speaker = response.data.data;
                    fire.requested = true;
                    animate ("#speaker", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }

    }
</script>

<style>
    #speaker {
        margin-top: 120px;
        margin-bottom: 60px;
    }

    #speaker .speaker-header {
        width: 100%;
        text-align: center;
        padding-bottom: 15px;
        border-bottom: 2px dotted #dedede;
    }

    #speaker .speaker-title {
        font-size: 18px;
        color: red;
    }

    #speaker .speaker-img {
        align-content: center;
        text-align: center;
        height: 100%;
    }

    #speaker .justify {
        text-align: justify;
    }

    #speaker .speaker-img img {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 150px;

    }

    @media (max-width: 768px) {
        #speaker .speaker-img {
            margin-bottom: 25px;
        }
    }
</style>
