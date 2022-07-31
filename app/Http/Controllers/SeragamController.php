<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SeragamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Seragam::get();

        $seragam = (object)[
            "sortBy" => "created_at",
            "sortType" => "asc",
            "search" => "",
            "ukuran" => "All",
            "nama_barang" => "All"
        ];
        return view('seragam.index', compact('data', 'seragam'));
    }

    public function operation(Request $request)
    {
        $sortBy = $request->sortBy ? $request->sortBy : "asc";
        $sortType = $request->sortType ? $request->sortType : "created_at";
        $search = $request->search ? $request->search : "";
        $ukuran = $request->ukuran ? $request->ukuran : "All";
        $nama_barang = $request->nama_barang ? $request->nama_barang : "All";

        $seragam = (object)[
            "sortBy" => $sortBy,
            "sortType" => $sortType,
            "search" => $search,
            "ukuran" => $ukuran,
            "nama_barang" => $nama_barang
        ];

        if ($nama_barang === "All" && $ukuran === "All") {
            $filter = Seragam::where('ukuran', 'like', '%' . $search . '%')
                ->orWhere('nama_barang', 'like', '%' . $search . '%')
                ->orWhere('harga', 'like', '%' . $search . '%')
                ->orderBy($sortBy, $sortType)
                ->get();
        } else if ($nama_barang === "All" || $ukuran !== "All") {
            $filter = Seragam::where('ukuran', $ukuran)
                ->orderBy($sortBy, $sortType)
                ->get();
        } else if ($nama_barang !== "All" || $ukuran === "All") {
            $filter = Seragam::where('nama_barang', $nama_barang)
                ->orderBy($sortBy, $sortType)
                ->get();
        } else {
            $filter = Seragam::where('nama_barang', $nama_barang)
                ->where('ukuran', $ukuran)
                ->orderBy($sortBy, $sortType)
                ->get();
        }

        foreach ($filter as $key => $fil) {
            if (!str_contains($fil->nama_barang, $search) && !str_contains($fil->ukuran, $search) && !str_contains($fil->harga, $search)) {
                unset($filter[$key]);
            }
        }

        $data = $filter->values();

        // dd($data, $seragam);

        return view('seragam.index', compact('seragam', 'data'));
    }

    public function search(Request $request)
    {
        $data = Seragam::where('nama_barang', 'Like', '%' . $request->search . '%')
            ->orWhere('harga', 'Like', '%' . $request->search . '%')
            ->orWhere('ukuran', 'Like', '%' . $request->search . '%')
            ->get();

        return view('seragam.index', compact('data'));
    }

    public function sortir(Request $request)
    {
        $data = Seragam::orderBy($request->filter, $request->sortir)->get();

        return view('seragam.index', compact('data'));
    }

    public function filter(Request $request)
    {
        $data = Seragam::where('ukuran', $request->filter_seragam)->get();

        return view('seragam.index', compact('data'));
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
        $this->validate($request, [
            'nama_barang' => 'required',
            'harga' => 'required',
            'ukuran' => 'required'
        ]);

        $data = new Seragam();
        $data->nama_barang = $request->nama_barang;
        $data->harga = $request->harga;
        $data->ukuran = $request->ukuran;
        $data->save();

        Alert::success('Sukses!', 'Berhasil Menambah Seragam');
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
        $data = Seragam::where('id', $id)->firstOrFail();

        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'ukuran' => 'required'
        ]);

        $data->nama_barang = $request->nama_barang;
        $data->harga = $request->harga;
        $data->ukuran = $request->ukuran;
        $data->update();

        Alert::success('Sukses!', 'Berhasil Merubah Seragam');
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
        $data = Seragam::find($id);
        $data->delete();

        Alert::success('Sukses!', 'Berhasil Menghapus Seragam');
        return redirect()->back();
    }
}
