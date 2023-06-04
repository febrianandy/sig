@include('partials.header')
<x-modal />
<div class="wrapper">

  @include('components.sidebar')

  <div class="main-panel">

    @include('components.topbar')

    <div class="content">
      <div class="container-fluid">
        <div class="row card" style="margin-top: 20px;padding:20px;">
          <div class="col-lg-5">
            <h4>From Peneriman Barang</h4>
            @if (session('penerimaanBarang'))
            <div class="alert alert-success">
              {{ session('penerimaanBarang') }}
            </div>
            @endif
            <form action="/dashboard-penerimaan-barang" method="POST">
              @csrf
              <div class="form-group">
                <label for="barang-name">Nama Barang:</label>
                <select class="form-control" name="barang_id" id="">
                  @foreach($barang as $b)
                  <option value="{{ $b->id}}">{{ $b->nama_barang}}</option>
                  @endforeach
                </select>
                @error('barang_id')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-name">Kode Barang:</label>
                <select class="form-control" name="kode_barang" id="">
                  @foreach($barang as $b)
                  <option value="{{ $b->kode_barang}}">{{ $b->kode_barang}}</option>
                  @endforeach
                </select>
                @error('barang_id')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="category">No Penerimaan:</label>
                <input type="text" class="form-control" id="barang-name" name="no_penerimaan"
                  value="{{ old('no_penerimaan') }}" placeholder="Enter the name of the item">
                @error('no_penerimaan')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-deskripsi">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal_penerimaan" value="{{ old('deskripsi') }}"
                  placeholder="Enter the price of the item">
                @error('tanggal_penerimaan')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="barang-price">Jumlah:</label>
                <input type="number" class="form-control" name="jumlah"
                  value="{{ old('jumlah') }}" placeholder="Enter the price of the item">
                @error('jumlah')
                <small id="passwordHelp" class="text-danger">
                  {{ $message }}
                </small>
                @enderror
              </div>
              <button class="btn btn-primary">Tambah Penerimaan</button>
            </form>

          </div>
          <div class="col-lg-7 table-barang">
            <h4>Daftar Peneriman Barang</h4>
            {{-- <button type="button" class="btn btn-primary" style="margin-bottom: 20px;" data-toggle="modal"
              data-target="#penerimaan">Tambah Penerimaan</button> --}}
            <table id="example" class="table table-striped table-bordered " style="width:100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama barang</th>
                  <th>No Penerimaan</th>
                  <th>Tanggal Penerimaan</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                @php
                $counter = 1;
                @endphp
                @foreach($penerimaan as $p)
                <tr>
                  <td>{{ $counter }}</td>
                  <td>{{ $p->nama_barang }}</td>
                  <td>{{ $p->no_penerimaan }}</td>
                  <td>{{ $p->tanggal_penerimaan }}</td>
                  <td>{{ $p->jumlah }}</td>
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach
              </tbody>
              <tfoot>
                <th>No</th>
                <th>Nama barang</th>
                <th>No Pengeluaran</th>
                <th>Tanggal Pengeluaran</th>
                <th>Jumlah</th>
                </tr>
              </tfoot>
            </table>
         
          </div>
        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')