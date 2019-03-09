<template>
    <div class="container">
        <loader v-if="!requested" class='loader'></loader>
        <div v-if="requested">
            <div v-for="year in years" class="year-sponsors">
                <div class="generic-banner-content event-header-name to-animate">
                    <h2 class="header-name">{{year.year}}<span class="header-x">X</span></h2>
                </div>
                <div class="row">
                    <div v-for="sponsor in year.sponsor" class="col-lg-2 col-md-3 col-sm-6 outter-single-block to-animate">
                        <div class="single-blog">
                            <img class="img-fluid  fadeInUp " :src="'/storage/'+sponsor.photo" alt="">
                            <div class="single-blog-info  fadeInUp ">
                                <a>
                                    <h4>{{sponsor.name}}</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import animate from '../../../public/js/animate.js';
    export default {
        name: "team",
        mounted() {
            this.getData();
        },
        data: function () {
            return {
                years: [],
                requested: false
            }
        },
        methods: {
            getData(){
                var fire = this;
                axios.get(`/api/sponsors`).then(function(response){
                    console.log(response);
                    fire.years = response.data.data;
                    fire.requested = true;
                    animate ("#sponsors", 300);
                }).catch(function(error){
                    console.log(error);
                });
            }
        }
    }
</script>

<style>
    #sponsors .event-header-name {
        /*margin: auto;*/
        width: fit-content;
        margin-bottom: 20px;
    }

    .year-sponsors{
        margin-bottom:30px;
    }

    #sponsors{
        margin-top: 150px;
    }
    #sponsors .open-event-btn {
        text-align: center;
    }

    #sponsors .single-blog-info {
        padding: 15px;
        text-align: center;
    }

    #sponsors .single-blog img {
        max-width: 150px;
        max-height: 150px;
        /*border-radius: 50%;*/
    }

    #sponsors .single-blog {
        padding: 0;
    }

    #sponsors .outter-single-block {
        padding: 15px;
        text-align: center;
    }

    #sponsors .single-blog-info {
        padding: 15px;
    }

    .latest-blog-area .single-blog h4 {
        padding-bottom: 0px;
    }
</style>
