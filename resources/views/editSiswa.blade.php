@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Edit Siswa')
@section('content-title', 'Edit Siswa')
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
                <form method="POST" enctype="multipart/form-data" action="{{route('mastersiswa.update' , ['mastersiswa' => $data->id])}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"  value="{{$data->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="NISN">NISN</label>
                        <input type="text" class="form-control" id="NISN" name="nisn"  value="{{$data->nisn}}" >
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-select form-control"  value="{{$data->jk}}" >
                        <option value="" >-</option>
                        <option value="Laki Laki" @if($data->jk == 'Laki Laki') selected @endif>Laki - Laki</option>
                        <option value="perempuan" @if($data->jk == 'perempuan') selected @endif >Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}" >
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"  value="{{$data->alamat}}" >
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea type="text" class="form-control" id="about" name="about"  value="" >{{$data->about}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input class="form-control-file" type="file" id="foto" name="foto" value="{{$data->foto}}">
                        <img src="{{asset('/template/img/'.$data->foto)}}" class="img-thumbnail" width="300px"  alt="">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('mastersiswa.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection