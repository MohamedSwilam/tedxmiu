@extends('layouts.admin')

@section('content')
    <section class="banner-area" id="dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        #dashboard{
            margin-top: 150px;
            margin-bottom: 60px;
        }

        #dashboard .background-red{
            background-color: red;
            border-color: red;
        }

        #dashboard .red{
            color: red;
        }
    </style>
@endsection
