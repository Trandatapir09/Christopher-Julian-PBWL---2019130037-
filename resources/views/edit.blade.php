<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">Sistem Mahasiswa</a>
      <div class="d-flex">
        <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card shadow-lg rounded-4">
      <div class="card-header bg-warning text-dark fw-bold">
        ✏️ Edit Data Mahasiswa
      </div>
      <div class="card-body">

        <!-- Form Update -->
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Jurusan</label>
            <select name="jurusan" class="form-select">
              <option value="Informatika" {{ $mahasiswa->jurusan == 'Informatika' ? 'selected' : '' }}>Informatika</option>
              <option value="Sistem Informasi" {{ $mahasiswa->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Umur</label>
            <input type="number" name="umur" value="{{ $mahasiswa->umur }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" value="{{ $mahasiswa->alamat }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">No. Telp</label>
            <input type="text" name="notelp" value="{{ $mahasiswa->notelp }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
              <option value="aktif" {{ $mahasiswa->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
              <option value="tidak aktif" {{ $mahasiswa->status == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label><br>
            @if ($mahasiswa->foto)
              <img src="{{ asset('storage/'.$mahasiswa->foto) }}" width="100" class="mb-2">
            @endif
            <input type="file" name="foto" class="form-control">
          </div>

          <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
          <a href="{{ route('welcome') }}" class="btn btn-secondary">⬅️ Kembali</a>
        </form>

        <hr>

        <!-- Form Delete -->
        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-lg">🗑️ Hapus</button>
        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
