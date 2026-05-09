<?php
// --- PHP DATA LOGIC ---
// Array of perfumes to dynamically generate the Featured Section
$perfumes = [
    [
        "name" => "DESTINY",
        "icon" => "fa-compass",
        "desc" => "A scent that is meant to be.",
        "emotion" => "Fate"
    ],
    [
        "name" => "SERENADE",
        "icon" => "fa-spa", // Flower-like icon
        "desc" => "Romantic, gentle, floral.",
        "emotion" => "Romance"
    ],
    [
        "name" => "RAINDROP",
        "icon" => "fa-tint",
        "desc" => "Fresh, aquatic, earthy.",
        "emotion" => "Calmness"
    ],
    [
        "name" => "SUNSET",
        "icon" => "fa-sun",
        "desc" => "Warm amber vanilla.",
        "emotion" => "Passion"
    ],
    [
        "name" => "SANCTUARY",
        "icon" => "fa-tree",
        "desc" => "Comforting woody scent.",
        "emotion" => "Peace"
    ]
];

// Array of brand benefits
$benefits = [
    "Imported oils from France",
    "Long-lasting fragrance",
    "Skin-safe ingredients",
    "Affordable luxury",
    "Unisex collections"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AINZ Fragrances | Fragrances for the Unforgettable</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- CSS VARIABLES --- */
        :root {
            --matte-black: #121212;
            --soft-gold: #D4AF37;
            --rose-gold: #B76E79;
            --ivory-white: #F8F5F0;
            --dark-gray: #2A2A2A;
            
            --font-title: 'Cormorant Garamond', serif;
            --font-body: 'Montserrat', sans-serif;
        }

        /* --- GLOBAL STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--ivory-white);
            color: var(--matte-black);
            line-height: 1.6;
        }

        h1, h2, h3, h4 {
            font-family: var(--font-title);
            font-weight: 400;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- TOP BAR NAVIGATION --- */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 25px 0;
            z-index: 1000;
            transition: all 0.4s ease-in-out;
            background: transparent;
        }

        .top-bar.scrolled {
            background: rgba(18, 18, 18, 0.95);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            border-bottom: 1px solid rgba(212, 175, 55, 0.3);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .nav-logo {
            font-family: var(--font-title);
            font-size: 2.2rem;
            color: var(--ivory-white);
            letter-spacing: 4px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 40px;
        }

        .nav-links li a {
            color: var(--ivory-white);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 400;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -5px;
            left: 0;
            background-color: var(--soft-gold);
            transition: width 0.3s ease;
        }

        .nav-links li a:hover {
            color: var(--soft-gold);
        }

        .nav-links li a:hover::after {
            width: 100%;
        }

        .hamburger {
            display: none;
            color: var(--ivory-white);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* --- HERO SECTION --- */
        .hero {
            background-color: var(--matte-black);
            color: var(--ivory-white);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 2px solid var(--soft-gold);
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 800px; 
            height: 800px;
            background: radial-gradient(circle, rgba(212,175,55,0.15) 0%, rgba(18,18,18,0) 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 0;
        }

        .hero-content {
            z-index: 1;
            width: 100%;
            padding: 0 20px;
        }

        /* Adjusted margin-bottom to bring the text closer */
        .hero-logo {
            width: 100%;
            max-width: 750px; 
            height: auto;
            margin-bottom: -120px; /* Reduced from 25px */
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Adjusted margin-top to pull it up towards the logo */
        .hero p {
            font-size: 1.3rem;
            font-style: italic;
            font-family: var(--font-title);
            color: var(--rose-gold);
            margin-top: -15px; /* Negative margin pulls it closer */
            margin-bottom: 40px;
            letter-spacing: 1.5px;
        }

        .btn {
            display: inline-block;
            padding: 12px 35px;
            font-family: var(--font-body);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 1px solid var(--soft-gold);
            background: transparent;
            color: var(--soft-gold);
            transition: all 0.4s ease;
            cursor: pointer;
            margin: 0 10px;
        }

        .btn:hover {
            background: var(--soft-gold);
            color: var(--matte-black);
        }
        
        .btn-rose {
            border-color: var(--rose-gold);
            color: var(--rose-gold);
        }

        .btn-rose:hover {
            background: var(--rose-gold);
            color: var(--ivory-white);
        }

        /* --- SECTION PADDING & TITLES --- */
        section {
            padding: 120px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: var(--matte-black);
            position: relative;
            letter-spacing: 2px;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 2px;
            background-color: var(--soft-gold);
            margin: 20px auto 0;
        }

        /* --- FEATURED SCENTS --- */
        .scents-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .scent-card {
            background: #fff;
            width: 260px;
            padding: 50px 20px;
            text-align: center;
            border: 1px solid #eaeaea;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
        }

        .scent-card:hover {
            transform: translateY(-10px);
            border-color: var(--soft-gold);
            box-shadow: 0 15px 40px rgba(0,0,0,0.06);
        }

        .scent-icon {
            font-size: 2.2rem;
            color: var(--rose-gold);
            margin-bottom: 25px;
            transition: transform 0.4s ease;
        }

        .scent-card:hover .scent-icon {
            transform: scale(1.1);
        }

        .scent-name {
            font-size: 1.5rem;
            margin-bottom: 5px;
            letter-spacing: 2px;
        }

        .scent-emotion {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--soft-gold);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
            display: block;
        }

        .scent-desc {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 25px;
            padding: 0 10px;
        }

        .scent-card .btn {
            font-size: 0.75rem;
            padding: 10px 25px;
            color: var(--matte-black);
            border-color: var(--matte-black);
        }

        .scent-card .btn:hover {
            background: var(--matte-black);
            color: var(--ivory-white);
        }

        /* --- ABOUT SECTION --- */
        .about-section {
            background-color: var(--matte-black);
            color: var(--ivory-white);
            text-align: center;
        }

        .about-section .section-title {
            color: var(--ivory-white);
        }

        .about-banner-container {
            max-width: 900px;
            margin: 0 auto 50px auto;
            border: 1px solid rgba(212, 175, 55, 0.3);
            padding: 10px;
            background: rgba(255, 255, 255, 0.02);
        }

        .about-banner {
            width: 100%;
            height: auto;
            display: block;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.5));
        }

        .about-text {
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.3rem;
            font-family: var(--font-title);
            font-style: italic;
            color: #ccc;
            line-height: 1.8;
        }

        .about-text strong {
            color: var(--soft-gold);
            font-weight: normal;
            font-size: 1.5rem;
        }

        /* --- WHY CHOOSE US --- */
        .benefits-section {
            background-color: var(--ivory-white);
        }
        
        .benefits-list {
            list-style: none;
            max-width: 500px;
            margin: 0 auto;
        }

        .benefits-list li {
            font-size: 1.1rem;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            color: var(--dark-gray);
            font-weight: 500;
        }

        .benefits-list li i {
            color: var(--soft-gold);
            margin-right: 20px;
            font-size: 1.2rem;
            background: var(--matte-black);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* --- FOOTER --- */
        footer {
            background-color: var(--matte-black);
            color: var(--ivory-white);
            text-align: center;
            padding: 80px 0 40px;
            border-top: 1px solid #222;
        }

        .social-links {
            margin-bottom: 40px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border: 1px solid var(--dark-gray);
            border-radius: 50%;
            font-size: 1.2rem;
            margin: 0 10px;
            color: var(--ivory-white);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            border-color: var(--rose-gold);
            color: var(--rose-gold);
            transform: translateY(-3px);
        }

        .footer-logo {
            font-family: var(--font-title);
            font-size: 2.5rem;
            letter-spacing: 4px;
            margin-bottom: 5px;
            display: block;
        }

        .footer-copy {
            font-size: 0.8rem;
            color: #666;
            margin-top: 40px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* --- RESPONSIVE DESIGN --- */
        @media (max-width: 768px) {
            .hero-logo { max-width: 90%; }
            .btn { margin-bottom: 15px; display: block; width: 100%; max-width: 250px; margin-left: auto; margin-right: auto; }
            
            .nav-links {
                display: none; 
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--matte-black);
                padding: 20px 0;
                text-align: center;
                border-bottom: 1px solid var(--soft-gold);
            }

            .nav-links.active {
                display: flex; 
            }

            .hamburger {
                display: block;
            }

            .nav-container { padding: 0 20px; }
        }
    </style>
</head>
<body>

    <nav class="top-bar" id="navbar">
        <div class="nav-container">
            <a href="#home" class="nav-logo">AINZ</a>
            <ul class="nav-links" id="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#collection">Scents</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#benefits">Quality</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <header id="home" class="hero">
        <div class="hero-content">
            <img src="logo/mainlogo.png" alt="AINZ Fragrances Logo" class="hero-logo">
            <p>“Fragrances for the Unforgettable”</p>
            <div>
                <a href="#collection" class="btn">Shop Collection</a>
                <a href="#about" class="btn btn-rose">Discover Your Scent</a>
            </div>
        </div>
    </header>

    <section id="collection" class="container">
        <h2 class="section-title">Signature Collection</h2>
        <div class="scents-grid">
            <?php foreach ($perfumes as $perfume): ?>
                <div class="scent-card">
                    <i class="fas <?php echo $perfume['icon']; ?> scent-icon"></i>
                    <h3 class="scent-name"><?php echo $perfume['name']; ?></h3>
                    <span class="scent-emotion"><?php echo $perfume['emotion']; ?></span>
                    <p class="scent-desc"><?php echo $perfume['desc']; ?></p>
                    <a href="#" class="btn">Shop Now</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="about" class="about-section">
        <div class="container">
            <h2 class="section-title">The Brand</h2>
            
            <div class="about-banner-container">
                <img src="logo/banner.png" alt="AINZ Signature Scents Banner" class="about-banner" onerror="this.style.display='none'">
            </div>

            <p class="about-text">
                <strong>AINZ Fragrances</strong> was created to turn emotions into unforgettable scents.<br><br>
                Inspired by elegance, memories, and identity — every bottle tells a story. We believe that true luxury lies not just in the ingredients, but in the moments our fragrances help you create.
            </p>
        </div>
    </section>

    <section id="benefits" class="benefits-section">
        <div class="container">
            <h2 class="section-title">Why Choose Us</h2>
            <ul class="benefits-list">
                <?php foreach ($benefits as $benefit): ?>
                    <li><i class="fas fa-check"></i> <?php echo $benefit; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="social-links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-tiktok"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="far fa-envelope"></i></a>
            </div>
            <span class="footer-logo">AINZ</span>
            <p style="color: var(--soft-gold); font-size: 0.9rem; font-style: italic;">Fragrances for the Unforgettable</p>
            <p class="footer-copy">&copy; <?php echo date("Y"); ?> AINZ Fragrances. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Sticky Navbar Effect on Scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile Hamburger Menu Toggle
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('nav-links');
        
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>

</body>
</html>