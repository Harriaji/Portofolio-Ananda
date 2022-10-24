@if($data->isEmpty())
    <h6 class="text-center">Siswa Belum Memiliki Kontak</h6>
@else
    @foreach ($data as $item)
    <div class="card">
        <div class="card-header">
            {{$item->jenis->jns}}
        </div>
        <div class="card-body">
            {{$item->jns}}
            {{$item->desc_kontak}}
        </div>
        <div class="card-footer">
              
            <form action="{{route('mastercontact.destroy',$item->id)}}" method="POST">
                @csrf
                @method('delete')
                <a href="mastercontact/{{$item->id}}/edit"  class="btn btn-warning btn-circle btn-sm"> <i class="fas fa-edit"></i></a>  
                <button type="submit" class="btn btn-danger btn-circle btn-sm"> <i class="fas fa-trash"></i></button>
            </form>
        </div>
    </div>
    @endforeach
@endif

