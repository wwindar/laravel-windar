<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Alat Medis - SIMRS</title>

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
                radial-gradient(circle at 15% 15%, rgba(14, 165, 233, 0.07) 0%, transparent 45%),
                radial-gradient(circle at 85% 85%, rgba(20, 184, 166, 0.07) 0%, transparent 45%);
            background-attachment: fixed;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 1rem;
        }

        .form-card {
            width: 100%;
            max-width: 580px;
            background: #ffffff;
            border-radius: 1.25rem !important; /* rounded-4 */
            border: 1px solid var(--card-border);
            box-shadow: 0 20px 40px -15px rgba(15, 23, 42, 0.08), 
                        0 10px 20px -5px rgba(15, 23, 42, 0.04);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .top-gradient-bar {
            height: 6px;
            background: linear-gradient(90deg, #f59e0b, #0284c7, #0d9488);
            width: 100%;
        }

        .form-floating > .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 0.85rem;
            height: calc(3.65rem + 2px);
            padding: 1.15rem 1rem 0.65rem 1rem;
            font-size: 0.95rem;
            font-weight: 500;
            color: #1e293b;
            background-color: #fcfdfe;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-floating > .form-control:focus {
            background-color: #ffffff;
            border-color: #0284c7;
            box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.12);
        }

        .form-floating > label {
            padding: 1.05rem 1rem;
            color: #64748b;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            opacity: 0.85;
            transform: scale(0.82) translateY(-0.75rem) translateX(0.15rem);
            color: #0284c7;
            font-weight: 600;
        }

        .btn-submit-modern {
            background: linear-gradient(135deg, #0284c7 0%, #0d9488 100%);
            color: #ffffff;
            border: none;
            border-radius: 0.85rem;
            padding: 0.85rem 1.75rem;
            font-weight: 600;
            font-size: 0.975rem;
            letter-spacing: 0.01em;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 6px 18px rgba(13, 148, 136, 0.28);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-submit-modern:hover {
            color: #ffffff;
            background: linear-gradient(135deg, #0369a1 0%, #0f766e 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(13, 148, 136, 0.42);
        }

        .btn-cancel-modern {
            border-radius: 0.85rem;
            border: 1.5px solid #e2e8f0;
            background-color: #ffffff;
            color: #64748b;
            font-weight: 600;
            font-size: 0.925rem;
            padding: 0.85rem 1.4rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            text-decoration: none;
        }

        .btn-cancel-modern:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #334155;
            transform: translateY(-1px);
        }

        .invalid-feedback {
            font-size: 0.8rem;
            font-weight: 500;
            margin-top: 0.35rem;
            padding-left: 0.25rem;
        }
    </style>
</head>
<body>

    <div class="page-container">
        
        <div class="card form-card">
            <!-- Decorative Gradient Line -->
            <div class="top-gradient-bar"></div>

            <div class="p-4 p-sm-5">
                <!-- Header Icon & Title -->
                <div class="d-flex align-items-center gap-3 mb-4">
                    <div class="rounded-3 d-flex align-items-center justify-content-center text-white flex-shrink-0" 
                         style="width: 50px; height: 50px; background: linear-gradient(135deg, #f59e0b, #d97706); box-shadow: 0 6px 16px rgba(245, 158, 11, 0.25);">
                        <i class="bi bi-pencil-square fs-4"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Edit Alat Medis</h4>
                        <p class="text-muted small mb-0">Perbarui rincian inventaris alat ID: ALK-{{ str_pad($alat->id, 4, '0', STR_PAD_LEFT) }}</p>
                    </div>
                </div>

                <!-- Error Summary Alert if any -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 p-3 mb-4" role="alert">
                        <div class="d-flex align-items-start gap-2">
                            <i class="bi bi-exclamation-triangle-fill fs-6 text-danger mt-0.5"></i>
                            <div>
                                <strong class="small fw-bold">Terdapat kesalahan pengisian:</strong>
                                <ul class="mb-0 ps-3 small mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('alat.update', $alat->id) }}" method="POST" autocomplete="off" novalidate>
                    @csrf
                    @method('PUT')

                    <!-- Floating Label 1: Nama Alat -->
                    <div class="form-floating mb-3">
                        <input type="text" 
                               name="nama_alat" 
                               id="nama_alat" 
                               class="form-control @error('nama_alat') is-invalid @enderror" 
                               placeholder="Nama Alat Medis" 
                               value="{{ old('nama_alat', $alat->nama_alat) }}" 
                               required>
                        <label for="nama_alat">
                            <i class="bi bi-cpu text-primary me-1"></i> Nama Alat Medis
                        </label>
                        @error('nama_alat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Floating Label 2: Merek -->
                    <div class="form-floating mb-3">
                        <input type="text" 
                               name="merek" 
                               id="merek" 
                               class="form-control @error('merek') is-invalid @enderror" 
                               placeholder="Merek / Pabrikan" 
                               value="{{ old('merek', $alat->merek) }}" 
                               required>
                        <label for="merek">
                            <i class="bi bi-tag text-primary me-1"></i> Merek / Pabrikan
                        </label>
                        @error('merek')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Floating Label 3: Tahun -->
                    <div class="form-floating mb-3">
                        <input type="number" 
                               name="tahun" 
                               id="tahun" 
                               class="form-control @error('tahun') is-invalid @enderror" 
                               placeholder="Tahun Pengadaan" 
                               min="1900" 
                               max="2099" 
                               value="{{ old('tahun', $alat->tahun) }}" 
                               required>
                        <label for="tahun">
                            <i class="bi bi-calendar-event text-primary me-1"></i> Tahun Pembuatan / Pengadaan
                        </label>
                        @error('tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Floating Label 4: Lokasi -->
                    <div class="form-floating mb-4">
                        <input type="text" 
                               name="lokasi" 
                               id="lokasi" 
                               class="form-control @error('lokasi') is-invalid @enderror" 
                               placeholder="Lokasi / Ruangan" 
                               value="{{ old('lokasi', $alat->lokasi) }}" 
                               required>
                        <label for="lokasi">
                            <i class="bi bi-geo-alt text-primary me-1"></i> Lokasi / Ruangan
                        </label>
                        @error('lokasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex align-items-center justify-content-between pt-2">
                        <a href="{{ route('alat.index') }}" class="btn-cancel-modern">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>

                        <button type="submit" class="btn-submit-modern">
                            <i class="bi bi-check2-circle fs-5"></i>
                            <span>Perbarui Data</span>
                        </button>
                    </div>

                </form>

            </div>

            <!-- Footer note inside card -->
            <div class="bg-light px-4 px-sm-5 py-3 border-top border-light d-flex align-items-center justify-content-between text-muted small">
                <span><i class="bi bi-info-circle me-1 text-primary"></i> Perubahan akan langsung tercatat</span>
                <span>SIMRS Medika v1.0</span>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
