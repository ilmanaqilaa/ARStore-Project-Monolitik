<div class="container">
    <div class="row mt-2 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products') }}" class="text-dark">List Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{ url('assets/g_produk') }}/{{ $product->gambar }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $product->nama }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format($product->harga) }}
                @if($product->is_ready == 1)
                <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stok</span>
                @else
                <span class="badge badge-danger"> <i class="fas fa-times"></i> Stok Habis</span>
                @endif
            </h4>

            <div class="row">
                <div class="col">
                    <form wire:submit.prevent="masukkanKeranjang"> 
                        <table class="table" style="border-top : hidden">
                            <tr>
                                <td>Tipe Produk</td>
                                <td>:</td>
                                <td>
                                    {{ $product->liga->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>
                                    {{ $product->jenis }}
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input id="jumlah_pesanan" type="number" min="1"
                                        class="form-control @error('jumlah_pesanan') is-invalid @enderror"
                                        wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required
                                        autocomplete="name" autofocus>

                                    @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            @if($product->liga->id == 1)
                                <tr>
                                    <td>Ekstension </td>
                                    <td>:</td>
                                    <td>

                                        <select id="ekstension" class="form-control" name="ekstension" required wire:model="ekstension">
                                            <option value="Pilih Ekstension" hidden selected>Pilih Ekstension</option>
                                            <option value=".fbx">.fbx</option>
                                            <option value=".obj">.obj</option>
                                            <option value=".blend">.blend</option>
                                        </select>

                                    </td>
                                </tr>
                            @elseif ($product->liga->id == 2)
                            <tr>
                                <td>Ukuran </td>
                                <td>:</td>
                                <td>

                                    <select id="ukuran" class="form-control" name="ukuran" required wire:model="ukuran">
                                        <option value="Pilih Ukuran" hidden selected>Pilih ukuran</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>

                                </td>
                            </tr>
                            @else
                            @endif
                            {{-- <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        wire:model="nama" value="{{ old('nama') }}"
                                        autocomplete="name" autofocus>

                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>:</td>
                                <td>
                                    <input id="nomor" type="number"
                                        class="form-control @error('nomor') is-invalid @enderror"
                                        wire:model="nomor" value="{{ old('nomor') }}"
                                        autocomplete="name" autofocus>

                                    @error('nomor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </td>
                            </tr>
                            @endif --}}
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>