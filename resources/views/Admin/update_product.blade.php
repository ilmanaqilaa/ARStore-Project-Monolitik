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
              <li class="breadcrumb-item"><a href="{{ route('product_index') }}">Daftar Product</a></li>
              <li class="breadcrumb-item active">Edit Data Product</li>
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
              
              <form action="{{ route('update_product', $update->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">  
                  <input value="{{ $update->nama }}" required type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Nama Produk">
                </div>
                <div class="form-group">  
                  <input value="{{ $update->gambar }}" required  type="file" id="gambar" name="gambar" class="form-control" placeholder="Gambar">
                </div>
                <div class="form-group">
                  
                  <select id="kategori" class="form-control" name="kategori" required>
                    {{-- perulangan untuk memanggil data kategori --}}
                    <option value="{{ $update->liga_id}}" selected hidden>{{ $update->liga->nama }}</option>
                    @foreach ($dtkategori as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach  
                  </select>
                </div>
                <div class="form-group">  
                  <input value="{{ $update->jenis }}" required type="text" id="jenis" name="jenis" class="form-control" placeholder="Deskripsi">
                </div>
                <div class="form-group">  
                  <input value="{{ $update->harga }}" required  type="number" min="1" id="harga" name="harga" class="form-control" placeholder="Harga">
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
