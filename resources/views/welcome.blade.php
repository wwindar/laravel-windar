<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal SIMRS - Sistem Inventaris Alat Medis</title>

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
        }

        body {
            font-family: var(--bs-body-font-family);
            background-color: var(--surface-bg);
            color: #334155;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(2, 132, 199, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(13, 148, 136, 0.08) 0%, transparent 40%);
            background-attachment: fixed;
        }

        .portal-header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .hero-section {
            padding: 3.5rem 0 2rem;
            text-align: center;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(2, 132, 199, 0.1);
            color: var(--brand-primary);
            font-weight: 700;
            font-size: 0.8rem;
            padding: 0.4rem 1rem;
            border-radius: 50rem;
            border: 1px solid rgba(2, 132, 199, 0.2);
            margin-bottom: 1.25rem;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--brand-dark);
            letter-spacing: -0.025em;
            line-height: 1.2;
        }

        .hero-title span {
            background: linear-gradient(135deg, #0284c7 0%, #0d9488 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.05rem;
            color: #64748b;
            max-width: 650px;
            margin: 0.85rem auto 0;
        }

        /* Hub Cards */
        .hub-card {
            background: #ffffff;
            border-radius: 1.25rem;
            border: 1px solid #e2e8f0;
            padding: 1.75rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            box-shadow: 0 4px 6px -1px rgba(15, 23, 42, 0.03), 0 2px 4px -2px rgba(15, 23, 42, 0.03);
        }

        .hub-card:hover {
            transform: translateY(-5px);
            border-color: #cbd5e1;
            box-shadow: 0 20px 25px -5px rgba(15, 23, 42, 0.08), 0 8px 10px -6px rgba(15, 23, 42, 0.04);
        }

        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.25rem;
            flex-shrink: 0;
        }

        .icon-blue {
            background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%);
            color: #0284c7;
        }

        .icon-teal {
            background: linear-gradient(135deg, #ccfbf1 0%, #99f6e4 100%);
            color: #0d9488;
        }

        .icon-indigo {
            background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
            color: #4f46e5;
        }

        .icon-emerald {
            background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
            color: #059669;
        }

        .icon-amber {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            color: #d97706;
        }

        .card-badge {
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.3rem 0.65rem;
            border-radius: 0.5rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--brand-dark);
            margin-bottom: 0.5rem;
        }

        .card-desc {
            font-size: 0.88rem;
            color: #64748b;
            line-height: 1.55;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .btn-card-action {
            display: inline-flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0.75rem 1.15rem;
            font-weight: 600;
            font-size: 0.88rem;
            border-radius: 0.75rem;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-primary-action {
            background: linear-gradient(135deg, #0284c7 0%, #0d9488 100%);
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.25);
        }

        .btn-primary-action:hover {
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(2, 132, 199, 0.35);
            transform: scale(1.01);
        }

        .btn-outline-action {
            background: #f8fafc;
            color: #334155;
            border: 1px solid #e2e8f0;
        }

        .btn-outline-action:hover {
            background: #f1f5f9;
            color: #0f172a;
            border-color: #cbd5e1;
        }

        .footer-bar {
            margin-top: auto;
            border-top: 1px solid #e2e8f0;
            background: #ffffff;
            padding: 1.25rem 0;
            font-size: 0.85rem;
            color: #64748b;
        }

        .status-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: #10b981;
            margin-right: 0.35rem;
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <header class="portal-header py-3">
        <div class="container-xl d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 d-flex align-items-center justify-content-center text-white" 
                     style="width: 42px; height: 42px; background: linear-gradient(135deg, #0284c7, #0d9488);">
                    <i class="bi bi-heart-pulse-fill fs-5"></i>
                </div>
                <div>
                    <h5 class="mb-0 fw-bold text-dark">SIMRS Medika</h5>
                    <small class="text-muted" style="font-size: 0.75rem;">Portal Terpadu Sistem Inventaris Alat Medis</small>
                </div>
            </div>

            <!-- Auth Quick Menu -->
            <div class="d-flex align-items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3 fw-semibold">
                        <i class="bi bi-speedometer2 me-1"></i> Dashboard
                    </a>
                    <a href="{{ route('profile.show') }}" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold" style="background: var(--brand-primary); border-color: var(--brand-primary);">
                        <i class="bi bi-person-circle me-1"></i> Profil ({{ Auth::user()->name }})
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-semibold">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk (Login)
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold" style="background: var(--brand-primary); border-color: var(--brand-primary);">
                            <i class="bi bi-person-plus me-1"></i> Daftar Akun
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container-xl flex-grow-1 pb-5">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-badge">
                <i class="bi bi-grid-1x2-fill"></i> Single Access Portal
            </div>
            <h1 class="hero-title">
                Semua Halaman Aplikasi Dalam <span>Satu Pintu</span>
            </h1>
            <p class="hero-subtitle">
                Akses manajemen data inventaris alat medis, profil pengguna, dashboard kontrol, frontend katalog Nuxt 3, dan API server langsung dari sini.
            </p>
        </section>

        <!-- Cards Grid -->
        <div class="row g-4 justify-content-center">
            
            <!-- Card 1: Kelola Alat Medis (CRUD) -->
            <div class="col-md-6 col-lg-4">
                <div class="hub-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="icon-box icon-blue">
                            <i class="bi bi-tools"></i>
                        </div>
                        <span class="card-badge bg-primary-subtle text-primary">Utama • CRUD</span>
                    </div>
                    <h3 class="card-title">Kelola Alat Medis</h3>
                    <p class="card-desc">
                        Lihat daftar inventaris lengkap, input spesifikasi baru, ubah rincian, dan hapus data alat medis rumah sakit secara real-time.
                    </p>
                    <a href="{{ route('alat.index') }}" class="btn-card-action btn-primary-action">
                        <span>Buka Kelola Alat</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 2: Profil Pengguna -->
            <div class="col-md-6 col-lg-4">
                <div class="hub-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="icon-box icon-indigo">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <span class="card-badge bg-indigo-subtle text-indigo" style="background-color: #e0e7ff; color: #4338ca;">Keamanan Akun</span>
                    </div>
                    <h3 class="card-title">Profil Pengguna</h3>
                    <p class="card-desc">
                        Kelola data pribadi, perbarui nama & email, ubah kata sandi akun, aktifkan autentikasi dua faktor (2FA), dan kontrol sesi login.
                    </p>
                    @auth
                        <a href="{{ route('profile.show') }}" class="btn-card-action btn-outline-action">
                            <span>Buka Halaman Profil</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-card-action btn-outline-action">
                            <span>Login untuk Buka Profil</span>
                            <i class="bi bi-box-arrow-in-right"></i>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Card 3: Dashboard Admin -->
            <div class="col-md-6 col-lg-4">
                <div class="hub-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="icon-box icon-teal">
                            <i class="bi bi-speedometer2"></i>
                        </div>
                        <span class="card-badge bg-teal-subtle text-teal" style="background-color: #ccfbf1; color: #0f766e;">Panel Kontrol</span>
                    </div>
                    <h3 class="card-title">Dashboard Admin</h3>
                    <p class="card-desc">
                        Halaman beranda admin terpadu Laravel Jetstream untuk ringkasan operasional dan integrasi manajemen sistem.
                    </p>
                    <a href="{{ route('dashboard') }}" class="btn-card-action btn-outline-action">
                        <span>Buka Dashboard</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 4: Frontend Nuxt 3 -->
            <div class="col-md-6 col-lg-6">
                <div class="hub-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="icon-box icon-emerald">
                            <i class="bi bi-globe"></i>
                        </div>
                        <span class="card-badge bg-success-subtle text-success">Frontend Nuxt 3 • Port 3000</span>
                    </div>
                    <h3 class="card-title">Frontend Publik (Nuxt 3)</h3>
                    <p class="card-desc">
                        Antarmuka web modern berbasis Vue 3 / Nuxt yang menyajikan data alat medis secara asinkron dari API backend.
                    </p>
                    <a href="http://localhost:3000" target="_blank" class="btn-card-action btn-outline-action">
                        <span>Buka Frontend di Port 3000</span>
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
            </div>

            <!-- Card 5: REST API Data -->
            <div class="col-md-6 col-lg-6">
                <div class="hub-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="icon-box icon-amber">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <span class="card-badge bg-warning-subtle text-warning-emphasis">REST API • JSON</span>
                    </div>
                    <h3 class="card-title">Endpoint API Backend</h3>
                    <p class="card-desc">
                        Data mentah JSON dari endpoint <code>/api/alat-medis</code> yang digunakan untuk integrasi sistem dan pertukaran data.
                    </p>
                    <a href="{{ url('/api/alat-medis') }}" target="_blank" class="btn-card-action btn-outline-action">
                        <span>Lihat Respons API JSON</span>
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer Status -->
    <footer class="footer-bar">
        <div class="container-xl d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
            <div>
                <strong>SIMRS Medika</strong> &copy; {{ date('Y') }} • Sistem Informasi Manajemen Alat Medis
            </div>
            <div class="d-flex align-items-center gap-3">
                <span><span class="status-dot"></span> Backend: <strong>Port 8000</strong></span>
                <span><span class="status-dot"></span> Frontend: <strong>Port 3000</strong></span>
                <span><span class="status-dot"></span> Database: <strong>MySQL Aktif</strong></span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
