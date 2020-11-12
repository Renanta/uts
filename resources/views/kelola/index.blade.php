@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <a href="{{route('kelola.create')}}" class="btn btn-info mb-3">Tambah Artikel</a>
    <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Judul Artikel
                </th>
                <th class="th-sm">Penulis
                </th>
                <th class="th-sm">Tanggal
                </th>
                <th class="th-sm">Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $artikel)
            <tr>
                <td>{{$artikel->title}}</td>
                <td>{{$artikel->author}}</td>
                <td>{{$artikel->datetime}}</td>
                <td> <a href="{{ route('kelola.show', $loop -> index) }}" class="btn btn-sm btn-primary mr-1">Lihat</a>
                    <a href="{{route('kelola.edit', $loop -> index)}}" class="btn btn-sm btn-warning mr-1">Sunting</a>
                    <input type="submit" form="formDelete" role="button" class="btn btn-danger" value="Delete">
                </td>
            </tr>

            <form action="{{route('kelola.destroy', $loop ->index)}}" id="formDelete" method="POST">
                @method('DELETE')
                @csrf
            </form>
            @endforeach
        </tbody>
    </table>
</div>

@endsection