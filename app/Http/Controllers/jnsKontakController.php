<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kontak;
use App\Models\Kontak_;
use App\Models\Siswa;
use Illuminate\Http\Request;

class jnsKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jenis_kontak::all();
        $siswa = Siswa::all();
        return view('admin.mainJnsKontak', compact('data','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.jnsKontak');
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
           
          
        ] ;

        $this->validate($request,[
        
        // 'id' => 'required|numeric',
        'jns' => 'required|max:50',

      ],$message);
    //    //ambil informasi file yang diupload
    // $file = $request->file('foto');

    // //rename + ambil nama file
    // $nama_file = time()."_".$file->getClientOriginalName();

    // // proses upload
    // $tujuan_upload = './template/img';
    // $file->move($tujuan_upload,$nama_file);

    // proses penyimpanan ke database
    Jenis_kontak::create([
        // 'id' => $request->id,
        'jns' => $request->jns,
        
       
    ]);
        return redirect('/mainJnsKontak')->with('succes', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Jenis_kontak::find($id);
        return view('admin.editJnsKontak', compact('data'));
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
          
        ] ;

        $this->validate($request,[
            // 'id' => 'required|numeric',
            'jns' => 'required|max:50',
    

      ],$message);

      $jenis = Jenis_kontak::find($id);
    //   $jenis->id = $request->id;
      $jenis->jns = $request->jns;
      $jenis->update();
      return redirect('/mainJnsKontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jenis_kontak::find($id)->delete();
        return redirect('/mainJnsKontak')->with('succes', 'Data berhasil Dihapus');
    }

    // public function editJenis($id){
    //     $data = Jenis_kontak::find($id);
    //     return view('admin.editJnsKontak', compact('data'));
    // }
}
