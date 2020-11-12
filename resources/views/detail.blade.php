@extends('layouts.master')

@section('content')
<div class="container">
    <a href="/" class="btn btn-warning my-3 pr-3" style="float: right;">Kembali</a>
    <!-- Jumbotron -->
    <div class="jumbotron text-center">


        <!-- Title -->
        <h4 class="card-title h4 pb-2"><strong>{{$artikel ->title}}</strong></h4>

        <!-- Card image -->
        <div class="view overlay my-4">
            <img src="{{asset('storage/img/'.$artikel->image)}}" class="img-fluid" alt="">
            <a href="#">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <h5 class="indigo-text h5 mb-4">by <a><strong>{{$artikel->author}}</strong></a>, {{$artikel->datetime}}</h5>

        <p class="card-text">{{$artikel->content}}</p>

        <!-- Linkedin -->
        <a class="fa-lg p-2 m-2 li-ic"><i class="fab fa-linkedin-in grey-text"></i></a>
        <!-- Twitter -->
        <a class="fa-lg p-2 m-2 tw-ic"><i class="fab fa-twitter grey-text"></i></a>
        <!-- Dribbble -->
        <a class="fa-lg p-2 m-2 fb-ic"><i class="fab fa-facebook-f grey-text"></i></a>

    </div>
    <!-- Jumbotron -->
</div>
@endsection