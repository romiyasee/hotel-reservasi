<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - The Heritage Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Cormorant+Garamond:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-brown: #8B4513;
            --secondary-brown: #A0522D;
            --light-brown: #D2B48C;
            --dark-brown: #5D2A0A;
            --cream: #F5F5DC;
            --gold: #DAA520;
            --copper: #B87333;
            --mahogany: #C04000;
            --wood-texture: linear-gradient(135deg, #8B4513 0%, #A0522D 30%, #CD853F 60%, #DEB887 100%);
            --dark-wood: linear-gradient(135deg, #5D2A0A 0%, #8B4513 50%, #A0522D 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, var(--cream) 0%, #FAEBD7 100%);
            color: var(--dark-brown);
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }

        /* Animated Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(139, 69, 19, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(218, 165, 32, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(160, 82, 45, 0.03) 0%, transparent 50%);
            z-index: -1;
            animation: backgroundShift 20s ease-in-out infinite;
        }

        @keyframes backgroundShift {
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(20px) translateY(-10px); }
            50% { transform: translateX(-15px) translateY(15px); }
            75% { transform: translateX(10px) translateY(-5px); }
        }

        /* Enhanced Navbar */
        .navbar {
            background: var(--dark-wood) !important;
            backdrop-filter: blur(15px);
            box-shadow: 0 8px 32px rgba(139, 69, 19, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .navbar:hover::before {
            left: 100%;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 900;
            font-size: 2rem;
            color: var(--gold) !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            position: relative;
            z-index: 2;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
            color: var(--cream) !important;
        }

        .navbar-text {
            color: var(--cream) !important;
            font-weight: 600;
        }

        .btn-outline-light {
            border: 2px solid var(--gold);
            color: var(--gold) !important;
            font-weight: 600;
            border-radius: 25px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background: var(--gold);
            color: var(--dark-brown) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(218, 165, 32, 0.4);
        }

        /* Hero Section with Parallax */
        .hero {
            background: linear-gradient(rgba(93, 42, 10, 0.7), rgba(139, 69, 19, 0.8)), 
                        url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 3px 3px 10px rgba(0,0,0,0.8);
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at center, rgba(218, 165, 32, 0.15) 0%, transparent 70%);
            animation: heroGlow 8s ease-in-out infinite alternate;
        }

        @keyframes heroGlow {
            0% { opacity: 0.5; transform: scale(1); }
            100% { opacity: 0.8; transform: scale(1.1); }
        }

        /* Floating Animated Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-icon {
            position: absolute;
            color: rgba(218, 165, 32, 0.7);
            font-size: 2.5rem;
            animation: floatComplex 12s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) { 
            top: 15%; left: 10%; 
            animation-delay: 0s; 
            animation-duration: 15s;
        }
        .floating-icon:nth-child(2) { 
            top: 25%; right: 15%; 
            animation-delay: 3s; 
            animation-duration: 18s;
        }
        .floating-icon:nth-child(3) { 
            bottom: 30%; left: 20%; 
            animation-delay: 6s; 
            animation-duration: 14s;
        }
        .floating-icon:nth-child(4) { 
            bottom: 20%; right: 25%; 
            animation-delay: 9s; 
            animation-duration: 16s;
        }
        .floating-icon:nth-child(5) { 
            top: 60%; left: 50%; 
            animation-delay: 12s; 
            animation-duration: 20s;
        }

        @keyframes floatComplex {
            0%, 100% { 
                transform: translateY(0px) translateX(0px) rotate(0deg); 
                opacity: 0.7; 
            }
            25% { 
                transform: translateY(-30px) translateX(20px) rotate(5deg); 
                opacity: 1; 
            }
            50% { 
                transform: translateY(-10px) translateX(-15px) rotate(-3deg); 
                opacity: 0.8; 
            }
            75% { 
                transform: translateY(-25px) translateX(10px) rotate(8deg); 
                opacity: 0.9; 
            }
        }

        /* Hero Content */
        .hero-content {
            text-align: center;
            z-index: 10;
            max-width: 900px;
            padding: 3rem;
            position: relative;
        }

        .hero-content::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            right: -50px;
            bottom: -50px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulseGlow 6s ease-in-out infinite;
        }


        @keyframes pulseGlow {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.1); opacity: 0.6; }
        }

        .hero h1 {
            font-size: 4.5rem;
            margin-bottom: 1.5rem;
            font-weight: 900;
            background: linear-gradient(45deg, #ffffffff, #e2dfdaff, #f3f3f3ff);
            -webkit-background-clip: text;
            
            background-clip: text;
            opacity: 0;
            animation: fadeInUp 1.2s ease 0.5s forwards;
            position: relative;
            z-index: 2;
        }

        .hero p {
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            font-weight: 300;
            font-family: 'Cormorant Garamond', serif;
            opacity: 0;
            animation: fadeInUp 1.2s ease 0.8s forwards;
            position: relative;
            z-index: 2;
        }

        .hero-btn {
            background: linear-gradient(135deg, var(--gold) 0%, var(--copper) 100%);
            border: none;
            padding: 18px 45px;
            font-size: 1.2rem;
            border-radius: 50px;
            color: yellow;
            font-weight: 700;
            text-decoration: none;
            display: inline-block;
            transition: all 0.4s ease;
            opacity: 0;
            animation: fadeInUp 1.2s ease 1.1s forwards;
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.4);
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        .hero-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s;
        }

        .hero-btn:hover::before {
            left: 100%;
        }

        .hero-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(218, 165, 32, 0.6);
            color: var(--dark-brown);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Section Styling */
        .section-header {
            text-align: center;
            margin-bottom: 5rem;
            position: relative;
        }

        .section-header h2 {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--primary-brown);
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }

        .section-header h2::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 6px;
            background: var(--wood-texture);
            border-radius: 3px;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 4px;
            background: var(--gold);
            border-radius: 2px;
        }

        .section-header p {
            font-size: 1.2rem;
            color: var(--secondary-brown);
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
        }

        /* Enhanced Cards */
        .card {
            border-radius: 25px;
            border: none;
            box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15);
            overflow: hidden;
            transition: all 0.5s ease;
            background: linear-gradient(145deg, #ffffff 0%, #fefefe 100%);
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--wood-texture);
        }

        .card:hover {
            transform: translateY(-15px) scale(1.03);
            box-shadow: 0 25px 50px rgba(139, 69, 19, 0.25);
        }

        .card-img-top {
            height: 280px;
            object-fit: cover;
            transition: transform 0.6s ease;
            position: relative;
        }

        .card:hover .card-img-top {
            transform: scale(1.15);
        }

        .card-body {
            padding: 2.5rem;
            position: relative;
        }

        .card-title {
            font-size: 1.8rem;
            color: var(--primary-brown);
            margin-bottom: 1rem;
            font-family: 'Playfair Display', serif;
        }

        .card-text {
            color: var(--dark-brown);
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* Price Display */
        .price-display {
            background: linear-gradient(135deg, var(--gold) 0%, var(--copper) 100%);
            color: var(--dark-brown);
            padding: 1rem 2rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 1.3rem;
            display: inline-block;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 25px rgba(218, 165, 32, 0.3);
            position: relative;
            overflow: hidden;
        }

        .price-display::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
            animation: shimmerPrice 3s ease-in-out infinite;
        }

        @keyframes shimmerPrice {
            0%, 100% { transform: rotate(0deg); opacity: 0; }
            50% { transform: rotate(180deg); opacity: 1; }
        }

        /* Enhanced Buttons */
        .btn-primary {
            background: var(--wood-texture);
            border: none;
            color: white;
            padding: 15px 35px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(139, 69, 19, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(139, 69, 19, 0.4);
            background: var(--dark-wood);
        }

        /* Modal Enhancements */
        .modal-content {
            border-radius: 25px;
            border: none;
            box-shadow: 0 25px 80px rgba(0,0,0,0.4);
            overflow: hidden;
        }

        .modal-header {
            background: var(--wood-texture);
            color: white;
            padding: 2rem;
            position: relative;
        }

        .modal-header::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gold);
        }

        .form-control {
            border-radius: 15px;
            border: 3px solid var(--light-brown);
            padding: 15px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(245, 245, 220, 0.5);
        }

        .form-control:focus {
            border-color: var(--primary-brown);
            box-shadow: 0 0 0 0.3rem rgba(139, 69, 19, 0.25);
            background: white;
        }

        /* Table Styling */
        .reservations-section {
            background: linear-gradient(135deg, var(--cream) 0%, #F0E68C 50%, var(--light-brown) 100%);
            padding: 6rem 0;
            position: relative;
        }

        .reservations-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(139, 69, 19, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(218, 165, 32, 0.05) 0%, transparent 50%);
            animation: backgroundFloat 15s ease-in-out infinite;
        }

        @keyframes backgroundFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .table-container {
            background: linear-gradient(145deg, #ffffff 0%, #fefefe 100%);
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(139, 69, 19, 0.15);
            overflow: hidden;
            border: 4px solid var(--light-brown);
        }

        .table thead {
            background: var(--wood-texture);
            color: white;
        }

        .table th {
            border: none;
            padding: 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .table td {
            padding: 1.5rem;
            vertical-align: middle;
            border-color: rgba(139, 69, 19, 0.1);
            font-weight: 500;
        }

        .table tbody tr:hover {
            background: rgba(245, 245, 220, 0.7);
            transition: background 0.3s ease;
        }

        /* Enhanced Badges */
        .badge {
            padding: 0.8rem 1.5rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .bg-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%) !important;
        }

        .bg-danger {
            background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%) !important;
        }

        /* Footer Enhancement */
        footer {
            background: var(--dark-wood);
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gold);
        }

        footer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(218, 165, 32, 0.1) 0%, transparent 70%);
            animation: footerGlow 20s ease-in-out infinite;
        }

        @keyframes footerGlow {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.1); }
        }

        footer h5 {
            color: var(--gold);
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        /* Alert Enhancements */
        .alert {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            animation: slideInDown 0.8s ease;
            border-left: 6px solid;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(40, 167, 69, 0.1) 0%, rgba(32, 201, 151, 0.1) 100%);
            border-left-color: #28a745;
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.1) 0%, rgba(232, 62, 140, 0.1) 100%);
            border-left-color: #dc3545;
            color: #721c24;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Scroll Animation Trigger */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Loading States */
        .btn.loading {
            pointer-events: none;
            opacity: 0.7;
        }

        .loading-spinner {
            display: inline-block;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
            margin-right: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 { font-size: 3rem; }
            .hero p { font-size: 1.2rem; }
            .section-header h2 { font-size: 2.5rem; }
            .floating-icon { font-size: 2rem; }
            .hero-content { padding: 2rem 1rem; }
            .card-body { padding: 2rem; }
            .table-responsive { font-size: 0.9rem; }
        }

        @media (max-width: 576px) {
            .hero h1 { font-size: 2.5rem; }
            .section-header h2 { font-size: 2rem; }
            .hero-btn { padding: 15px 30px; font-size: 1rem; }
            .floating-icon { display: none; }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream);
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--wood-texture);
            border-radius: 6px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--dark-wood);
        }

        /* Additional Enhancements */
        .heritage-accent {
            color: var(--gold);
        }

        .wood-divider {
            height: 4px;
            background: var(--wood-texture);
            border-radius: 2px;
            margin: 2rem auto;
            max-width: 200px;
        }
    </style>
