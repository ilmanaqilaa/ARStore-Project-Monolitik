<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Responses;
use App\Product;
use App\Liga;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variable untuk ambil seluruh data produk dari database
        $dtproduct = Product::paginate(5);
        return view('Admin.product', compact('dtproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Variable untuk ambil seluruh data kategori
        $dtkategori = Liga::all();
        return view ('Admin.create_product', compact('dtkategori'));
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

        $dtproduct = Product::all();

        // Kebutuhan pinput gambar
        $nm = $request->gambar;
        // ambil nama berdasarkan jam di upload dan random generate, lalu ambil ekstensinya
        $getname = time().rand(100,999).".".$nm->getClientOriginalExtension();      

        $upload = new Product;
        $upload -> nama     = $request->nama_produk;
        $upload -> harga    = $request->harga;
        $upload -> jenis    = $request->jenis;
        $upload -> liga_id  = $request->kategori;
        $upload -> gambar   = $getname;

        $nm->move(public_path(). '/assets/g_produk' , $getname);
        $upload->save();

        // Cara memasukkan data dengan biasa
        // Product::create([
        //     'nama'      => $request->nama_produk,
        //     'harga'     => $request->harga,
        //     'jenis'     => $request->jenis,
        //     'liga_id'   => $request->kategori,
        //     'gambar'    => $request->gambar = $getname,
            
        // ]);
        // $nm->move(public_path().'/img'. $getname);
        
        return redirect('product')->with('toast_success', 'Data berhasil Disimpan!');
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
        $update = Product::with('liga')->findorfail($id);
        // Ambil data kategori
        $dtkategori = Liga::all();
        // Tes apakah sudah memanggil sesuai ID
        // dd($id);
        return view('Admin.update_product', compact('update', 'dtkategori'));
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
        $update = Product::findorfail($id);
        // $update->update($request->all());
        $awal   = $update->gambar;

        $dt = [
            'nama'     => $request['nama_produk'],
            'harga'    => $request['harga'],
            'jenis'    => $request['jenis'],
            'liga_id'  => $request['kategori'],
            'gambar'   => $awal,
        ];
        
        $request->gambar->move(public_path(). '/assets/g_produk' , $awal);
        $update->update($dt);

        return redirect('product')->with('toast_success', 'Data berhasil Diupdate!');
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
        $prod = Product::findorfail($id);
        // variabel untuk melakukan fungsi hapus data
        $prod->delete();
        return back()->with('info', 'Data berhasil Dihapus!');

    }
}
