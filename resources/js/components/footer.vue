<template>
    <footer class="footer-area section-gap" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12  col-md-12">
                    <div class="single-footer-widget">
                        <h6 class="to-animate"><b>What is TEDx?</b></h6>
                        <p class="to-animate">
                            In the spirit of ideas worth spreading, TED has created a program called TEDx. TEDx is a program of local,
                            self-organized events that bring people together to share a TED-like experience. Our event is called
                            TEDx[name], where x = independently organized TED event. At our TEDx[name] event, TEDTalks video
                            and live speakers will combine to spark deep discussion and connection in a small group. The TED
                            Conference provides general guidance for the TEDx program, but individual TEDx events, including
                            ours, are self-organized.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12  col-md-12" style="margin-top: 25px;">
                    <div class="single-footer-widget newsletter">
                        <h6 class="to-animate"><b>Newsletter</b></h6>
                        <p class="to-animate">Inspiration in your inbox.</p>
                        <div class="to-animate">

                            <input type="hidden" name="_token" :value="csrf" />
                            <div class="form-group row" style="width: 100%">
                                <div class="col-lg-8 col-md-12">
                                    <input v-model="email" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
                                           required="" type="email">
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <button @click="submit()" class="nw-btn primary-btn">Submit<span class="lnr lnr-arrow-right"></span></button>
                                </div>
                            </div>
                            <div class="info"></div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white to-animate">
                    This independent TEDx event is operated under license from TED <br> Copyright &copy; All rights reserved
                    | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#"
                                                                                     target="_blank"><b style="font-weight: bold;"> IT team</b></a>
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a class=" to-animate" href="https://www.facebook.com/TEDxMIU/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class=" to-animate" href="https://twitter.com/tedxmiu" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class=" to-animate" href="https://www.instagram.com/tedxmiu/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <!--<a class=" to-animate" href="#"><i class="fab fa-linkedin-in"></i></a>-->
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    import animate from '../../../public/js/animate.js';
    import Swal from 'sweetalert2/dist/sweetalert2.js'
    import 'sweetalert2/src/sweetalert2.scss'

    export default {
        name: "x-footer",
        mounted() {

        },props:{
            auth: {
                required: true
            }
        },
        data: function () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                email: null,
            }
        },
        methods: {
            submit(){
                let fire = this;
                if(this.email != null && this.email != "" && this.validateEmail(this.email)){
                    const formData = new FormData();
                    formData.append('email', this.email);
                    axios.post('/api/email', formData).then(function (response) {
                        console.log(response.data.response);
                        let footer = false;
                        if(!fire.auth){
                            footer = 'You can register <a href="/register">&nbsp;here&nbsp;</a> for more features.'
                        }
                        if(response.data.response){
                            fire.swalAlert(
                                'success',
                                'Good job!',
                                'Our Inspiration talks will be sent to your email.',
                                footer
                            );
                        } else {
                            fire.swalAlert(
                                'error',
                                'Oops...',
                                'Your email has been already registered!',
                                footer
                            );
                        }
                    }).catch(function (error) {
                       console.log(error);
                    });
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please, enter a valid email!',
                        footer: 'You can register <a href="/register">&nbsp;here&nbsp;</a> for more features.'
                    });
                }
            }, validateEmail(email) {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }, swalAlert(type, title, text, footer = false){
                if(footer != false){
                    Swal.fire({
                        type: type,
                        title: title,
                        text: text,
                        footer: footer
                    });
                }else{
                    Swal.fire({
                        type: type,
                        title: title,
                        text: text,
                    });
                }
            }
        }
    }
</script>

<style scoped>

</style>
