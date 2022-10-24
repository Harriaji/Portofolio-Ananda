@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Master Siswa')
@section('content-title', 'Master Siswa')
@section('main')
@if (session()->has('succes'))
<div class="row">
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
<a class="btn btn-success" href="{{route('mastersiswa.create')}}">Tambah Data</a>
<br>
<div class="row">
    <div class="col-lg-12">
        <div     class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1     ?>
            @foreach($data as $anjay)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$anjay-> nama}}</td>
                <td>{{$anjay-> jk}}</td>
                <td>{{$anjay-> email}}</td>
                <td>
                    <a href="mastersiswa/{{$anjay->id}}" class="btn btn-info btn-circle btn-sm"> <i class="fas fa-info-circle"></i></a>
                    <a href="mastersiswa/{{$anjay->id}}/edit" class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-edit"></i></a>             
                <form class="d-inline" action="{{route('mastersiswa.destroy', $anjay->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
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