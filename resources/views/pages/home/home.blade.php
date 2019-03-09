@extends('../../layouts/app') 
@section('title') Home |
@endsection
 
@section('content')
<!-- start banner Area -->
<section class="banner-area" id="home">
    <div id="slider">

        <ul class="slider-list">
            <li class="slide slide1" data-index="0">
                <div class="slide-content">
                    <img src="/images/Final.jpeg">
                </div>
            </li>
            <li class="slide slide2" data-index="1">
                <div class="slide-content">
                    <div class="slide-content-info">
                        <span class="slide-title"><b>Elon Musk</b></span>
                        <span class="slide-info">Bullied when he was young, Musk had no friends and felt lonely, So he turned to learn coding at the age of ten. Now he is the founder of PayPal, SpaceX and Tesla.</span>
                        <br>
                        <a href="https://youtu.be/zIwLWfaAg-8" target="_blank" class="genric-btn primary radius">View More</a>
                    </div>
                    <img src="/images/elon-musk.png" style="z-index: -1;">
                </div>
            </li>
            <li class="slide slide3" data-index="2">
                <div class="slide-content">
                    <div class="slide-content-info">
                        <span class="slide-title"><b>Newton Aduaka</b></span>
                        <span class="slide-info">Born in Nigeria, Newton and his family moved to another countery escaping the cruel violence of the war. Between 2005 and 2007 he directed the movie "Ezra", the film won many international grand prizes.</span>
                        <br>
                        <a href="https://youtu.be/PLXsUgL_wpc" target="_blank" class="genric-btn primary radius">View More</a>
                    </div>
                    <img src="/images/newton.png" style="z-index: -1;">
                </div>
            </li>
            <li class="slide slide4" data-index="3">
                <div class="slide-content">
                    <div class="slide-content-info">
                        <span class="slide-title"><b>Matthew Cartter</b></span>
                        <span class="slide-info">Born in Nigeria, Newton and his family moved to another countery escaping the cruel violence of the war. Between 2005 and 2007 he directed the movie "Ezra", the film won many international grand prizes.</span>
                        <br>
                        <a href="https://youtu.be/xjxyEwjG2Es" target="_blank" class="genric-btn primary radius">View More</a>
                    </div>
                    <img src="/images/matthew.png" style="z-index: -1;">
                </div>
            </li>
        </ul>
        <nav class="slider-nav">
            <div class="slider-nav-content">
                <ul class="bullet-list">
                </ul>
                <ul class="arrows">
                    <li><button class="slider-button arrow next" data-index="">&#10095;</button></li>
                    <li><button class="slider-button arrow previous" data-index="">&#10094;</button></li>
                </ul>
            </div>
        </nav>
    </div>
</section>
<!-- End banner Area -->

<section class="we-offer-area section-gap" id="speakers">
    <home-speaker></home-speaker>
</section>

<section class="callto-action-area relative section-gap" id="notify">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10 text-white to-animate">Got Impressed to our features</h1>
                    <p class="text-white to-animate">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <a class="primary-btn to-animate" href="#">Request Free Demo</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blog -area section-gap" id="events">
    <home-events></home-events>
</section>

<section class="callto-action-area relative section-gap" id="mission">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10 text-white to-animate">Our Mission: Spread ideas</h1>
                    <p class="text-white to-animate" style="text-align: justify">TED is a global community, welcoming people from every discipline and culture who seek a deeper understanding
                        of the world. We believe passionately in the power of ideas to change attitudes, lives and, ultimately,
                        the world. On TED.com, we're building a clearinghouse of free knowledge from the world's most inspired
                        thinkers — and a community of curious souls to engage with ideas and each other, both online and
                        at TED and TEDx events around the world, all year long.</p>
                    <p class="text-white to-animate" style="text-align: justify">In fact, everything we do — from our Conferences to our TED Talks to the projects sparked by The Audacious
                        Project, from the global TEDx community to the TED-Ed lesson series — is driven by this goal: How
                        can we best spread great ideas?</p>
                    <a class="primary-btn to-animate" href="/about">View More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="latest-blog-area section-gap" id="team">
    <home-team></home-team>
</section>
@endsection
 
