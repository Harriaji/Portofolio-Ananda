<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use File;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
       return view('admin.mastersiswa' , compact('data') );        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createSiswa' );        
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
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
            'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
            'size' => 'file yang diupload maksimal :size',

        ] ;

        $this->validate($request,[
        'nama' => 'required|min:4|max:30',
        'nisn' => 'required|numeric',
        'jk' => 'required',
        'email' => 'required|',
        'alamat' => 'required|min:5',
        'about' => 'required',
        'foto' => 'required|mimes:jpg,jpeg,giv,svg,cr2'

      ],$message);     

      //ambil informasi file yang diupload
    $file = $request->file('foto');

      //rename + ambil nama file
    $nama_file = time()."_".$file->getClientOriginalName();

      // proses upload
    $tujuan_upload = './template/img';
    $file->move($tujuan_upload,$nama_file);

      // proses insert database
      Siswa::create([
        'nama' => $request->nama,
        'nisn' => $request->nisn,
        'jk' => $request->jk,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'about' => $request->about,
        'foto' => $nama_file
      ]);
        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = Siswa::find($id);
      return view('showSiswa' , compact('data') );   

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = Siswa::find($id);
        return view('editSiswa' , compact('data') );   
        
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
        'max' => ':attribute maksimal :max karakter',
        'numeric' => ':attribute harus berupa angka',
        'mimes' => 'file yang didukung yaitu jpg,jpeg,giv,svg,cr2',
        'size' => 'file yang diupload maksimal :size',

    ] ;

    $this->validate($request,[
    'nama' => 'required|min:4|max:30',
    'nisn' => 'required|numeric',
    'jk' => 'required',
    'email' => 'required|',
    'alamat' => 'required|min:5',
    'about' => 'required|min:50',
    'foto' => 'mimes:jpg,jpeg,giv,svg,cr2'

  ],$message);     

       
        if ($request->foto != ''){
          // dengan ganti foto
          // perintah hapus file foto yang lama
          $siswa = Siswa::find($id);
          file::delete('/template/img'.$siswa->foto);

          //ambil informasi file yang diupload
         $file = $request->file('foto');

        //rename + ambil nama file
         $nama_file = time()."_".$file->getClientOriginalName();

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);
        // menyimpan data
        $siswa->nama = $request->nama;
        $siswa->nisn = $request->nisn;
        $siswa->jk = $request->jk;
        $siswa->email = $request->email;
        $siswa->alamat = $request->alamat;
        $siswa->about = $request->about;
        $siswa->foto  = $nama_file;
        $siswa->update();
        return redirect('/mastersiswa');
        } else {
           // tanpa ganti foto
          $siswa=Siswa::find($id);
          $siswa->nama = $request->nama;
          $siswa->nisn = $request->nisn;
          $siswa->jk = $request->jk;
          $siswa->email = $request->email;
          $siswa->alamat = $request->alamat;
          $siswa->about = $request->about;
          $siswa->save();
          return redirect('/mastersiswa');
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
      $data = Siswa::find($id)->delete();
      return redirect('/mastersiswa')->with('succes', 'Data berhasil dihapus');
    }

    public function hapus($id){
      $data = Siswa::find($id)->delete();
      return redirect('/mastersiswa');
    }
}
