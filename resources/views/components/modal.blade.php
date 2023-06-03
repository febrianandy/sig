<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>            </div>
            <div class="modal-body">
                <form action="/dashboard-input-barang" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="barang-name">Nama Barang:</label>
                      <input type="text" class="form-control" id="barang-name" name="nama_barang"
                        value="{{ old('nama_barang') }}" placeholder="Enter the name of the item">
                      @error('nama_barang')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="category">Kode barang:</label>
                      <input type="text" class="form-control" id="barang-name" name="nama_barang"
                        value="{{ old('nama_barang') }}" placeholder="Enter the name of the item">
                      @error('kode_barang')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="barang-deskripsi">Deskripsi:</label>
                      <input type="text" class="form-control" id="barang-price" min="0" name="deskripsi"
                        value="{{ old('deskripsi') }}" placeholder="Enter the price of the item">
                      @error('deskripsi')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="barang-price">Price:</label>
                      <input type="number" class="form-control" id="barang-price" min="0" name="harga"
                        value="{{ old('harga') }}" placeholder="Enter the price of the item">
                      @error('harga')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="barang-deskripsi">Kategori:</label>
                      <input type="text" class="form-control" id="barang-price" min="0" name="deskripsi"
                        value="{{ old('deskripsi') }}" placeholder="Enter the price of the item">
                      @error('deskripsi')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="barang-deskripsi">Satuan:</label>
                      <input type="text" class="form-control" id="barang-price" min="0" name="deskripsi"
                        value="{{ old('deskripsi') }}" placeholder="Enter the price of the item">
                      @error('deskripsi')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="barang-quantity">Stok:</label>
                      <input type="number" class="form-control" id="barang_quantity_pack" name="quantity_pack" min="0"
                        value="{{ old('quantity_pack') }}" placeholder="Enter the quantity of the item">
                      @error('quantity_pack')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="penerimaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>            </div>
          <div class="modal-body">
              <form action="/dashboard-input-barang" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="barang-name">Nama Barang:</label>
                    <input type="text" class="form-control" id="barang-name" name="nama_barang"
                      value="{{ old('nama_barang') }}" placeholder="Enter the name of the item">
                    @error('nama_barang')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="category">Kode barang:</label>
                    <input type="text" class="form-control" id="barang-name" name="nama_barang"
                      value="{{ old('nama_barang') }}" placeholder="Enter the name of the item">
                    @error('kode_barang')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="barang-deskripsi">Deskripsi:</label>
                    <input type="text" class="form-control" id="barang-price" min="0" name="deskripsi"
                      value="{{ old('deskripsi') }}" placeholder="Enter the price of the item">
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="barang-price">Price:</label>
                    <input type="number" class="form-control" id="barang-price" min="0" name="harga"
                      value="{{ old('harga') }}" placeholder="Enter the price of the item">
                    @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save</button>
          </div>
      </div>
  </div>
</div>

