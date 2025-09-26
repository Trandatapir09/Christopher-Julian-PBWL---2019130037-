<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ route('welcome') }}">Database Mahasiswa</a>
      <div class="d-flex">
        <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card shadow-lg rounded-4">
      <div class="card-header bg-warning text-dark fw-bold">
        🔒 Ubah Password
      </div>
      <div class="card-body">

        @if(session('error'))
          <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.password.update') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Password Lama</label>
            <input type="password" name="old_password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password" name="new_password" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Konfirmasi Password Baru</label>
            <input type="password" name="new_password_confirmation" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-warning">💾 Simpan Perubahan</button>
          <a href="{{ route('welcome') }}" class="btn btn-secondary">⬅️ Kembali</a>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
