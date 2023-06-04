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
        <a href="/dashboard-users-tambah" class="btn btn-primary">Tambah</a>
        <div class="row" style="margin-top: 20px;">

          <div class="col-lg-12 table-barang">
         
            <table id="example" class="table table-striped table-bordered " style="width:100%; margin-top:30px;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>No. Telepon</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                $counter = 1;
                @endphp
                @foreach($pelanggan as $item)
                <tr>
                  <td>{{ $counter }}</td>
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->no_telfon }}</td>
                  <td>{{ $item->email }}</td>
                  <td style="display:flex; justify-content: center; gap: 5px">
                    <a href="/dashboard-user-edit/{{ $item->id }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="/dashboard-user-delete/{{ $item->id }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                  </td>
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')