
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
              <h1 class="m-0">Daftar Kategori</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                <li class="breadcrumb-item active">Daftar Kategori</li>
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
                      <a href="create_kategori" class="btn btn-success">Tambah Kategori <i class="fas fa-plus-square"></i> </a>
                  </div>
              </div>

              <div class="card-body">
                  <table class="table table-bordered">
                      @php
                          $no = 1;
                      @endphp
                      
                      <tr>
                          <th>No.</th>
                          <th>Nama Kategori</th>
                          <th style="width: 40%">Gambar</th>
                          <th>Aksi</th>
                      </tr>

                      {{-- Pemnaggilan data dengan menggunakan perulangan --}}
                      @foreach ($dtkategori as $kategori)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{ $kategori->nama }}</td>
                          <td>
                            <img class="img-kategori" src="{{ url('assets/g_kategori') }}/{{ $kategori->gambar }}" alt="">
                            {{-- <a href="{{ asset('img/'. $kategori->gambar) }}"></a> --}}

                          </td>
                          <td>
                              <a href="{{ url('edit_kategori', $kategori->id) }}"><i class="fas fa-edit"></i></a> | 
                              <a href="{{ url('delete_kategori',$kategori->id) }}"><i class="fas fa-trash-alt" style="color: red"></i></a>
                          </td>
                      </tr>
                          
                      @endforeach
                  </table>
              </div>
              <div class="card-footer">
                  {{ $dtkategori->links() }}
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