@section('css')
<style>
    /*******************************    * START SLIDER SECTION ********************************/

    @-webkit-keyframes slideInLeft {
        from {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes slideInLeft {
        from {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
            visibility: visible;
        }

        to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    .slideInLeft {
        -webkit-animation-name: slideInLeft;
        animation-name: slideInLeft;
    }

    @-webkit-keyframes slideInRight {
        from {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            visibility: visible;
        }

        to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes slideInRight {
        from {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            visibility: visible;
        }

        to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
    }

    .slideInRight {
        -webkit-animation-name: slideInRight;
        animation-name: slideInRight;
    }

    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    #slider {
        width: 100%;
        height: 90vh;
        margin: 0 auto;
        position: relative;
        top: 75px;
    }

    #slider .genric-btn.primary{
        background-color: red;
    }

    #slider .genric-btn.primary:hover{
        background-color: white;
    }

    #slider .slide .slide-content {
        color: white;
    }

    #slider .slide .slide-content img {
        position: absolute;
        top: 0;
        left: 0;
        height: 90vh;
        width: 100%;
    }

    #slider .slide .slide-content h1 {
        position: absolute;
        top: 0;
        left: 0;
        height: 90vh;
        width: 100%;
        z-index: 1;
    }

    #slider .slide-content {
        text-align: left;
    }

    #slider .slide-content h3 {
        margin-left: 30px;
    }

    #slider .slide-content-info {
        margin-left: 120px;
        text-transform: initial;
        color: red;
    }

    #slider .slide-content-info span {
        display: block;
        line-height: 90px;
        font-family: "Poppins", sans-serif;
        text-transform: inherit;
    }

    #slider .slide-content-info span b {
        font-family: "Poppins", sans-serif;
        color: red;
        font-size: 42px;
    }

    #slider .slide-content-info .slide-info {
        width: 500px;
        line-height: 24px;
        color: white;
        text-align: justify;
    }

    #slider .slide-content-info a {
        height: 40px;
        ;
    }

    #slider .slider-nav-content .bullet-list {
        position: absolute;
        text-align: center;
        width: 100%;
        left: 0;
        top: 36vh;
        z-index: 3;
        transform: rotateZ(0deg);
    }

    @media screen and (max-width: 1100px) {
        #slider {
            height: 400px;
        }

        #slider .slide .slide-content img {
            height: 400px;
        }

        #slider .slide-content-info .slide-info {
            width: 350px;
        }

        #slider .slide-content-info span b {
            font-size: 32px;
        }

        #slider .slider-nav-content .bullet-list {
            top: 175px;
        }
    }

    @media screen and (max-width: 850px) {
        #slider {
            height: 300px;
        }

        #slider .slide .slide-content img {
            height: 300px;
        }

        #slider .slide-content-info .slide-info {
            width: 280px;
            font-size: 12px;
            line-height: 15px;
        }

        #slider .slide-content-info span b {
            font-size: 27px;
        }

        #slider .slider-nav-content .bullet-list {
            top: 125px;
        }
    }

    @media (max-width: 800px){
        #slider {
            top: 60px;
        }
    }


    @media screen and (max-width: 720px) {
        #slider {
            height: 270px;
        }

        #slider .slide .slide-content img {
            height: 270px;
        }

        #slider .slide-content-info {
            margin-left: 60px;
        }

        #slider .slide-content-info span {
            line-height: 35px;
        }

        #slider .slide-content-info .slide-info {
            width: 200px;
            font-size: 10px;
        }

        #slider .slide-content-info span b {
            font-size: 22px;
        }

        #slider .slide-content-info a {
            height: 27px;
            line-height: 2.2;
            width: auto;
            padding: 0px 10px;
        }

        #slider .slider-nav-content .bullet-list {
            top: 110px;
        }

        #slider .bullet {
            width: 10px;
            height: 10px;
            margin: 0 .10em;
        }
    }

    @media screen and (max-width: 500px) {
        #slider {
            height: 200px;
        }

        #slider .slide .slide-content img {
            height: 200px;
        }

        #slider .slide-content-title {
            line-height: 35px;
        }

        #slider .slide-content-info {
            margin-left: 60px;
        }

        #slider .slide-content-info span {
            line-height: 35px;
        }

        #slider .slide-content-info .slide-info {
            line-height: 15px;
            width: 110px;
            font-size: 7px;
        }

        #slider .slide-content-info a {
            height: 27px;
            position: relative;
            line-height: 2.8;
            top: -15px;
            width: 70px;
            font-size: 9px;
            padding: 0px 5px;
        }

        #slider .slide-content-info span b {
            font-size: 16px;
        }

        #slider .slider-nav-content .bullet-list {
            top: 75px;
        }
    }

    /******************************** END SLIDER SECTION ********************************/
</style>
@endsection
