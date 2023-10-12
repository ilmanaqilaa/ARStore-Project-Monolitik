<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pesanan;
use App\User;
use App\PesananDetail;
use App\Product;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtpesanan = Pesanan::paginate(10);
        return view('Admin.pesanan', compact('dtpesanan'));
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
        //
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
                $pesanan = Pesanan::findorfail($id);
                // Tes apakah sudah memanggil sesuai ID
                // dd($id);

                $detailpesanan = PesananDetail::where('pesanan_id', $id)->get();

                return view('Admin.pesanan_detail', compact('pesanan', 'detailpesanan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $pesanan = Pesanan::where('status', 1)->first();
        $pesanan->status = 2;

        $pesanan->update();

        return redirect('pesanan')->with('toast_success', 'Berhasil di konfirmasi!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
