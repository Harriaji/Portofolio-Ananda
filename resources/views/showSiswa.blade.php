@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Show Siswa')
@section('content-title', 'Show Siswa')
@section('main')

<div class="row">
<div class="col-lg-3">
        <div class="card shadow mb-4">
        <div class="card-body">
            <img src="{{asset('/template/img/'.$data->foto)}}" class="img-thumbnail" width="300"  alt="" >
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama : {{$data->nama}}</li>
            <li class="list-group-item">Nisn : {{$data->nisn}}</li>
            <li class="list-group-item">Alamat : {{$data->alamat}}</li>
            <li class="list-group-item">Email : {{$data->email}}</li>
            </ul>
        </div>
    </div>
</div>

<div class="col-lg-9">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> About Siswa</h6>
        </div>
        <div class="card-body text-center">
            <h6>{{$data->about}}</h6>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> Project Siswa</h6>
        </div>
        <div class="card-body">
            @foreach ($data->project as $p)
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Nama Project : {{$p->nama_project}}</li>
            <li class="list-group-item">Deskripsi    : {{$p->deskripsi}}</li>
            </ul>
            @endforeach
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> Contact Siswa</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
            @foreach    ($data->kontak as $k)
            <li class="list-group-item">Contact: {{$k->desc_kontak}}</li>
            @endforeach
        </ul>
        </div>
    </div> 
</div>
</div>


@endsection