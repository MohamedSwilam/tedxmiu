@extends('../../layouts/app') 
@section('title') Our Team |
@endsection
 
@section('content')
<section class="latest-blog -area section-gap" id="teams">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10 to-animate">Our Teams</h1>
                    <p class="to-animate">Get in touch with our teams.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 outter-single-block">
                <div class="single-blog to-animate">
                    <img class="img-fluid" src="/images/alpha.jpg" alt="">
                    <div class="single-blog-info">
                        <h4>2018/2019</h4>
                        <p class="open-team-btn">
                            <a href="#" class="genric-btn primary radius">Open Team</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 outter-single-block">
                <div class="single-blog to-animate">
                    <img class="img-fluid" src="/images/women.jpg" alt="">
                    <div class="single-blog-info">
                        <h4>2017/2018</h4>
                        <p class="open-team-btn">
                            <a href="#" class="genric-btn primary radius">Open Team</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 outter-single-block">
                    <div class="single-blog to-animate">
                        <img class="img-fluid" src="/images/alpha.jpg" alt="">
                        <div class="single-blog-info">
                            <h4>2016/2017</h4>
                            <p class="open-team-btn">
                                <a href="#" class="genric-btn primary radius">Open Team</a>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
</section>
@endsection
 
@section('css')
<style>
    /******************************** START teamS SECTION ********************************/

    #teams {
        padding-top: 120px;
    }

    #teams .open-team-btn {
        text-align: center;
        position: relative;
    }

    #teams .open-team-btn a{
        position: absolute;
        right: 0;
        top: -25px;
    }

    #teams .single-blog img {
        width: 100%;
        height: auto;
        border-radius: 0;
    }

    #teams .single-blog {
        padding: 0;
        border: 1px solid #cccccc;
    }

    #teams .outter-single-block {
        padding: 15px;
    }

    #teams .single-blog-info {
        padding: 15px;
    }

    /******************************** END teamS SECTION ********************************/
</style>
@endsection