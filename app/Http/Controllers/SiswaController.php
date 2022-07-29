<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('siswa.index',compact('data'));
    }

    public function search(Request $request) 
    {
        $data = Siswa::where('nama', 'Like' , '%' . $request->search .'%')
                        ->orWhere('nis','Like' , '%' . $request->search .'%')
                        ->orWhere('kelas','Like' , '%' . $request->search .'%')
                        ->orWhere('jurusan','Like' , '%' . $request->search .'%')
                        ->get();

        return view('siswa.index',compact('data'));
    }

    public function sortir(Request $request) {
        $data = Siswa::orderBy($request->filter,$request->sortir)->get();

        return view('siswa.index',compact('data'));
    }

    public function filter(Request $request) {
        $data = Siswa::where('kelas', $request->filter_siswa)->get();

        return view('siswa.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'nis' => 'required',
            'kelas'=> 'required',
            'jurusan'=> 'required'

        ]);

        $data = new Siswa();
        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->save();

        Alert::success('Sukses!','Berhasil Menambah Siswa');
        return redirect()->back();
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
        //
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
        $data = Siswa::where('id','=',$id)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas'=> 'required',
            'jurusan'=> 'required'
        ]);

        $data->nama = $request->nama;
        $data->nis = $request->nis;
        $data->kelas = $request->kelas;
        $data->jurusan = $request->jurusan;
        $data->update();

        Alert::success('Sukses!','Berhasil Merubah Siswa');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::find($id);
        $data->delete();

        Alert::success('Sukses!','Berhasil Menghapus Siswa');
        return redirect()->back();
    }
}