</head>
<body>
    <!-- Enhanced Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow">
        <div class="container">
            <a class="navbar-brand animate__animated animate__fadeInLeft" href="#">
                <i class="bi bi-gem"></i> The Heritage Hotel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="navbar-text me-3 animate__animated animate__fadeInRight">
                            <i class="bi bi-person-circle"></i> {{ auth()->user()->username }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light animate__animated animate__fadeInRight" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </nav>

    <!-- Enhanced Alert Messages -->
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle"></i> 
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- Enhanced Hero Section -->
    <section class="hero">
        <div class="floating-elements">
            <i class="bi bi-gem floating-icon"></i>
            <i class="bi bi-star-fill floating-icon"></i>
            <i class="bi bi-heart-fill floating-icon"></i>
            <i class="bi bi-house-heart floating-icon"></i>
            <i class="bi bi-award floating-icon"></i>
        </div>
        
        <div class="hero-content">
            <h1>Selamat Datang, {{ auth()->user()->username }}!</h1>
            <p>Rasakan kemewahan dan kehangatan The Heritage Hotel dengan sentuhan klasik yang tak terlupakan</p>
            <a href="#rooms" class="hero-btn">
                <i class="bi bi-arrow-down-circle me-2"></i>Jelajahi Kamar Mewah
            </a>
        </div>
    </section>

    <!-- Enhanced Rooms Section -->
    <section class="py-5" id="rooms">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>Tipe Kamar Tersedia</h2>
                <p class="text-muted">Pilih kamar yang sesuai dengan kebutuhan Anda</p>
            </div>
            
            <div class="row g-4">
                @forelse($rooms as $room)
                <div class="col-lg-4 col-md-6 animate-on-scroll">
                    <div class="card h-100">
                        <img src="{{ $room->foto ? asset('storage/' . $room->foto) : 'https://images.unsplash.com/photo-1560343090-f0409e92791a?auto=format&fit=crop&w=800&q=80' }}" 
                             class="card-img-top" 
                             alt="{{ $room->nama_kamar }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $room->nama_kamar }}</h5>
                            <p class="card-text flex-grow-1">{{ $room->deskripsi ?? 'Kamar nyaman dengan fasilitas lengkap untuk kenyamanan Anda.' }}</p>
                            <div class="mt-auto">
                                <div class="price-display">
                                    <i class="bi bi-currency-dollar"></i> 
                                    Rp {{ number_format($room->harga,0,',','.') }} 
                                    <small>/malam</small>
                                </div>
                                <button class="btn btn-primary w-100" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#bookModal{{ $room->id }}">
                                    <i class="bi bi-calendar-check me-2"></i>Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Modal Pemesanan -->
                <div class="modal fade" id="bookModal{{ $room->id }}" tabindex="-1" aria-labelledby="bookModalLabel{{ $room->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form action="{{ route('user.bookRoom') }}" method="POST" id="bookingForm{{ $room->id }}">
                        @csrf
                        <div class="modal-header">
                          <h5 class="modal-title fw-bold" id="bookModalLabel{{ $room->id }}">
                            <i class="bi bi-gem me-2"></i>Pesan {{ $room->nama_kamar }}
                          </h5>
                          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $room->foto ? asset('storage/' . $room->foto) : 'https://images.unsplash.com/photo-1560343090-f0409e92791a?auto=format&fit=crop&w=800&q=80' }}" 
                                         class="img-fluid rounded" alt="{{ $room->nama_kamar }}">
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold heritage-accent">Detail Kamar:</h6>
                                    <div class="wood-divider"></div>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>{{ $room->nama_kamar }}</li>
                                        <li class="mb-2"><i class="bi bi-currency-dollar text-success me-2"></i>Rp {{ number_format($room->harga,0,',','.') }} / malam</li>
                                        <li class="mb-2"><i class="bi bi-info-circle text-info me-2"></i>{{ $room->deskripsi ?? 'Fasilitas lengkap' }}</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <input type="hidden" name="kamar_id" value="{{ $room->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggal_checkin{{ $room->id }}" class="form-label fw-bold">
                                            <i class="bi bi-calendar-date heritage-accent me-2"></i>Tanggal Check-in
                                        </label>
                                        <input type="date" 
                                               class="form-control" 
                                               id="tanggal_checkin{{ $room->id }}" 
                                               name="tanggal_checkin" 
                                               min="{{ date('Y-m-d') }}"
                                               required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggal_checkout{{ $room->id }}" class="form-label fw-bold">
                                            <i class="bi bi-calendar-x heritage-accent me-2"></i>Tanggal Check-out
                                        </label>
                                        <input type="date" 
                                               class="form-control" 
                                               id="tanggal_checkout{{ $room->id }}" 
                                               name="tanggal_checkout" 
                                               min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                               required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> 
                                <small>Reservasi akan berstatus <strong>pending</strong> dan menunggu konfirmasi dari admin.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Batal
                          </button>
                          <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Konfirmasi Pesanan
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                @empty
                <div class="col-12 animate-on-scroll">
                    <div class="text-center py-5">
                        <i class="bi bi-house-x display-1 text-muted"></i>
                        <h4 class="mt-3">Belum Ada Kamar Tersedia</h4>
                        <p class="text-muted">Silakan hubungi admin untuk informasi lebih lanjut.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Enhanced Reservations Section -->
    <section class="reservations-section" id="reservations">
        <div class="container">
            <div class="section-header animate-on-scroll">
                <h2>Reservasi Anda</h2>
                <p class="text-muted">Kelola dan pantau status reservasi Anda</p>
            </div>
            
            <div class="row">
                <div class="col-12 animate-on-scroll">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th><i class="bi bi-hash me-2"></i>#</th>
                                        <th><i class="bi bi-house-door me-2"></i>Kamar</th>
                                        <th><i class="bi bi-calendar-date me-2"></i>Check-in</th>
                                        <th><i class="bi bi-calendar-x me-2"></i>Check-out</th>
                                        <th><i class="bi bi-clock me-2"></i>Durasi</th>
                                        <th><i class="bi bi-info-circle me-2"></i>Status</th>
                                        <th><i class="bi bi-calendar-event me-2"></i>Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reservations as $reservation)
                                    <tr>
                                        <td class="fw-bold">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-house-door-fill me-2 heritage-accent"></i>
                                                <div>
                                                    <div class="fw-bold">{{ $reservation->room->nama_kamar }}</div>
                                                    <small class="text-muted">ID: {{ $reservation->room->id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="bi bi-calendar-date text-success me-1"></i>
                                            {{ \Carbon\Carbon::parse($reservation->tanggal_checkin)->format('d M Y') }}
                                        </td>
                                        <td>
                                            <i class="bi bi-calendar-x text-danger me-1"></i>
                                            {{ \Carbon\Carbon::parse($reservation->tanggal_checkout)->format('d M Y') }}
                                        </td>
                                        <td>
                                            @php
                                                $days = \Carbon\Carbon::parse($reservation->tanggal_checkin)->diffInDays(\Carbon\Carbon::parse($reservation->tanggal_checkout));
                                            @endphp
                                            <span class="badge bg-info">{{ $days }} hari</span>
                                        </td>
                                        <td>
                                            @if($reservation->status === 'confirmed')
                                                <span class="badge bg-success">
                                                    <i class="bi bi-check-circle me-1"></i>Dikonfirmasi
                                                </span>
                                            @elseif($reservation->status === 'pending')
                                                <span class="badge bg-warning text-dark">
                                                    <i class="bi bi-clock me-1"></i>Menunggu
                                                </span>
                                            @elseif($reservation->status === 'cancelled')
                                                <span class="badge bg-danger">
                                                    <i class="bi bi-x-circle me-1"></i>Dibatalkan
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    <i class="bi bi-question-circle me-1"></i>{{ $reservation->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                {{ $reservation->created_at->format('d M Y, H:i') }}
                                            </small>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-5">
                                            <i class="bi bi-calendar-x display-1 text-muted"></i>
                                            <h5 class="mt-3">Belum Ada Reservasi</h5>
                                            <p class="text-muted mb-0">Mulai pesan kamar pertama Anda!</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="fw-bold">The Heritage Hotel</h5>
                    <p class="mb-0">Pengalaman menginap mewah dengan sentuhan warisan budaya</p>
                    <div class="wood-divider mt-3"></div>
                </div>
                <div class="col-md-6">
                    <p class="mb-2">&copy; 2025 The Heritage Hotel. All rights reserved.</p>
                    <small class="text-muted">
                        Made with <i class="bi bi-heart-fill" style="color: var(--gold);"></i> for your luxury comfort
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Enhanced JavaScript with animations and interactions
        document.addEventListener('DOMContentLoaded', function() {
            
            // Scroll Animation Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                    }
                });
            }, observerOptions);

            // Observe all elements with animate-on-scroll class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });

            // Auto-update checkout date when checkin date changes
            const checkinInputs = document.querySelectorAll('input[name="tanggal_checkin"]');
            
            checkinInputs.forEach(function(input) {
                input.addEventListener('change', function() {
                    const roomId = this.id.replace('tanggal_checkin', '');
                    const checkoutInput = document.getElementById('tanggal_checkout' + roomId);
                    
                    if (this.value) {
                        const checkinDate = new Date(this.value);
                        const minCheckoutDate = new Date(checkinDate);
                        minCheckoutDate.setDate(minCheckoutDate.getDate() + 1);
                        
                        checkoutInput.min = minCheckoutDate.toISOString().split('T')[0];
                        
                        // If checkout date is before new minimum, reset it
                        if (checkoutInput.value && new Date(checkoutInput.value) <= checkinDate) {
                            checkoutInput.value = minCheckoutDate.toISOString().split('T')[0];
                        }
                    }
                });
            });
            
            // Enhanced Form validation with loading states
            const forms = document.querySelectorAll('form[id^="bookingForm"]');
            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    const checkin = form.querySelector('input[name="tanggal_checkin"]').value;
                    const checkout = form.querySelector('input[name="tanggal_checkout"]').value;
                    const submitBtn = form.querySelector('button[type="submit"]');
                    
                    if (new Date(checkout) <= new Date(checkin)) {
                        e.preventDefault();
                        alert('Tanggal check-out harus setelah tanggal check-in!');
                        return false;
                    }
                    
                    // Add loading state
                    submitBtn.classList.add('loading');
                    submitBtn.innerHTML = '<span class="loading-spinner"></span>Memproses...';
                });
            });
            
            // Enhanced alert auto-dismiss with fade animation
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function(alert) {
                    alert.style.transition = 'all 0.5s ease';
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    
                    setTimeout(function() {
                        if (alert.parentNode) {
                            alert.parentNode.removeChild(alert);
                        }
                    }, 500);
                });
            }, 5000);

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Enhanced navbar scroll effect
            let lastScroll = 0;
            const navbar = document.querySelector('.navbar');
            
            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                
                if (currentScroll > 100) {
                    navbar.style.background = 'var(--dark-wood)';
                    navbar.style.backdropFilter = 'blur(20px)';
                    navbar.style.boxShadow = '0 12px 40px rgba(139, 69, 19, 0.4)';
                } else {
                    navbar.style.background = 'var(--dark-wood)';
                    navbar.style.backdropFilter = 'blur(15px)';
                    navbar.style.boxShadow = '0 8px 32px rgba(139, 69, 19, 0.3)';
                }
                
                lastScroll = currentScroll;
            });

            // Add hover effects to cards
            document.querySelectorAll('.card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.03)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Modal enhancement effects
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    this.querySelector('.modal-content').style.animation = 'fadeInUp 0.5s ease';
                });
            });

            // Price display animation
            document.querySelectorAll('.price-display').forEach(price => {
                price.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                    this.style.boxShadow = '0 12px 35px rgba(218, 165, 32, 0.5)';
                });
                
                price.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 8px 25px rgba(218, 165, 32, 0.3)';
                });
            });

            // Table row hover animations
            document.querySelectorAll('.table tbody tr').forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                    this.style.boxShadow = '0 8px 25px rgba(139, 69, 19, 0.1)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = 'none';
                });
            });

            console.log('The Heritage Hotel - Enhanced UI Loaded Successfully');
        });
    </script>
</body>
</html>