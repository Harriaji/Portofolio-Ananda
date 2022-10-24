@if($data->isEmpty())
    <h6 class="text-center">Siswa Belum Memiliki Project</h6>
@else
    @foreach ($data as $item)
    <div class="card">
        <div class="card-header">
            {{$item->nama_project}}
        </div>
        <div class="card-body">
            {{$item->tanggal}}
            {{$item->deskripsi}}
            <br>
            <img src="{{asset('/template/img/'.$item->foto)}}" class="img-thumbnail" width="300"  alt="" >
        </div>
        <div class="card-footer">
              
            <form action="{{route('masterproject.destroy',$item->id)}}" method="POST">
                @csrf
                @method('delete')
                <a href="masterproject/{{$item->id}}/edit"  class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-edit"></i></a>  
                <button type="submit" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></button>
            </form>
        </div>
    </div>
    @endforeach
@endif