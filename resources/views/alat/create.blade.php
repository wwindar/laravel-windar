<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Alat Medis Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('alat.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Pembuatan/Pengadaan</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi/Ruangan</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>