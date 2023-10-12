<?php

namespace App\Http\Livewire;

use App\Pesanan;
use App\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Checkout extends Component
{
    use WithFileUploads;

    public $total_harga, $nohp, $alamat, $email , $bkt_transaksi;

    public function mount()
    {
        if(!Auth::user()) {
            return redirect()->route('login');
        }

        $this->email = Auth::user()->email;
        $this->nohp = Auth::user()->nohp;
        $this->alamat = Auth::user()->alamat;
        $this->bkt_transaksi = Auth::user()->bkt_transaksi;

        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($pesanan))
        {
            $this->total_harga = $pesanan->total_harga+$pesanan->kode_unik;
        }else {
            return redirect()->route('home');
        }
    }

    public function checkout()
    {
        
        $this->validate([
            'email' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'bkt_transaksi' => 'required',
        ]);

        //Simpan nohp Alamat ke data user
        $user = User::where('id', Auth::user()->id)->first();
        $user->email = $this->email;
        $user->nohp = $this->nohp;
        $user->alamat = $this->alamat;
        $user->update();

        // Kebutuhan pinput gambar
        $nm = $this->bkt_transaksi;
        // ambil nama berdasarkan jam di upload dan random generate, lalu ambil ekstensinya
        $getname = time().rand(10,99).".".$nm->getClientOriginalExtension();

        //update data pesanan
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->status = 1;
        $pesanan -> bkt_transaksi  = $getname;
        
        $nm->storePubliclyAs('bkttransaksi', "$getname", 'public');
        
        $pesanan->update();
        $this->emit('masukKeranjang');

        session()->flash('message', "Sukses Checkout");

        return redirect()->route('history');
    }

    public function render()
    {
        $dt = User::all();
        return view('livewire.checkout', compact('dt'));
    }
}
