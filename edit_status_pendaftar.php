<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Status Pendaftaran</h2>

        <form action="update_status.php" method="POST" class="p-4 shadow rounded bg-light">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pendaftar:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="[Nama Pendaftar]" readonly>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Pendaftaran:</label>
                <select id="status" name="status" class="form-select" required>
                    <option value="Pending">Pending</option>
                    <option value="Lolos">Lolos</option>
                    <option value="Tidak Lolos">Tidak Lolos</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
            <a href="data_pendaftar.html" class="btn btn-secondary w-100 mt-2">Kembali ke Data Pendaftar</a>
        </form>
    </div>
</body>
</html>
