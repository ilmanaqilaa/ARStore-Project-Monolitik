
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
              <h1 class="m-0">Daftar Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active">Daftar Pesanan</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
          <div class="card card-info card-outline">

              <div class="card-body">
                  <table class="table table-bordered">
                      @php
                          $no = 1;
                      @endphp
                      
                      <tr>
                          <th>No.</th>
                          <th>Nama Pelanggan</th>
                          <th>Tanggal</th>
                          <th>Total Harga</th>
                          <th>Kode</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>

                      {{-- Pemnaggilan data dengan menggunakan perulangan --}}
                      @foreach ($dtpesanan as $pesanan)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $pesanan->user->name }}</td>
                          <td>{{ date('d-m-Y', strtotime($pesanan->created_at)) }}</td>
                          <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
                          <td>{{ $pesanan->kode_unik }}</td>
                          <td>
                            @php
                                if ($pesanan->status == 1) {
                                  echo 'Belum Dibayar';
                                } else {
                                  echo 'Sudah Dibayar';
                                }
                            @endphp
                          </td>
                          <td>
                              <a href="{{ url('pesanan_detail', $pesanan->id) }}"><i class="fas fa-info"></i></button></a>
                          </td>
                      </tr>
                          
                      @endforeach
                  </table>
              </div>
              <div class="card-footer">
                  {{ $dtpesanan->links() }}
                  {{-- <h1>test</h1> --}}
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
@include('template.script')

@include('sweetalert::alert')
</body>
</html>
