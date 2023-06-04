@include('partials.header')

<div class="wrapper">

  @include('components.sidebar')

  <div class="main-panel">

    @include('components.topbar')

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Admin</a></li>
              <li class="active">{{ $title }}</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Tambah Data Pelanggan</div>
              <div class="panel-body">
                @if (session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
                @endif
                <form method="POST" action="/dashboard-users-tambah">
                  @csrf
                  <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                  </div>

                  <div class="form-group">
                    <label for="no_telfon">No. Telepon:</label>
                    <input type="text" name="no_telfon" id="no_telfon" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')