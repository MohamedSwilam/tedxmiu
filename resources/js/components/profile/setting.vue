<template>
    <div class="container">
        <div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mt-sm-30">
                    <div class="single-element-widget" v-if="email_checked != null">
                        <h3 class="mb-30 to-animate">Settings</h3>
                        <div class="switch-wrap d-flex justify-content-between to-animate">
                            <p>01. Recieve Inspiration Emails.</p>
                            <div class="primary-switch">
                                <input type="checkbox" v-model="email_checked" @change="update" id="primary-switch" checked>
                                <label for="primary-switch"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    import animate from '../../../../public/js/animate.js';

    export default {
        name: "setting",
        mounted() {
            this.check_is_saved();
        },props:{
            user: {
                required: true
            }
        },
        data: function () {
            return {
                requested: false,
                email_checked: null
            }
        },
        methods: {
            check_is_saved(){
                let fire = this;
                axios.get(`/api/email/check/${this.user.email}`).then(function(response){
                    fire.email_checked = response.data;
                    animate('#setting', 300);
                }).catch(function(error){
                    console.log(error);
                });
            },
            update(){
                if(this.email_checked){
                    this.add();
                } else {
                    this.delete();
                }
            },
            add(){
                let fire = this;
                const formData = new FormData();
                formData.append('email', this.user.email);
                axios.post('/api/email', formData).then(function (response) {
                    fire.email_checked = response.data.response;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            delete(){
                let fire = this;
                axios.delete(`/api/email/${this.user.email}`).then(function(response){
                    if(response.status == 200){
                        fire.email_checked = !response.data;
                    } else {
                        return false;
                    }
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
