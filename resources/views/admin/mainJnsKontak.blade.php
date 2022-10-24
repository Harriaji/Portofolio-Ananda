
@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Jenis Kontak')
@section('content-title', 'Jenis Kontak')
@section('main')

@if (session()->has('succes'))
<div class=" row">
    <div class="col-5">
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{session('succes')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
</div>
@endif
<a class="btn btn-success" href="{{route('mainJnsKontak.create')}}">Tambah Data</a>
<br>
<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-">
            <div class="card-header py-4">
                <h6 class="m-0 font-weight-bold text-primary">Jenis Kontak</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th>No. </th>
                        {{-- <th scope="col">id</th> --}}
                        <th scope="col">Jenis Kontak</th>
                        <th scope="col">Action</th>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            {{-- <td>{{$item->id}}</td> --}}
                            <td>{{$item->jns}}</td>
                            <td>
                                <a href="mainJnsKontak/{{$item->id}}/edit" class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-edit"></i></a>
                                <form class="d-inline" action="{{route('mainJnsKontak.destroy', $item->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-edit"></i></button>
                            </form>           
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection