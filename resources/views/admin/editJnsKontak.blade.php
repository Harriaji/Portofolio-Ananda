@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Edit Jenis Kontak')
@section('content-title', 'Edit Jenis Kontak')
@section('main')
@if (session()->has('succes'))
<div class="col-8">
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        {{session('succes')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
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
<form method="POST" enctype="multipart/form-data" action="{{route('mainJnsKontak.update' , ['mainJnsKontak' => $data->id])}}">
    @csrf
    {{method_field('PUT')}}
    {{-- <div class="form-group">
        <label for="id">id</label>
        <input type="text" class="form-control" id="id" name="id"  value="{{$data->id}}" >
    </div> --}}
    <div class="form-group">
        <label for="jns">Jenis Kontak</label>
        <input type="text" class="form-control" id="jns" name="jns"  value="{{$data->jns}}">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Simpan">
        <a href="{{route('mainJnsKontak.index')}}" class="btn btn-danger">Batal</a>
    </div>

</form>
</div>
</div>
</div>
</div>

@endsection