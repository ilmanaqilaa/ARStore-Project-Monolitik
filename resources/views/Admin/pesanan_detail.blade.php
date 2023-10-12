<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include("template.head")
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
@include("template.navbar")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include("template.sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pesanan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
              <li class="breadcrumb-item active">Detail Pesanan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="card card-info card-outline">
          <div class="card-header">
            <div class="card-tools">
                <a href="{{ url('update_pesanan', $pesanan->id ) }}" class="btn btn-success">Konfirmasi Pesanan</a>
            </div>
          </div>
            <div class="card-body">
              
              <table class="table" style="border-top : hidden">
                <tr>
                    <td>Nama Pemesan</td>
                    <td>:</td>
                    <td>
                        {{ $pesanan->user->name }}
                    </td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td>
                        {{ $pesanan->user->email }}
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pesanan</td>
                    <td>:</td>
                    <td>
                      {{ date('d-m-Y', strtotime($pesanan->created_at)) }}
                    </td>
                </tr>
                <tr>
                    <td>Bukti Pembayaran</td>
                    <td>:</td>
                    <td>
                      <img class="img-product" src="{{ url('storage/bkttransaksi') }}/{{ $pesanan->bkt_transaksi }}" alt="">                      
                    </td>
                </tr>
              </table>
            </div>

        </div>

        <div class="card card-info card-outline">
          <div class="card-body">
          <h3>Produk yang dipesan:</h3>
            
          <table class="table table-bordered">
            @php
                $no = 1;
            @endphp
            
            <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Nama Produk</th>
                <th>Ekstensi</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
            </tr>

            {{-- Pemnaggilan data dengan menggunakan perulangan --}}
            @foreach ($detailpesanan as $dtlpesanan)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dtlpesanan->product->liga->nama}}</td>
                <td>{{ $dtlpesanan->product->nama }}</td>
                <td>
                    @php
                        if ( $dtlpesanan->ekstension == NULL ) {
                          echo '-';
                        } else {
                          echo"$dtlpesanan->ekstension";
                        }
                    @endphp
                </td>
                <td>
                    @php
                        if ( $dtlpesanan->ukuran == NULL ) {
                          echo '-';
                        } else {
                          echo"$dtlpesanan->ukuran";
                        }
                    @endphp                
                </td>
                <td>{{ $dtlpesanan->jumlah_pesanan }}</td>
            </tr>
                
            @endforeach
        </table>

          </div>

      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
@include("template.footer")
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include("template.script")
</body>
</html>
