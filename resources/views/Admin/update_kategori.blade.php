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
            <h1 class="m-0">Edit Data Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('kategori_index') }}">Daftar Kategori</a></li>
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
            <div class="card-body">
              
              <form action="{{ route('update_kategori', $update->id) }}" method="POST" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                <div class="form-group">  
                  <input value="{{ $update->nama }}" required type="text" id="nama_produk" name="nama" class="form-control" placeholder="Nama Produk">
                </div>
                <div>
                  <h5>Gambar Pertama:</h5>
                  <img src="{{ url('assets/g_kategori') }}/{{ $update->gambar }}" alt="" style="width: 30%">
                </div>
                <br>
                <div class="form-group">  
                  <input value="{{ $update->gambar }}" required  type="file" id="gambar" name="gambar" class="form-control" placeholder="Gambar">
                </div>
                <div class="form-group"> 
                  <button type="submit" class="btn btn-success">Simpan Data</button> 
                </div>
              </form>

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
