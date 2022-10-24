@extends('admin.app')
@section('SB ADMIN' , 'SB ADMIN')
@section('title' , 'Master Project')
@section('content-title', 'Master Project')
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

<div class="row">
    <div class="col-lg-5">
        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Project Siswa</h6>
            </div>
          
            <div class="card-body ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($siswa as $item)
            <tr>
                
                <td>{{$item->nisn}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    <a href="" onclick="show({{$item->id}}, event)" class="btn btn-info btn-circle btn-sm"> <i class="fas fa-info-circle"></i></a>
                    <a href="{{route('buat.project',$item->id)}}" class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-plus"></i></a>              
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
        </div>
        
    </div>
    <div class="col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-info-circle"></i> Project Siswa</h6>
            </div>
            <div id="project" class="card-body">
                <h6 class="text-center"> Pilih siswa terlebih dahulu</h6>
            </div>
        </div>
      
</div>
</div>
<script>
    function show(id, e){
        e.preventDefault();
        $.get('masterproject/'+id, function(data){
            $('#project').html(data);
        })
    }
</script>
@endsection