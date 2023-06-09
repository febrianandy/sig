<h1>Laporan Pengeluaran barang</h1>
<p>Bulan sekian</p>
<table style="width: 100%; border-collapse: collapse;">
  <thead>
      <tr>
          <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2; font-weight: bold;">ID</th>
          <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2; font-weight: bold;">Nama Barang</th>
          <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2; font-weight: bold;">No Pengeluaran</th>
          <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2; font-weight: bold;">Tanggal</th>
          <th style="border: 1px solid #000; padding: 8px; background-color: #f2f2f2; font-weight: bold;">Jumlah</th>
          <!-- Add more table headers as needed -->
      </tr>
  </thead>
  <tbody>
      @foreach ($pengeluaranBarangs as $pengeluaranBarang)
          <tr>
              <td style="border: 1px solid #000; padding: 8px;">{{ $pengeluaranBarang->id }}</td>
              <td style="border: 1px solid #000; padding: 8px;">{{ $pengeluaranBarang->nama_barang }}</td>
              <td style="border: 1px solid #000; padding: 8px;">{{ $pengeluaranBarang->no_pengeluaran }}</td>
              <td style="border: 1px solid #000; padding: 8px;">{{ $pengeluaranBarang->tanggal_pengeluaran }}</td>
              <td style="border: 1px solid #000; padding: 8px;">{{ $pengeluaranBarang->jumlah }}</td>
              <!-- Add more table cells as needed -->
          </tr>
      @endforeach
  </tbody>
</table>
