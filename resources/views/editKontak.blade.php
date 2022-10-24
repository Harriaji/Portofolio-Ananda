@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Edit Contact')
@section('content-title', 'Edit Contact')
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
                <form method="POST" enctype="multipart/form-data" action="{{route('mastercontact.update' , ['mastercontact' => $data->id])}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group d-none">
                        <label for="nama_project">id siswa</label>
                        <input type="text" class="form-control" id="id_siswa" name="id_siswa"  value="{{$data->id_siswa}}" >
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="inputGroupSelect01" class="input-group-text">Jenis Kontak</label>
                        </div>
                        <select name="id_jenis" id="inputGroupSelect01" class="custom-select">
                            <option selected>-</option>                    
                            @foreach ($jenis_kontak as $jns) 
                            @if ($jns->id == $data->id_jenis )
                            <option selected value="{{$jns->id}}">{{$jns->jns}}</option>
                            @else 
                            <option value="{{$jns->id}}">{{$jns->jns}}</option>
                            @endif
                            
                            @endforeach                   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Deskripsi</label>
                        <input type="text" class="form-control" id="desc_kontak" name="desc_kontak"  value="{{$data->desc_kontak}}" >
                    </div>
                   
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                        <a href="{{route('mastercontact.index')}}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection