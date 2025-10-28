<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Masuk - Pemesanan Tiket Konser</title>
    <!-- Kita tetap pakai Bootstrap untuk struktur, tapi CSS kustom yang mendominasi --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Poppins (untuk meniru gaya Gratafy) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Gratafy Dark UI Theme Variables (Diubah ke Hitam-Abu) */
        :root {
            --color-bg-dark: #1e1e1e; /* Warna utama gelap (Hampir Hitam) */
            --color-card-bg: #2a2a2a; /* Warna kartu sedikit lebih terang */
            --color-text-light: #f0f0f5; /* Teks terang */
            --color-placeholder: #999; /* Warna placeholder abu-abu netral */
            --color-input-bg: #2a2a2a; /* Latar belakang input sama dengan kartu */
            --color-primary: #007bff; /* Warna tombol baru: Biru Bootstrap (Tetap) */
            --color-border-input: #444; /* Border input abu-abu gelap */
            --color-accent: #555; /* Aksesn abu-abu terang untuk fokus */
        }

        body { 
            /* 1. Latar Belakang Gambar */
            background: url('https://i.pinimg.com/1200x/6c/be/36/6cbe36c8568733a5cd9497d7008b97d4.jpg') no-repeat center center;
            background-size: cover; /* Diubah: Gambar mengisi seluruh area */
            background-attachment: fixed; /* Tambahan: Gambar tetap di tempatnya */
            /* Tambahkan overlay gelap agar teks mudah dibaca di atas gambar (dibuat lebih gelap) */
            background-color: rgba(0, 0, 0, 0.7); 
            background-blend-mode: darken; 
            
            min-height: 100vh; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-family: 'Poppins', sans-serif; /* Diubah ke Poppins */
            color: var(--color-text-light);
            padding: 20px;
        }
        
        /* Main Login Card - Kecil dan Elevated */
        .login-card-gratafy { 
            width: 100%; 
            max-width: 350px; 
            padding: 40px 30px; 
            border-radius: 12px; 
            background: var(--color-card-bg); 
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.9); /* Shadow lebih gelap agar menonjol */
            text-align: center;
        }

        /* Logo/Judul Text */
        .logo-text {
            font-size: 1.8rem; 
            font-weight: 700;
            color: var(--color-text-light); 
            margin-bottom: 50px;
        }
        
        /* Menyesuaikan margin untuk teks LOGIN */
        .logo-text.is-title {
            margin-bottom: 30px; 
        }

        /* Judul (disembunyikan sesuai gambar Gratafy) */
        h4.d-none { 
            display: none !important;
        }

        .form-label {
            color: var(--color-placeholder);
            font-size: 0.8rem;
            font-weight: 600;
            text-align: left;
            display: block; 
            margin-bottom: 0; 
            text-transform: uppercase;
        }

        .form-control {
            background-color: var(--color-input-bg);
            border: 1px solid var(--color-border-input);
            color: var(--color-text-light);
            height: 48px; 
            border-radius: 8px; 
            padding: 10px 15px; 
        }

        .form-control:focus { 
            background-color: #333; /* Warna fokus yang lebih gelap */
            border-color: var(--color-accent); 
            box-shadow: 0 0 0 0.25rem rgba(85, 85, 85, 0.3); /* Shadow fokus abu-abu */
            color: #fff;
        }
        .form-control::placeholder {
            color: var(--color-placeholder);
        }
        
        /* Checkbox dan Link Lupa Sandi di bawah input */
        .remember-forgot-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .form-check-input {
            background-color: var(--color-input-bg);
            border-color: #555;
        }
        .form-check-input:checked {
            background-color: var(--color-primary); /* Tetap biru agar mencolok */
            border-color: var(--color-primary);
        }
        .form-check-label {
            color: var(--color-placeholder);
            font-size: 0.9em;
        }
        
        /* 2. Tombol LOGIN tetap Biru Solid */
        .btn-gratafy {
            background-color: var(--color-primary); 
            border: 1px solid var(--color-primary); 
            color: var(--color-text-light); 
            font-weight: 700;
            height: 45px; 
            border-radius: 25px; 
            width: 100%;
            max-width: 150px; 
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            margin-bottom: 0px; 
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4); 
            transition: all 0.2s ease;
        }

        .btn-gratafy:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
            color: var(--color-text-light);
            box-shadow: 0 5px 20px rgba(0, 123, 255, 0.6);
        }
        
        /* Ikon panah di tombol diubah menjadi warna putih agar kontras */
        .btn-gratafy i {
            margin-left: 8px;
            color: var(--color-text-light); 
        }

        /* Link Lupa Sandi di luar Card (sesuai Gratafy) */
        .forgot-outside {
            color: var(--color-placeholder);
            font-size: 0.9rem; 
            text-decoration: none;
            margin-top: 50px;
            padding: 0 20px; 
            border-bottom: 1px solid var(--color-placeholder); 
            transition: color 0.2s;
        }
        .forgot-outside:hover {
            color: var(--color-text-light);
        }
        
        /* Alerts Styling */
        .alert {
            background: #333; 
            color: var(--color-text-light);
            border: 1px solid #555;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .alert-danger {
             background: #440000;
             color: #ffcccc;
             border: 1px solid #ff4d4d;
        }
    </style>
</head>
<body>
    
    <div class="position-absolute w-100 h-100 d-flex flex-column align-items-center justify-content-center">
        <!-- Logo Text diubah menjadi 'LOGIN' --><div class="logo-text is-title mb-4">LOGIN</div>

        <div class="login-card-gratafy">
            <!-- Alert Section -->@if(session('status'))
                <div class="alert alert-info">{{ session('status') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 text-start">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="text-start">
                @csrf
                
                <!-- Email/Username --><div class="mb-4">
                    <label for="email" class="form-label">EMAIL ADDRESS</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus placeholder="Masukkan email Anda">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password --><div class="mb-4">
                    <label for="password" class="form-label">PASSWORD</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required placeholder="••••••••">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me Checkbox --><div class="form-check text-start mb-4">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                
                <!-- Submit Button --><div class="text-center">
                    <button type="submit" class="btn btn-gratafy">
                        LOG IN <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </form>
        </div>
        
        <!-- Forgot Password Link (di luar kartu) --><a href="{{ route('password.request') }}" class="forgot-outside">FORGOT YOUR PASSWORD?</a>
        
        <!-- Register Link (Ditambahkan jika diperlukan, Gratafy tidak menampilkannya) --><!-- <a href="{{ route('register') }}" class="forgot-outside mt-2">CREATE ACCOUNT</a> --></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
