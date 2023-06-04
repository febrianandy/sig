@include('partials.header')
<x-modal/>
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
          <div class="col-md-6">
            @if (session('errorEditBarang'))
            <div class="alert alert-info">
              {{ session('errorEditBarang') }}
            </div>
            @endif
            <form action="/dashboard-barang-edit/{{ $barang->id }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="barang-name">Nama Barang:</label>
                <input type="text" class="form-control" id="barang-name" name="nama_barang"
                  value="{{ $barang->nama_barang }}" placeholder="Enter the name of the item">
                @error('nama_barang')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>

                @enderror
              </div>
              <div class="form-group">
                <label for="category">Kode barang:</label>
                <input type="text" class="form-control" id="barang-name" name="kode_barang"
                  value="{{ $barang->kode_barang }}" placeholder="Enter the name of the item">
                @error('kode_barang')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>

                @enderror
              </div>
              <div class="form-group">
                <label for="barang-deskripsi">Deskripsi:</label>
                <input type="text" class="form-control" id="barang-price" name="deskripsi"
                  value="{{ $barang->deskripsi }}" placeholder="Enter the price of the item">
                @error('deskripsi')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>

                @enderror
              </div>
              <div class="form-group">
                <label for="barang-price">Harga:</label>
                <input type="number" class="form-control" id="barang-price" name="harga"
                  value="{{ $barang->harga }}" placeholder="Enter the price of the item">
                @error('harga')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>

                @enderror
              </div>
              <div class="form-group">
                <label for="barang-deskripsi">Kategori:</label>
                <input type="text" class="form-control" id="barang-price"  name="kategori"
                  value="{{ $barang->kategori }}" placeholder="Enter the price of the item">
                @error('kategori')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>

                @enderror
              </div>
              <div class="form-group">
                <label for="barang-deskripsi">Satuan:</label>
                <input type="text" class="form-control" id="barang-price" name="satuan"
                  value="{{ $barang->satuan }}" placeholder="Enter the price of the item">
                @error('satuan')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>

                @enderror
              </div>
              <div class="form-group">
                <label for="barang-quantity">Stok:</label>
                <input type="number" class="form-control" name="stock" 
                  value="{{ $barang->stock }}" placeholder="Enter the quantity of the item">
                @error('stock')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')