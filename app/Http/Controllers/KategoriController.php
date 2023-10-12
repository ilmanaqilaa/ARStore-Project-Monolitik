<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Responses;
use App\Liga;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtkategori = Liga::paginate(5);
        return view('Admin.kategori', compact('dtkategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create_kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Test apakah data yang di input masuk atau tidak
        // dd($request->all());

        $dtkategori = Liga::all();

        // Kebutuhan pinput gambar
        $nm = $request->gambar;
        // ambil nama berdasarkan jam di upload dan random generate, lalu ambil ekstensinya
        $getname = time().rand(100,999).".".$nm->getClientOriginalExtension();      

        $upload = new Liga;
        $upload -> nama     = $request->nama_kategori;
        $upload -> gambar   = $getname;

        $nm->move(public_path(). '/assets/g_kategori' , $getname);
        $upload->save();

        // Cara memasukkan data dengan biasa
        // Product::create([
        //     'nama'      => $request->nama_kategori,
        //     'harga'     => $request->harga,
        //     'jenis'     => $request->jenis,
        //     'liga_id'   => $request->kategori,
        //     'gambar'    => $request->gambar = $getname,
            
        // ]);
        // $nm->move(public_path().'/img'. $getname);
        
        return redirect('kategori')->with('toast_success', 'Data berhasil Disimpan!');
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
                // Ambil data sesuai dengan produk id
                $update = Liga::findorfail($id);
                // Tes apakah sudah memanggil sesuai ID
                // dd($id);
                return view('Admin.update_kategori', compact('update'));
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
        $update = Liga::findorfail($id);
        $awal   = $update->gambar;

        $dt     = [
            'nama' => $request['nama'],
            'gambar' => $awal,
        ];

        $request->gambar->move(public_path(). '/assets/g_kategori' , $awal);

        $update->update($dt);

        return redirect('kategori')->with('toast_success', 'Data berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                // variabel untuk mengambil data yang menyesuaikan dengan id produk
                $kategori = Liga::findorfail($id);
                // variabel untuk melakukan fungsi hapus data
                $kategori->delete();
                return back()->with('info', 'Data berhasil Dihapus!');
    }
}
