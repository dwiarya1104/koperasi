<?php

namespace App\Http\Controllers;

use App\Models\Seragam;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $data = Seragam::all();

        return response()->json([
            'data' => $data,
            'message' => 'Berhasil Mengambil Data'
        ], 200);
    }

    public function store(Request $request)
    {
        $data = Seragam::create([
            'nama_barang' => $request->nama_barang,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga
        ]);

        if ($request) {
            return response()->json([
                'data' => $data,
                'message' => 'Berhasil Menambah Seragam'
            ], 200);
        }
        return response()->json([
            'message' => 'Gagal Menambah Seragam'
        ], 400);
    }



    public function update(Request $request, $id)
    {
        $data = Seragam::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga
        ]);


        return response()->json([
            'data' => $request->all(),
            'message' => 'berhasil update'
        ], 200);
    }

    public function destroy($id)
    {
        Seragam::find($id)->delete();

        return response()->json([
            'message' => 'Berhasil Menghapus Seragam'
        ]);
    }
}
