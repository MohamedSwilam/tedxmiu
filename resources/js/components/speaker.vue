<template>
    <div class="container">
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested">
            <div class="speaker-header">
                <h2 class="speaker-name to-animate">{{speaker["user"].name}}</h2>
                <h2 class="speaker-title to-animate">{{speaker.title}}</h2>
            </div>
            <div class="speaker-action">
                <div v-if="is_saved != null">
                    <button v-if="!is_saved" class="nw-btn primary-btn save to-animate" @click="save"><i class="fa fa-star"></i> Save Talk</button>
                    <button v-else class="nw-btn primary-btn save to-animate" @click="unsave"><i class="fa fa-trash"></i> Un Save Talk</button>
                </div>
                <social-sharing :url="'http://tedxmiu.test/speaker/'+speakerid"
                                :title="speaker['user'].name"
                                :description="speaker.mini_bio"
                                :quote="speaker.mini_bio"
                                hashtags="TEDxMIU,TEDx,TED"
                                twitter-user="TEDxMIU"
                                inline-template>
                    <div>
                        <network network="facebook" class="nw-btn primary-btn share to-animate">
                            <i class="fab fa-facebook"></i> Facebook
                        </network>
                        <network network="twitter" class="nw-btn primary-btn share to-animate">
                            <i class="fab fa-twitter"></i> Twitter
                        </network>
                        <network network="linkedin" class="nw-btn primary-btn share to-animate">
                            <i class="fab fa-linkedin"></i> LinkedIn
                        </network>
                        <network network="whatsapp" class="nw-btn primary-btn share to-animate">
                            <i class="fab fa-whatsapp"></i> Whatsapp
                        </network>
                        <network network="email" class="nw-btn primary-btn share to-animate">
                            <i class="fa fa-envelope"></i> Email
                        </network>
                        <network network="skype" class="nw-btn primary-btn share to-animate">
                            <i class="fab fa-skype"></i> Skype
                        </network>
                        <network network="sms" class="nw-btn primary-btn share to-animate">
                            <i class="fas fa-sms"></i> SMS
                        </network>
                    </div>
                </social-sharing>
            </div>
            <div class="section-top-border to-animate">
                <h3 class="mb-30 to-animate">ABOUT</h3>
                <div class="row">
                    <div class="col-md-3 speaker-img to-animate">
                        <img :src="'/storage/'+speaker.photo" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20 justify to-animate">
                        <p v-html="speaker.bio"></p>
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
                                <a :href="speaker.video" class="play-btn"><img src="/images/play-btn.png" alt=""></a>
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
    import Swal from 'sweetalert2/dist/sweetalert2.js';
    import 'sweetalert2/src/sweetalert2.scss';


    export default {
        name: "speaker",
        mounted() {
            this.getData(this.speakerid);
            if (this.auth != false){
                this.check_is_saved(this.speakerid, this.auth.id);
            }
        },props:{
            speakerid: {
                required: true
            },
            auth: {
                required: true
            }
        },
        data: function () {
            return {
                speaker: [],
                is_saved: null,
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
            },

            check_is_saved(speaker_id, user_id){
                let fire = this;
                axios.get(`/api/save-talk/is_saved/${speaker_id}/${user_id}`).then(function(response){
                    fire.is_saved = response.data;
                }).catch(function(error){
                    console.log(error);
                });
            },

            save(){
                const formData = new FormData();
                formData.append('talk_id', this.speakerid);
                formData.append('user_id', this.auth.id);
                let fire = this;
                axios.post('/api/save-talk', formData).then(function (response) {
                    if(response.data.response){
                        fire.is_saved = true;
                        fire.swalAlert('success', 'Talk Saved!',
                            'You can view the talk in your saved talks.');
                    } else{
                        fire.swalAlert('error', 'Oops...',
                            'Failed to save talk, please try again later!');
                    }
                }).catch(function (error) {
                    console.log(error);
                    fire.swalAlert('error', 'Oops...',
                        'Failed to save talk, please try again later!');
                });
            },

            unsave(){
                let fire = this;
                axios.get(`/api/save-talk/delete/${fire.speakerid}/${fire.auth.id}`).then(function (response) {
                    if(response.data.response){
                        fire.is_saved = false;
                        fire.swalAlert('success', 'Talk Un Saved!',
                            'You can not view the talk in your saved talk anymore.');
                    } else{
                        fire.swalAlert('error', 'Oops...',
                            'Failed to un save talk, please try again later!');
                    }
                }).catch(function (error) {
                    console.log(error);
                    fire.swalAlert('error', 'Oops...',
                        'Failed to save talk, please try again later!');
                });
            },

            swalAlert(type, title, text){
                Swal.fire({
                    type: type,
                    title: title,
                    text: text,
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
        /*border-bottom: 2px dotted #dedede;*/
    }

    #speaker .speaker-action{
        text-align: center;
        margin: 15px;
    }

    #speaker .speaker-action .primary-btn {
        line-height: 27px;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 5px;
        border: none;
        color: #fff;
        display: inline-block;
        font-weight: 500;
        position: relative;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        text-transform: uppercase;
    }

    #speaker .speaker-action .primary-btn.save,
    #speaker .speaker-action .primary-btn.share {
        background-color: red;
        margin: 5px;
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
