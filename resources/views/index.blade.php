@extends('layouts.master')

@section('content')
<div class="container">
    <!-- Jumbotron -->
    <div class="card card-image" style="background-image: url(img/bg.jpg); background-size:cover;">
        <div class="text-white text-center rgba-stylish-strong py-5 px-4">
            <div class="py-5">

                <!-- Content -->
                <H1>ART-99</H1>
                <h2 class="card-title h2 my-4 py-2">Selamat Datang</h2>
                <h4 class="mb-4 pb-2 px-md-5 mx-md-5">Mari berkreasi bersama dengan berkontribusi menambahkan Artikel di ART-99</h4>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</div>
<div class="container my-3 text-center">
    <div class="row">
        <div class="col">
            <h3>DAFTAR ARTIKEL ART-99</h3>
        </div>
    </div>
</div>

<div class="container">
    <!-- News jumbotron -->
    <div class="jumbotron text-center hoverable p-4">

        <!-- Grid row -->
        <div class="row">
            @foreach($data as $artikel)
            <!-- Grid column -->
            <div class="col-md-4 offset-md-1 mx-3 my-3">

                <!-- Featured image -->
                <div class="view overlay">
                    <img src="{{asset('storage/img/'.$artikel->image)}}" class="img-fluid" alt="Sample image for first version of blog listing">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-7 text-md-left ml-3 mt-3">

                <!-- Excerpt -->

                <h4 class="h4 mb-4">{{$artikel->title}}</h4>

                <p class="font-weight-normal">{!! Str::words($artikel->content,40, '...')!!}</p>
                <a href="{{ route('artikel.show', $loop -> index) }}" class="btn btn-success">Read more</a>
                <div class="card-footer text-muted mt-3">
                    <p class="font-weight-normal">by <a><strong>{{$artikel->author}}</strong></a>, {{$artikel->datetime}}</p>
                </div>



            </div>
            <!-- Grid column -->
            @endforeach

        </div>
        <!-- Grid row -->

    </div>
    <!-- News jumbotron -->
</div>
@endsection