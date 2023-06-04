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
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="/dashboard-user-edit/{{ $pelanggan->id }}">
              @csrf
              @method('PUT')
              <div class="form-group">
                  <label for="nama">Nama:</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="{{ $pelanggan->nama }}" required>
              </div>

              <div class="form-group">
                  <label for="alamat">Alamat:</label>
                  <textarea name="alamat" id="alamat" class="form-control" required>{{ $pelanggan->alamat }}</textarea>
              </div>

              <div class="form-group">
                  <label for="no_telfon">No. Telepon:</label>
                  <input type="text" name="no_telfon" id="no_telfon" class="form-control" value="{{ $pelanggan->no_telfon }}" required>
              </div>

              <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ $pelanggan->email }}" required>
              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')