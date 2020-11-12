@extends('layouts.master')

@section('content')
<div class="container">
    <section class="form-simple">

        <!--Form with header-->
        <div class="card">

            <!--Header-->
            <div class="header pt-3 grey lighten-2">

                <div class="row d-flex justify-content-start">
                    <h3 class="deep-grey-text mt-3 mb-4 pb-1 mx-5">Tambahkan Artikel</h3>
                </div>

            </div>
            <!--Header-->

            <div class="card-body mx-4 mt-4">

                <!--Body-->
                <form action="{{route('kelola.store')}}" class="md-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="md-form">
                        <label for="title">Judul Artikel</label>
                        <input type="text" id="title" name="title" class="form-control">
                    </div>

                    <div class="md-form pb-3">
                        <label for="author">Penulis</label>
                        <input type="text" id="author" name="author" class="form-control">
                    </div>
                    <div class="md-form pb-3">
                        <label for="content">Konten Artikel</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="md-form pb-3">
                        <label for="image">Masukkan Gambar</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
                    <div class="mb-4">
                        <input type="submit" class="btn btn-primary" value="Tambah Data">
                        <a href="/kelola" class="btn btn-warning">Kembali</a>
                    </div>
                </form>
                <p class="font-small grey-text d-flex justify-content-center">Artikel by ART-99</a></p>

            </div>

        </div>
        <!--/Form with header-->

    </section>
</div>
@endsection