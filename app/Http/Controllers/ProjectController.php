<?php

namespace App\Http\Controllers;
use File;
use App\Models\Project_;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data = Project_::all();
        $siswa = Siswa::all();
        return view('admin.masterproject' , compact('data','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
          
        ] ;

        $this->validate($request,[
        'id_siswa' => 'required|numeric',
        'nama_project' => 'required|min:5|max:50',
        'tanggal' => 'required',
        'deskripsi' => 'required|min:5',
        'foto' => 'required|mimes:jpg,jpeg,giv,svg,cr2',

      ],$message);
       //ambil informasi file yang diupload
    $file = $request->file('foto');

    //rename + ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

    // proses upload
    $tujuan_upload = './template/img';
    $file->move($tujuan_upload,$nama_file);

    // proses penyimpanan ke database
    Project_::create([
        'id_siswa' => $request->id_siswa,
        'nama_project' => $request->nama_project,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'foto' => $nama_file,
    ]);
        return redirect('masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->project()->get();
        return view('showProject',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Project_::find($id);
        return view('editProject' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
          
        ] ;

        $this->validate($request,[
        'id_siswa' => 'required|numeric',
        'nama_project' => 'required|min:5|max:50',
        'tanggal' => 'required',
        'deskripsi' => 'required|min:5',
        'foto' => 'mimes:jpg,jpeg,giv,svg,cr2',

      ],$message);

      if ($request->foto != ''){
        $projek = Project_::find($id);
        file::delete('/template/img'.$projek->foto);
        $file = $request->file('foto');

        //rename + ambil nama file
         $nama_file = time()."_".$file->getClientOriginalName();

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);
        // menyimpan data
        $projek->id_siswa = $request->id_siswa;
        $projek->nama_project = $request->nama_project;
        $projek->tanggal = $request->tanggal;
        $projek->deskripsi = $request->deskripsi;
        $projek->foto  = $nama_file;
        $projek->update();
        return redirect('/masterproject');
      }else {
        $projek = Project_::find($id);
        $projek->id_siswa = $request->id_siswa;
        $projek->nama_project = $request->nama_project;
        $projek->tanggal = $request->tanggal;
        $projek->deskripsi = $request->deskripsi;
        $projek->save();
        return redirect('/masterproject');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Project_::find($id)->delete();
        return redirect('/masterproject')->with('succes', 'Data berhasil');

    }

    public function buat($id){
        $siswa = Siswa::find($id);
        return view('createProject',compact('siswa'));
    }

    public function make(Request $request){
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
          
        ] ;

        $this->validate($request,[
        'id_siswa' => 'required|numeric',
        'nama_project' => 'required|min:5|max:50',
        'tanggal' => 'required',
        'deskripsi' => 'required|min:5',
        'foto' => 'required|mimes:jpg,jpeg,giv,svg,cr2',

      ],$message);
       //ambil informasi file yang diupload
    $file = $request->file('foto');

    //rename + ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

    // proses upload
    $tujuan_upload = './template/img';
    $file->move($tujuan_upload,$nama_file);

    // proses penyimpanan ke database
    Project_::create([
        'id_siswa' => $request->id_siswa,
        'nama_project' => $request->nama_project,
        'tanggal' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        'foto' => $nama_file,
    ]);
        return redirect('masterproject');
    }
}
