<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Heritage Hotel - Luxury Redefined</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-brown: #8B4513;
            --secondary-brown: #A0522D;
            --light-brown: #D2B48C;
            --dark-brown: #654321;
            --cream: #F5F5DC;
            --gold: #D4AF37;
            --dark-gold: #B8941F;
            --wood-brown: #6B4423;
            --mahogany: #C04000;
            --espresso: #3C2415;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Wood Grain Background Animation */
        .wood-grain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(90deg, transparent 79px, rgba(139, 69, 19, 0.03) 81px, transparent 82px),
                linear-gradient(rgba(139, 69, 19, 0.02), transparent),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="wood" width="100" height="100" patternUnits="userSpaceOnUse"><rect width="100" height="100" fill="%23f5f5dc"/><path d="M0 50c10-5 20 5 30 0s20-5 30 0 20 5 30 0 20-5 30 0 10 5 20 0V0H0v50z" fill="rgba(139,69,19,0.05)"/><path d="M0 70c10-3 20 3 30 0s20-3 30 0 20 3 30 0 20-3 30 0 10 3 20 0V50c-10 5-20-5-30 0s-20 5-30 0-20-5-30 0-20 5-30 0S10 45 0 50v20z" fill="rgba(160,82,45,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23wood)"/></svg>');
            pointer-events: none;
            z-index: -2;
            animation: woodFloat 20s ease-in-out infinite;
        }

        @keyframes woodFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        /* Floating Hotel Icons */
        .floating-icons {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .floating-icon {
            position: absolute;
            color: rgba(139, 69, 19, 0.1);
            font-size: 2rem;
            animation: floatIcon 8s ease-in-out infinite;
        }

        .floating-icon:nth-child(1) { top: 15%; left: 10%; animation-delay: 0s; }
        .floating-icon:nth-child(2) { top: 25%; right: 15%; animation-delay: -2s; }
        .floating-icon:nth-child(3) { top: 60%; left: 8%; animation-delay: -4s; }
        .floating-icon:nth-child(4) { bottom: 30%; right: 12%; animation-delay: -6s; }
        .floating-icon:nth-child(5) { top: 45%; left: 20%; animation-delay: -1s; }
        .floating-icon:nth-child(6) { bottom: 20%; left: 15%; animation-delay: -3s; }
        .floating-icon:nth-child(7) { top: 35%; right: 25%; animation-delay: -5s; }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.3; }
            25% { transform: translateY(-20px) rotate(5deg); opacity: 0.6; }
            50% { transform: translateY(-30px) rotate(-5deg); opacity: 0.4; }
            75% { transform: translateY(-15px) rotate(3deg); opacity: 0.5; }
        }

        /* Navbar Enhancement */
        .navbar {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.95), rgba(107, 68, 35, 0.95));
            backdrop-filter: blur(15px);
            box-shadow: 0 4px 20px rgba(139, 69, 19, 0.3);
            transition: all 0.3s ease;
            border-bottom: 2px solid var(--gold);
        }

        .navbar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"><path d="M0 50c50-10 100 10 150 0s100-10 150 0 100 10 150 0 100-10 150 0 100 10 150 0 100-10 150 0V0H0v50z" fill="rgba(212,175,55,0.1)"/></svg>');
            pointer-events: none;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(135deg, var(--gold), var(--light-brown));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .navbar-brand::before {
            content: '🏛️';
            margin-right: 10px;
            animation: brandPulse 3s ease-in-out infinite;
        }

        @keyframes brandPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .nav-link {
            color: var(--cream) !important;
            font-weight: 500;
            margin: 0 15px;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--gold) !important;
        }

        .btn-reserve {
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-reserve::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-reserve:hover::before {
            left: 100%;
        }

        .btn-reserve:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.4);
            color: white;
        }

        /* Hero Section Enhancement */
        .hero {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.7), rgba(139, 69, 19, 0.7)), 
                        url("https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80") no-repeat center center/cover;
            height: 100vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="luxury" cx="50%" cy="50%" r="50%"><stop offset="0%" stop-color="rgba(212,175,55,0.1)"/><stop offset="100%" stop-color="transparent"/></radialGradient></defs><circle cx="200" cy="200" r="150" fill="url(%23luxury)"/><circle cx="800" cy="700" r="200" fill="url(%23luxury)"/><circle cx="500" cy="400" r="120" fill="url(%23luxury)"/></svg>');
            pointer-events: none;
            animation: luxuryShimmer 10s ease-in-out infinite;
        }

        @keyframes luxuryShimmer {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            animation: heroFadeIn 1.5s ease-out;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 30px;
            color: var(--cream);
            animation: heroFadeIn 1.5s ease-out 0.3s both;
        }

        .hero-cta {
            background: linear-gradient(135deg, var(--mahogany), var(--dark-brown));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(192, 64, 0, 0.3);
            animation: heroFadeIn 1.5s ease-out 0.6s both;
            position: relative;
            overflow: hidden;
        }

        .hero-cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        .hero-cta:hover::before {
            left: 100%;
        }

        .hero-cta:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(192, 64, 0, 0.4);
            color: white;
        }

        @keyframes heroFadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Luxury Elements */
        .luxury-ornament {
            position: absolute;
            color: rgba(212, 175, 55, 0.3);
            font-size: 1.5rem;
            animation: ornamentFloat 6s ease-in-out infinite;
        }

        .luxury-ornament:nth-child(1) { top: 20%; left: 15%; animation-delay: 0s; }
        .luxury-ornament:nth-child(2) { top: 30%; right: 20%; animation-delay: -2s; }
        .luxury-ornament:nth-child(3) { bottom: 25%; left: 10%; animation-delay: -4s; }

        @keyframes ornamentFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(180deg); }
        }

        /* Section Styling */
        .section-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 2.5rem;
            color: var(--dark-brown);
            margin-bottom: 40px;
            position: relative;
            text-align: center;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            border-radius: 2px;
        }

        /* Rooms Section */
        #rooms {
            background: linear-gradient(135deg, var(--cream), #f9f5f0);
            padding: 100px 0;
            position: relative;
        }

        .room-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(139, 69, 19, 0.15);
            transition: all 0.4s ease;
            border: 2px solid transparent;
            position: relative;
        }

        .room-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .room-card:hover::before {
            left: 100%;
        }

        .room-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(139, 69, 19, 0.25);
            border-color: var(--gold);
        }

        .room-card img {
            height: 280px;
            object-fit: cover;
            width: 100%;
            transition: all 0.3s ease;
        }

        .room-card:hover img {
            transform: scale(1.1);
        }

        .room-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, var(--gold), var(--dark-gold));
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            z-index: 2;
        }

        .room-price {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--mahogany);
        }

        /* Facilities Section */
        #facilities {
            background: linear-gradient(135deg, var(--wood-brown), var(--dark-brown));
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        #facilities::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            pointer-events: none;
        }

        .facility-item {
            text-align: center;
            padding: 30px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .facility-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .facility-item:hover::before {
            left: 100%;
        }

        .facility-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .facility-icon {
            font-size: 3.5rem;
            margin-bottom: 20px;
            background: linear-gradient(135deg, var(--gold), var(--light-brown));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: iconBounce 2s ease-in-out infinite;
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .facility-title {
            font-weight: 700;
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--cream);
        }

        .facility-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Gallery Section */
        #gallery {
            padding: 100px 0;
            background: var(--cream);
        }

        .gallery-item {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(139, 69, 19, 0.2);
            transition: all 0.3s ease;
            position: relative;
        }

        .gallery-item::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(212, 175, 55, 0.3), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover::after {
            opacity: 1;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.3);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        /* Testimonial Section */
        .testimonial {
            background: linear-gradient(135deg, #f9f5f0, var(--cream));
            padding: 100px 0;
        }

        .testimonial-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(139, 69, 19, 0.1);
            border-left: 5px solid var(--gold);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 4rem;
            color: var(--light-brown);
            opacity: 0.3;
            font-family: 'Playfair Display', serif;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(139, 69, 19, 0.2);
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: var(--dark-brown);
            position: relative;
            z-index: 2;
        }

        .testimonial-author {
            font-weight: 700;
            color: var(--mahogany);
        }

        .testimonial-rating {
            color: var(--gold);
            margin-top: 10px;
        }

        /* CTA Section */
        .cta {
            background: linear-gradient(135deg, rgba(60, 36, 21, 0.9), rgba(139, 69, 19, 0.9)), 
                        url("https://images.unsplash.com/photo-1501117716987-c8e1ecb2107b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80") no-repeat center center/cover;
            color: white;
            padding: 120px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300"><path d="M0 150c100-20 200 20 300 0s200-20 300 0 200 20 300 0 100-20 200 0V0H0v150z" fill="rgba(212,175,55,0.1)"/></svg>');
            animation: ctaWave 8s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes ctaWave {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(20px); }
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .cta-subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: var(--cream);
        }

        .cta-btn {
            background: linear-gradient(135deg, var(--gold), var(--mahogany));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 18px 40px;
            font-size: 1.2rem;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
        }

        .cta-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }

        .cta-btn:hover::before {
            left: 100%;
        }

        .cta-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.4);
            color: white;
            text-decoration: none;
        }

        /* Footer Enhancement */
        footer {
            background: linear-gradient(135deg, var(--espresso), var(--dark-brown));
            color: var(--cream);
            padding: 60px 0 30px;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"><path d="M0 50c100-10 200 10 300 0s200-10 300 0 200 10 300 0 100-10 100 0V0H0v50z" fill="rgba(212,175,55,0.1)"/></svg>');
            pointer-events: none;
        }

        .footer-content {
            position: relative;
            z-index: 2;
        }

        .social-icons a {
            color: var(--light-brown);
            font-size: 1.5rem;
            margin: 0 15px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .social-icons a:hover {
            color: var(--gold);
            transform: translateY(-3px) scale(1.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .floating-icon {
                display: none;
            }
            
            .luxury-ornament {
                display: none;
            }
            
            .cta-title {
                font-size: 2rem;
            }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--gold), var(--mahogany));
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--mahogany), var(--dark-brown));
        }
    </style>
