@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Edit Project')
@section('content-title', 'Edit Project')

@section('main')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>@foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                          
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{route('masterproject.update' , ['masterproject' => $data->id])}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group d-none">
                        <label for="nama_project">Id siswa</label>
                        <input type="text" class="form-control" id="id_siswa" name="id_siswa"  value="{{$data->id_siswa}}" >
                    </div>
                    <div class="form-group">
                        <label for="nama_project">Nama Project</label>
                        <input type="text" class="form-control" id="nama_project" name="nama_project"  value="{{$data->nama_project}}" >
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{$data->tanggal}}" >
                    </div>
                   
                    <div class="form-group">
                        <label for="Email">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{$data->deskripsi}}"  >
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Project</label>
                        <input class="form-control-file" type="file" id="foto" name="foto" value="{{$data->foto}}" >
                        <img src="{{asset('/template/img/'.$data->foto)}}" class="img-thumbnail" width="300px"  alt="">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('masterproject.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection