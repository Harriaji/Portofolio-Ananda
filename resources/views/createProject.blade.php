@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Create Project')
@section('content-title', 'Create Project '.$siswa->nama)
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
                <form method="POST" enctype="multipart/form-data" action="{{route('makel')}}">
                    @csrf
                    <div class="form-group d-none">
                        <label for="nama_project">Id siswa</label>
                        <input type="text" class="form-control" id="id_siswa" name="id_siswa"  value="{{$siswa->id}}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_project">Nama Project</label>
                        <input type="text" class="form-control" id="nama_project" name="nama_project"  value="{{old('nama_project')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{old('tanggal')}}" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="Email">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{old('deskripsi')}}" required >
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Project</label>
                        <input class="form-control-file" type="file" id="foto" name="foto" value="" required>
                        
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