</head>
<body>
    <!-- Wood Grain Background -->
    <div class="wood-grain"></div>

    <!-- Floating Icons -->
    <div class="floating-icons">
        <div class="floating-icon"><i class="fas fa-bed"></i></div>
        <div class="floating-icon"><i class="fas fa-concierge-bell"></i></div>
        <div class="floating-icon"><i class="fas fa-swimming-pool"></i></div>
        <div class="floating-icon"><i class="fas fa-utensils"></i></div>
        <div class="floating-icon"><i class="fas fa-spa"></i></div>
        <div class="floating-icon"><i class="fas fa-wine-glass"></i></div>
        <div class="floating-icon"><i class="fas fa-car"></i></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">The Heritage Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="#rooms">Kamar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#facilities">Fasilitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
                    <li class="nav-item">
                        <a href="{{ url('/register') }}" class="btn btn-reserve ms-3">
                            <i class="fas fa-calendar-check me-2"></i>Pesan Sekarang
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <!-- Luxury Ornaments -->
        <div class="luxury-ornament"><i class="fas fa-crown"></i></div>
        <div class="luxury-ornament"><i class="fas fa-gem"></i></div>
        <div class="luxury-ornament"><i class="fas fa-star"></i></div>
        <div class="hero-content" data-aos="fade-up">
            <h1 class="hero-title">Selamat Datang di The Heritage Hotel</h1>
            <p class="hero-subtitle">Kemewahan yang tak terlupakan dengan sentuhan tradisional yang elegan</p>
            <a href="{{ url('/register') }}" class="hero-cta">
                <i class="fas fa-key me-2"></i>Reservasi Eksklusif
            </a>
        </div>
    </section>

    <!-- Rooms -->
    <section id="rooms" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Kamar Eksklusif</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                    <div class="card room-card shadow-lg">
                        <div class="position-relative">
                                   <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
     class="card-img-top" 
     alt="Luxury Hotel Lobby">

                            <div class="room-badge">Premium</div>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title fw-bold mb-3">Heritage Deluxe Room</h5>
                            <p class="text-muted mb-3">Kamar mewah dengan pemandangan kota dan fasilitas premium</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="room-price mb-0">Rp 750.000 <small class="text-muted">/ malam</small></p>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card room-card shadow-lg">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top">
                            <div class="room-badge">Popular</div>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title fw-bold mb-3">Executive Superior</h5>
                            <p class="text-muted mb-3">Kenyamanan maksimal dengan desain interior yang elegan</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="room-price mb-0">Rp 550.000 <small class="text-muted">/ malam</small></p>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="card room-card shadow-lg">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top">
                            <div class="room-badge">Luxury</div>
                        </div>
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title fw-bold mb-3">Presidential Suite</h5>
                            <p class="text-muted mb-3">Suite mewah dengan ruang tamu terpisah dan balkon private</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="room-price mb-0">Rp 1.500.000 <small class="text-muted">/ malam</small></p>
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities -->
    <section id="facilities" class="py-5">
        <div class="container">
            <h2 class="section-title text-center text-white" data-aos="fade-up">Fasilitas Unggulan</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="flip-left">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-swimming-pool"></i></div>
                        <h5 class="facility-title">Infinity Pool</h5>
                        <p class="facility-description">Kolam renang tanpa batas dengan pemandangan sunset yang menakjubkan</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="200">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-dumbbell"></i></div>
                        <h5 class="facility-title">Fitness Center</h5>
                        <p class="facility-description">Gym modern dengan peralatan terlengkap dan instruktur profesional</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="400">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-utensils"></i></div>
                        <h5 class="facility-title">Fine Dining</h5>
                        <p class="facility-description">Restoran berkelas dunia dengan chef berpengalaman internasional</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="600">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-spa"></i></div>
                        <h5 class="facility-title">Royal Spa</h5>
                        <p class="facility-description">Spa mewah dengan treatment tradisional dan modern yang menyegarkan</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="800">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-car"></i></div>
                        <h5 class="facility-title">Valet Parking</h5>
                        <p class="facility-description">Layanan parkir VIP dengan keamanan 24 jam dan car wash gratis</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="1000">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-wine-glass"></i></div>
                        <h5 class="facility-title">Wine Cellar</h5>
                        <p class="facility-description">Koleksi wine premium dari berbagai belahan dunia untuk connoisseur</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="1200">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-users"></i></div>
                        <h5 class="facility-title">Meeting Room</h5>
                        <p class="facility-description">Ruang pertemuan eksklusif dengan teknologi canggih untuk acara bisnis</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="1400">
                    <div class="facility-item h-100">
                        <div class="facility-icon"><i class="fas fa-concierge-bell"></i></div>
                        <h5 class="facility-title">Concierge 24/7</h5>
                        <p class="facility-description">Layanan concierge premium siap membantu kebutuhan Anda kapan saja</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section id="gallery" class="py-5">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Galeri Hotel</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Lobby">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Restaurant">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80"  alt="Pool">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Spa">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Bar">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="1000">
                    <div class="gallery-item">
                       <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=800&q=80"   alt="Garden">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section id="testimoni" class="testimonial">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Apa Kata Tamu Kami</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="testimonial-card h-100">
                        <p class="testimonial-text">"Pengalaman menginap yang luar biasa. Kamar sangat mewah dan nyaman, staff ramah sekali. The Heritage Hotel benar-benar hotel bintang 5 yang sesungguhnya!"</p>
                        <div class="testimonial-author">- Andi Wijaya, CEO Jakarta</div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card h-100">
                        <p class="testimonial-text">"Makanan di restoran hotel sangat lezat, terutama breakfast buffet yang sangat lengkap. Spa-nya juga amazing! Sangat recommended untuk liburan keluarga."</p>
                        <div class="testimonial-author">- Sinta Maharani, Designer Bandung</div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="testimonial-card h-100">
                        <p class="testimonial-text">"Pelayanan concierge yang luar biasa, membantu mengatur semua kebutuhan bisnis saya. Fasilitas meeting room modern dan lengkap. Definitely will come back!"</p>
                        <div class="testimonial-author">- Budi Santoso, Direktur Surabaya</div>
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="cta-content" data-aos="zoom-in">
            <h2 class="cta-title">Siap untuk Pengalaman Kemewahan?</h2>
            <p class="cta-subtitle">Dapatkan diskon hingga 25% untuk pemesanan early bird dan nikmati fasilitas eksklusif kami</p>
            <a href="{{ url('/register') }}" class="cta-btn">
                <i class="fas fa-crown me-2"></i>Pesan Kamar Premium Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container footer-content">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start">
                    <h4 class="mb-3" style="color: var(--gold); font-family: 'Playfair Display', serif;">The Heritage Hotel</h4>
                    <p class="mb-4">Menghadirkan kemewahan tradisional dengan sentuhan modern untuk pengalaman menginap yang tak terlupakan.</p>
                    <p>&copy; 2025 The Heritage Hotel. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <h5 class="mb-3">Follow Us</h5>
                    <div class="social-icons mb-4">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div>
                        <p><i class="fas fa-phone me-2"></i>+62 21 1234 5678</p>
                        <p><i class="fas fa-envelope me-2"></i>info@heritagehotel.com</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i>Jl. Luxury Boulevard No. 88, Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-out-cubic',
            once: true
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            if (hero) {
                hero.style.transform = `translateY(${scrolled * 0.5}px)`;
            }
        });

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
    </script>
</body>
</html>