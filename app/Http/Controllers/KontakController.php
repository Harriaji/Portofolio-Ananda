<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kontak;
use App\Models\Kontak_;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $data = Kontak_::all();
        $siswa = Siswa::all();
        return view('admin.mastercontact', compact('data','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createKontak');
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
        'id_siswa' => 'required|numeric',
        'id_jenis' => 'required|numeric',
        'desc_kontak' => 'required|min:5|max:50',

      ],$message);
    //    //ambil informasi file yang diupload
    // $file = $request->file('foto');

    // //rename + ambil nama file
    // $nama_file = time()."_".$file->getClientOriginalName();

    // // proses upload
    // $tujuan_upload = './template/img';
    // $file->move($tujuan_upload,$nama_file);

    // proses penyimpanan ke database
    Kontak_::create([
        'id_siswa' => $request->id_siswa,
        'id_jenis' => $request->id_jenis,
        'desc_kontak' => $request->desc_kontak,
       
    ]);
        return redirect('/mastercontact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->kontak()->get();
        return view('showKontak',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kontak_::find($id);
        $jenis_kontak = Jenis_kontak::all();
        return view('editKontak', compact('data','jenis_kontak'));
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
            'id_siswa' => 'required|numeric',
            'id_jenis' => 'required',
            'desc_kontak' => 'required|min:5|max:50',
    

      ],$message);

      $kontak = Kontak_::find($id);
      $kontak->id_siswa = $request->id_siswa;
      $kontak->id_jenis = $request->id_jenis;
      $kontak->desc_kontak = $request->desc_kontak;
      $kontak->save();
      return redirect('/mastercontact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kontak_::find($id)->delete();
        return redirect('/mastercontact')->with('succes', 'Data berhasil Dihapus');
    }

    public function buatKontak($id){
        $siswa = Siswa::find($id);
        $jenis_kontak = Jenis_kontak::all();
        return view('createKontak',compact('siswa','jenis_kontak'));
    }
    // public function editKontak($id){
    //     $siswa = Siswa::find($id);
    //     $jenis_kontak = jenis_kontak::all();
    //     return view('editKontak',compact('siswa','jenis_kontak'));
    // }

    public function makeKontak(Request $request){
        $message = [
            'required' => ':attribute harus diisi dulu',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attibute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka',
           
          
        ] ;

        $this->validate($request,[
        'id_siswa' => 'required|numeric',
        'id_jenis' => 'required|numeric',
        'desc_kontak' => 'required|min:5|max:50',

      ],$message);
    //    //ambil informasi file yang diupload
    // $file = $request->file('foto');

    // //rename + ambil nama file
    // $nama_file = time()."_".$file->getClientOriginalName();

    // // proses upload
    // $tujuan_upload = './template/img';
    // $file->move($tujuan_upload,$nama_file);

    // proses penyimpanan ke database
    Kontak_::create([
        'id_siswa' => $request->id_siswa,
        'id_jenis' => $request->id_jenis,
        'desc_kontak' => $request->desc_kontak,
       
    ]);
        return redirect('/mastercontact');
    }

    // public function jnsKontak($id){
    //     $siswa = Siswa::find($id);
    //     $jenis_kontak = jenis_kontak::all();
    //     return view('jnsKontak',compact('siswa','jenis_kontak'));
    // }
}
