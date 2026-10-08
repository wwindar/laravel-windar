<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris Alat Medis - SIMRS</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --bs-body-font-family: 'Plus Jakarta Sans', sans-serif;
            --brand-primary: #0284c7;
            --brand-teal: #0d9488;
            --brand-dark: #0f172a;
            --surface-bg: #f8fafc;
            --card-border: rgba(226, 232, 240, 0.85);
        }

        body {
            font-family: var(--bs-body-font-family);
            background-color: var(--surface-bg);
            color: #334155;
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(14, 165, 233, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(20, 184, 166, 0.05) 0%, transparent 40%);
            background-attachment: fixed;
        }

        /* Glass / Floating Header */
        .page-header {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Modern Card Styling */
        .custom-card {
            background: #ffffff;
            border-radius: 1.25rem !important; /* rounded-4 */
            border: 1px solid var(--card-border);
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.04), 
                        0 8px 10px -6px rgba(15, 23, 42, 0.02);
            transition: box-shadow 0.3s ease;
        }

        .custom-card:hover {
            box-shadow: 0 20px 30px -10px rgba(15, 23, 42, 0.07), 
                        0 10px 15px -3px rgba(15, 23, 42, 0.03);
        }

        /* Anti-mainstream Table Container */
        .table-responsive {
            border-radius: 1rem;
            overflow: hidden;
        }

        .custom-table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        /* Gradient Professional Table Header */
        .custom-table thead tr {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f766e 100%);
        }

        .custom-table thead th {
            color: #f8fafc;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 1.1rem 1.25rem;
            border: none;
            white-space: nowrap;
        }

        .custom-table thead th:first-child {
            border-top-left-radius: 0.85rem;
        }

        .custom-table thead th:last-child {
            border-top-right-radius: 0.85rem;
        }

        /* Table Body & Hover Effect */
        .custom-table tbody tr {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: #ffffff;
            border-bottom: 1px solid #f1f5f9;
        }

        .custom-table tbody tr:last-child {
            border-bottom: none;
        }

        .custom-table tbody tr:hover {
            background-color: #f8fafc;
            transform: translateY(-1px);
            box-shadow: inset 3px 0 0 #0284c7;
        }

        .custom-table tbody td {
            padding: 1.15rem 1.25rem;
            vertical-align: middle;
            color: #334155;
            font-size: 0.925rem;
            border-top: none;
            border-bottom: 1px solid #f1f5f9;
        }

        /* Modern Buttons */
        .btn-add-item {
            background: linear-gradient(135deg, #0284c7 0%, #0d9488 100%);
            color: #ffffff;
            border: none;
            padding: 0.65rem 1.4rem;
            font-weight: 600;
            letter-spacing: 0.01em;
            box-shadow: 0 4px 14px rgba(13, 148, 136, 0.28);
            transition: all 0.3s ease;
        }

        .btn-add-item:hover {
            color: #ffffff;
            background: linear-gradient(135deg, #0369a1 0%, #0f766e 100%);
            box-shadow: 0 6px 20px rgba(13, 148, 136, 0.42);
            transform: translateY(-2px);
        }

        .btn-action {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50rem;
            transition: all 0.2s ease;
            border: 1px solid #e2e8f0;
            background: #ffffff;
        }

        .btn-action-edit {
            color: #2563eb;
        }

        .btn-action-edit:hover {
            background: #eff6ff;
            border-color: #bfdbfe;
            color: #1d4ed8;
            transform: scale(1.08);
        }

        .btn-action-delete {
            color: #e11d48;
        }

        .btn-action-delete:hover {
            background: #fff1f2;
            border-color: #fecdd3;
            color: #be123c;
            transform: scale(1.08);
        }

        /* Badges */
        .badge-brand {
            background-color: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
        }

        .badge-year {
            background-color: #f8fafc;
            color: #475569;
            border: 1px solid #e2e8f0;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
        }

        .badge-location {
            background-color: #f0f9ff;
            color: #0369a1;
            border: 1px solid #bae6fd;
            font-weight: 600;
            padding: 0.4rem 0.75rem;
            border-radius: 0.5rem;
        }

        /* Search input pill */
        .search-pill {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 50rem;
            padding: 0.55rem 1.25rem 0.55rem 2.5rem;
            font-size: 0.88rem;
            transition: all 0.25s ease;
        }

        .search-pill:focus {
            outline: none;
            border-color: #0284c7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }

        .search-icon-wrapper {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        /* Success Alert */
        .custom-alert {
            background: #ffffff;
            border-left: 4px solid #10b981;
            border-radius: 0.875rem;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.08);
        }
    </style>
</head>
<body>

    <!-- Top Navigation Bar -->
    <header class="page-header py-3 mb-4">
        <div class="container-xl d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-3 d-flex align-items-center justify-content-center text-white" 
                     style="width: 40px; height: 40px; background: linear-gradient(135deg, #0284c7, #0d9488);">
                    <i class="bi bi-heart-pulse-fill fs-5"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold text-dark">SIMRS Medika</h6>
                    <small class="text-muted" style="font-size: 0.75rem;">Sistem Manajemen Alat Medis</small>
                </div>
            </div>

            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2 fw-medium">
                    <i class="bi bi-shield-check me-1 text-success"></i> Server Online
                </span>
            </div>
        </div>
    </header>

    <main class="container-xl pb-5">

        <!-- Flash Alert -->
        @if(session('success'))
            <div class="alert custom-alert alert-dismissible fade show d-flex align-items-center p-3 mb-4" role="alert">
                <div class="rounded-circle bg-success-subtle text-success p-2 me-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                    <i class="bi bi-check-lg fs-5"></i>
                </div>
                <div class="flex-grow-1">
                    <strong class="text-dark">Berhasil!</strong>
                    <div class="text-secondary small">{{ session('success') }}</div>
                </div>
                <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Header Action Card -->
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <h3 class="fw-bold mb-0 text-dark">Daftar Inventaris Alat Medis</h3>
                    <span class="badge bg-primary-subtle text-primary rounded-pill px-2.5 py-1 fw-bold fs-7">
                        {{ $alats->count() }} Item
                    </span>
                </div>
                <p class="text-muted mb-0 small">
                    Kelola data spesifikasi, lokasi penempatan, dan status operasional perangkat medis rumah sakit.
                </p>
            </div>

            <div class="d-flex align-items-center gap-3">
                <!-- Live Search Box -->
                <div class="position-relative d-none d-sm-block" style="min-width: 240px;">
                    <i class="bi bi-search search-icon-wrapper"></i>
                    <input type="text" id="searchInput" class="form-control search-pill" placeholder="Cari nama, merek, lokasi...">
                </div>

                <!-- Tambah Alat Button (Rounded-pill with Bootstrap Icon) -->
                <a href="{{ route('alat.create') }}" class="btn btn-add-item rounded-pill d-inline-flex align-items-center gap-2 text-decoration-none">
                    <i class="bi bi-plus-circle-fill fs-6"></i>
                    <span>Tambah Alat</span>
                </a>
            </div>
        </div>

        <!-- Main Card Wrapper -->
        <div class="card custom-card rounded-4 p-3 p-md-4">
            
            <div class="table-responsive">
                <table class="table custom-table" id="alatTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style="width: 60px;">No</th>
                            <th scope="col">Nama Alat Medis</th>
                            <th scope="col">Merek / Pabrikan</th>
                            <th scope="col">Tahun Pengadaan</th>
                            <th scope="col">Lokasi / Ruangan</th>
                            <th scope="col" class="text-center" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alats as $index => $item)
                            <tr class="table-row-item">
                                <!-- No -->
                                <td class="text-center">
                                    <span class="fw-bold text-muted small" style="font-size: 0.82rem;">
                                        #{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>

                                <!-- Nama Alat -->
                                <td>
                                    <div class="d-flex align-items-center gap-2.5">
                                        <div class="rounded-3 bg-light text-primary d-flex align-items-center justify-content-center p-2" 
                                             style="width: 38px; height: 38px;">
                                            <i class="bi bi-hospital fs-6"></i>
                                        </div>
                                        <div>
                                            <span class="fw-bold text-dark d-block search-target-name">{{ $item->nama_alat }}</span>
                                            <small class="text-muted" style="font-size: 0.75rem;">ID: ALK-{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</small>
                                        </div>
                                    </div>
                                </td>

                                <!-- Merek -->
                                <td>
                                    <span class="badge-brand d-inline-flex align-items-center gap-1.5 search-target-brand">
                                        <i class="bi bi-tag-fill" style="font-size: 0.75rem;"></i>
                                        {{ $item->merek }}
                                    </span>
                                </td>

                                <!-- Tahun -->
                                <td>
                                    <span class="badge-year d-inline-flex align-items-center gap-1.5">
                                        <i class="bi bi-calendar-event text-secondary" style="font-size: 0.8rem;"></i>
                                        {{ $item->tahun }}
                                    </span>
                                </td>

                                <!-- Lokasi -->
                                <td>
                                    <span class="badge-location d-inline-flex align-items-center gap-1.5 search-target-location">
                                        <i class="bi bi-geo-alt-fill" style="font-size: 0.8rem;"></i>
                                        {{ $item->lokasi }}
                                    </span>
                                </td>

                                <!-- Aksi -->
                                <td class="text-center">
                                    <div class="d-inline-flex align-items-center gap-1">
                                        <!-- Edit -->
                                        <a href="{{ route('alat.edit', $item->id) }}" 
                                           class="btn-action btn-action-edit" 
                                           title="Ubah Data"
                                           data-bs-toggle="tooltip">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <!-- Hapus Form -->
                                        <form action="{{ route('alat.destroy', $item->id) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus inventaris alat \'{{ addslashes($item->nama_alat) }}\'?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn-action btn-action-delete" 
                                                    title="Hapus Data"
                                                    data-bs-toggle="tooltip">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="emptyRow">
                                <td colspan="6" class="text-center py-5">
                                    <div class="py-4">
                                        <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center text-muted mb-3" 
                                             style="width: 80px; height: 80px;">
                                            <i class="bi bi-clipboard2-pulse fs-1 text-primary opacity-50"></i>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-1">Belum Ada Data Alat Medis</h5>
                                        <p class="text-muted small mb-3">Mulai tambahkan data peralatan medis ke dalam sistem inventaris.</p>
                                        <a href="{{ route('alat.create') }}" class="btn btn-add-item rounded-pill px-4">
                                            <i class="bi bi-plus-lg me-1"></i> Tambah Data Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer summary -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center pt-3 px-2 mt-2 border-top border-light text-muted small">
                <span>Menampilkan <strong>{{ $alats->count() }}</strong> data inventaris medis</span>
                <span class="mt-2 mt-sm-0"><i class="bi bi-shield-lock me-1"></i> Terenkripsi & Terintegrasi SIMRS</span>
            </div>

        </div>

    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Client-side Quick Search Filter Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Interactive live filter
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('keyup', function () {
                    const query = this.value.toLowerCase();
                    const rows = document.querySelectorAll('.table-row-item');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        if (text.includes(query)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            }
        });
    </script>
</body>
</html>