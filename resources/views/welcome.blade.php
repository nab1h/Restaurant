<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->site_title ?? 'Aurum | Fine Dining' }}</title>

    <meta name="description" content="{{ $setting->meta_description ?? 'Luxury Fine Dining Experience' }}">

    <!-- Google Fonts for Luxury Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Montserrat:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Icons -->
    @if($setting->icon_180)
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . $setting->icon_180) }}">
    @endif

    @if($setting->icon_32)
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $setting->icon_32) }}">
    @endif

    @if($setting->icon_16)
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $setting->icon_16) }}">
    @endif

    @if($setting->manifest)
    <link rel="manifest" href="{{ asset('storage/' . $setting->manifest) }}">
    @endif


    <!-- GSAP for Advanced Animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <style>
        :root {
            /* Color Palette */
            --bg-dark: #0a0a0a;
            --bg-charcoal: #121212;
            --bg-card: rgba(255, 255, 255, 0.03);
            --gold-primary: #D4AF37;
            --gold-light: #F4DF8D;
            --gold-dim: #8a701e;
            --text-white: #ffffff;
            --text-muted: #a0a0a0;
            --font-serif: 'Cormorant Garamond', serif;
            --font-sans: 'Montserrat', sans-serif;
            --transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        /* --- Reset & Base Styles --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-white);
            font-family: var(--font-sans);
            overflow-x: hidden;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-serif);
            font-weight: 400;
            letter-spacing: 0.05em;
        }

        a {
            text-decoration: none;
            color: inherit;
            transition: var(--transition);
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        /* --- Utility Classes --- */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-padding {
            padding: 80px 0;
        }

        .text-gold {
            color: var(--gold-primary);
        }

        .btn {
            display: inline-block;
            padding: 14px 35px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            background: transparent;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            z-index: 1;
            text-align: center;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: var(--gold-primary);
            z-index: -1;
            transition: var(--transition);
        }

        .btn:hover::before {
            width: 100%;
        }

        .btn:hover {
            color: var(--bg-dark);
        }

        .btn-fill {
            background: var(--gold-primary);
            color: var(--bg-dark);
        }

        .btn-fill:hover {
            background: var(--text-white);
            border-color: var(--text-white);
            color: var(--bg-dark);
        }

        /* --- Navigation --- */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 25px 0;
            transition: var(--transition);
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(10, 10, 10, 0.95);
            padding: 15px 0;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: var(--font-serif);
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-white);
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 1001;
        }

        .logo-img {
            height: 40px;
            width: 80px;
        }

        .logo span {
            color: var(--gold-primary);
        }

        .nav-links {
            display: flex;
            gap: 40px;
        }

        .nav-link {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0%;
            height: 1px;
            background: var(--gold-primary);
            transition: var(--transition);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .lang-switch {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            z-index: 1001;
        }

        /* Mobile Menu Overlay */
        .nav-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .nav-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* --- Hero Section --- */
        .hero {
            height: 100vh;
            /* Fix for mobile browser address bar */
            height: 100dvh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.6;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.8) 100%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: var(--gold-primary);
            margin-bottom: 20px;
            display: block;
            opacity: 0;
            transform: translateY(20px);
        }

        .hero-title {
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(30px);
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            opacity: 0;
            transform: translateY(40px);
        }

        /* --- About Section --- */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image-wrapper {
            position: relative;
            overflow: hidden;
        }

        .about-image {
            width: 100%;
            border-radius: 4px;
            transition: transform 1s ease;
        }

        .about-image-wrapper:hover .about-image {
            transform: scale(1.05);
        }

        .about-text h2 {
            font-size: 3rem;
            margin-bottom: 25px;
            color: var(--gold-primary);
        }

        .about-text p {
            color: var(--text-muted);
            margin-bottom: 30px;
            font-size: 1.05rem;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 30px;
        }

        .stat-item h4 {
            font-size: 2.5rem;
            color: var(--text-white);
        }

        .stat-item p {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }

        /* --- Menu Section --- */
        .menu-section {
            background: var(--bg-charcoal);
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 3.5rem;
            color: var(--gold-primary);
            margin-bottom: 10px;
        }

        .menu-filters {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 50px;
        }

        .filter-btn {
            background: none;
            border: none;
            color: var(--text-muted);
            font-family: var(--font-serif);
            font-size: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .filter-btn.active,
        .filter-btn:hover {
            color: var(--gold-primary);
        }

        .filter-btn::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 1px;
            background: var(--gold-primary);
            transition: width 0.3s;
        }

        .filter-btn.active::after {
            width: 100%;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .menu-item {
            background: var(--bg-card);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            overflow: hidden;
            transition: var(--transition);
            opacity: 0;
            transform: translateY(20px);
        }

        .menu-item.show {
            animation: fadeInItem 0.6s forwards;
        }

        @keyframes fadeInItem {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .menu-item:hover {
            transform: translateY(-10px);
            border-color: var(--gold-dim);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .menu-img-container {
            height: 250px;
            overflow: hidden;
        }

        .menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .menu-item:hover .menu-img {
            transform: scale(1.1);
        }

        .menu-details {
            padding: 25px;
        }

        .dish-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 10px;
            border-bottom: 1px dotted rgba(255, 255, 255, 0.1);
            padding-bottom: 10px;
        }

        .dish-name {
            font-family: var(--font-serif);
            font-size: 1.5rem;
            font-weight: 600;
        }

        .dish-price {
            color: var(--gold-primary);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .dish-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* --- Gallery Section --- */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 300px;
            gap: 15px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-item:nth-child(1) {
            grid-column: span 2;
            grid-row: span 2;
            height: 100%;
        }

        .gallery-item:nth-child(2) {
            grid-column: span 1;
        }

        .gallery-item:nth-child(3) {
            grid-column: span 1;
        }

        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: var(--transition);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gallery-icon {
            color: var(--gold-primary);
            font-size: 2rem;
            transform: scale(0);
            transition: var(--transition);
        }

        .gallery-item:hover .gallery-img {
            transform: scale(1.1);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-item:hover .gallery-icon {
            transform: scale(1);
        }

        /* --- Modern Testimonials Section Design --- */
        .modern-testimonials {
            position: relative;
            background-image: url('https://picsum.photos/seed/restaurant_dark_luxury/1920/1080');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 120px 0;
            overflow: hidden;
        }

        .modern-testimonials::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(10, 10, 10, 0.9), rgba(10, 10, 10, 0.95));
            z-index: 1;
        }

        .testimonial-slider {
            position: relative;
            z-index: 2;
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .testimonial-card {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0;
            visibility: hidden;
            transform: scale(0.95) translateY(20px);
            transition: all 0.8s cubic-bezier(0.25, 1, 0.5, 1);
            padding: 40px;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .testimonial-card.active {
            opacity: 1;
            visibility: visible;
            transform: scale(1) translateY(0);
            position: relative;
        }

        .big-quote {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            font-family: 'Cormorant Garamond', serif;
            font-size: 8rem;
            color: var(--gold-primary);
            opacity: 0.1;
            line-height: 1;
            pointer-events: none;
            z-index: -1;
        }

        .user-img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--gold-primary);
            padding: 4px;
            margin-bottom: 25px;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
            margin-left: auto;
            margin-right: auto;
        }

        .t-stars {
            margin-bottom: 25px;
            color: var(--gold-primary);
            font-size: 0.9rem;
            letter-spacing: 2px;
        }

        .testimonial-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            line-height: 1.4;
            font-style: italic;
            color: #fff;
            margin-bottom: 30px;
            min-height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-info {
            position: relative;
            display: inline-block;
        }

        .user-name {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--gold-primary);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-role {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.5);
            font-family: 'Montserrat', sans-serif;
        }

        .slider-dots {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 40px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .dot:hover {
            background: rgba(212, 175, 55, 0.4);
        }

        .dot.active {
            background: var(--gold-primary);
            transform: scale(1.3);
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
        }

        /* --- Testimonial Form Styles --- */
        .testimonial-form-section {
            background: #0a0a0a;
            padding: 100px 0;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .form-layout {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 60px;
            align-items: center;
        }

        .form-intro h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            color: var(--gold-primary);
            margin-bottom: 20px;
            line-height: 1.1;
        }

        .form-intro p {
            color: #888;
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .review-form-card {
            background: #121212;
            padding: 50px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        .input-group {
            margin-bottom: 25px;
        }

        .review-input {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #333;
            padding: 15px 0;
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .review-input:focus {
            outline: none;
            border-bottom-color: var(--gold-primary);
        }

        .review-input::placeholder {
            color: #555;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 30px;
        }

        [dir="rtl"] .star-rating {
            justify-content: flex-start;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            font-size: 1.8rem;
            color: #333;
            cursor: pointer;
            transition: color 0.2s;
            /* Make tap targets bigger for mobile */
            padding: 5px;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: var(--gold-primary);
        }

        .btn-submit-review {
            background: var(--gold-primary);
            color: #000;
            border: none;
            padding: 15px 40px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            border-radius: 4px;
        }

        .btn-submit-review:hover {
            background: #fff;
            box-shadow: 0 0 20px rgba(212, 175, 55, 0.4);
        }

        .error-msg {
            color: #ff4d4d;
            font-size: 0.8rem;
            margin-top: 5px;
            display: block;
        }

        /* --- Reservation Section --- */
        .reservation-form {
            background: rgba(18, 18, 18, 0.9);
            backdrop-filter: blur(15px);
            padding: 60px;
            max-width: 700px;
            margin: 0 auto;
            border: 1px solid rgba(212, 175, 55, 0.2);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-control {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 15px 0;
            color: var(--text-white);
            font-family: var(--font-sans);
            font-size: 16px;
            /* Prevents auto-zoom on iOS */
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-bottom-color: var(--gold-primary);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        select.form-control {
            color: rgba(255, 255, 255, 0.7);
        }

        /* --- Contact & Footer --- */
        .contact-section {
            padding-bottom: 0;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .contact-info {
            padding: 60px;
            background: var(--bg-charcoal);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .contact-icon {
            color: var(--gold-primary);
            font-size: 1.5rem;
            margin-right: 20px;
            margin-top: 5px;
        }

        .contact-details h5 {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: var(--text-white);
        }

        .contact-details p {
            color: var(--text-muted);
        }

        .social-links {
            margin-top: 40px;
        }

        .social-link {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 45px;
            height: 45px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-right: 15px;
            transition: var(--transition);
        }

        .social-link:hover {
            background: var(--gold-primary);
            border-color: var(--gold-primary);
            color: var(--bg-dark);
        }

        .map-wrapper {
            overflow: hidden;
        }

        .map-frame {
            width: 100%;
            height: 100%;
            min-height: 450px;
            border: 0;
            filter: grayscale(100%) invert(92%) contrast(83%);
        }

        footer {
            background: var(--bg-dark);
            padding: 40px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            text-align: center;
        }

        .footer-logo {
            font-family: var(--font-serif);
            font-size: 1.8rem;
            color: var(--text-white);
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .copyright {
            color: var(--text-muted);
            font-size: 0.8rem;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .newsletter-form input {
            padding: 12px 15px;
            border: 1px solid #333;
            background: #000;
            color: #fff;
            min-width: 250px;
            border-radius: 4px;
            font-size: 14px;
        }

        .newsletter-form button {
            padding: 12px 25px;
            font-size: 0.75rem;
        }

        /* --- RTL Support --- */
        [dir="rtl"] {
            text-align: right;
        }

        [dir="rtl"] .navbar .logo {
            margin-right: 0;
            margin-left: 0;
        }

        [dir="rtl"] .nav-links {
            gap: 40px;
        }

        [dir="rtl"] .about-image-wrapper {
            order: 2;
        }

        [dir="rtl"] .about-text {
            order: 1;
        }

        [dir="rtl"] .dish-header {
            flex-direction: row-reverse;
        }

        [dir="rtl"] .contact-icon {
            margin-right: 0;
            margin-left: 20px;
        }

        [dir="rtl"] .social-link {
            margin-right: 0;
            margin-left: 15px;
        }

        /* --- Modern FAQ Section Styles --- */
        .faq-section-wrapper {
            background: linear-gradient(180deg, #0a0a0a 0%, #050505 100%);
            position: relative;
            overflow: hidden;
        }

        .faq-section-wrapper::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .faq-header h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            color: #fff;
            margin-bottom: 10px;
        }

        .faq-header p {
            color: var(--gold-primary);
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .faq-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            margin-bottom: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
        }

        .faq-card:hover {
            border-color: rgba(212, 175, 55, 0.2);
            background: rgba(255, 255, 255, 0.04);
        }

        .faq-btn {
            width: 100%;
            background: transparent;
            border: none;
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            text-align: right;
            transition: background 0.3s;
        }

        .faq-btn:hover {
            background: rgba(255, 255, 255, 0.01);
        }

        .faq-question {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            color: #e0e0e0;
            font-weight: 600;
            transition: color 0.3s;
            text-align: start;
        }

        .faq-card.active .faq-question {
            color: var(--gold-primary);
        }

        .faq-icon {
            font-size: 1.2rem;
            color: var(--gold-primary);
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 50%;
            flex-shrink: 0;
            margin-left: 15px;
        }

        [dir="rtl"] .faq-icon {
            margin-left: 0;
            margin-right: 15px;
        }

        .faq-card.active .faq-icon {
            transform: rotate(135deg);
            background: var(--gold-primary);
            color: #000;
        }

        .faq-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out, padding 0.4s ease;
            background: rgba(0, 0, 0, 0.2);
        }

        .faq-content {
            padding: 0 25px 25px 25px;
            color: #a0a0a0;
            line-height: 1.8;
            font-size: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.03);
            margin-top: 10px;
            padding-top: 20px;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.4s ease 0.1s, transform 0.4s ease 0.1s;
        }

        .faq-card.active .faq-content {
            opacity: 1;
            transform: translateY(0);
        }

        .faq-card::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 4px;
            height: 100%;
            background: var(--gold-primary);
            transform: scaleY(0);
            transition: transform 0.3s ease;
            transform-origin: bottom;
        }

        .faq-card.active::after {
            transform: scaleY(1);
        }

        [dir="rtl"] .faq-card::after {
            right: auto;
            left: 0;
        }

        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 3.5rem;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-item:nth-child(1) {
                grid-column: span 2;
            }

            .contact-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .section-padding {
                padding: 60px 0;
            }

            .nav-links {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100%;
                background: var(--bg-charcoal);
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transition: right 0.4s ease-in-out;
                z-index: 999;
            }

            [dir="rtl"] .nav-links {
                right: auto;
                left: -100%;
                transition: left 0.4s ease-in-out;
            }

            .nav-links.active {
                right: 0;
            }

            [dir="rtl"] .nav-links.active {
                left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .hero-title {
                font-size: 2.8rem;
            }

            .hero-subtitle {
                font-size: 1rem;
                letter-spacing: 3px;
            }

            .hero-buttons {
                flex-direction: column;
                gap: 15px;
                align-items: center;
            }

            .about-text h2,
            .section-header h2,
            .faq-header h2 {
                font-size: 2.2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .reservation-form {
                padding: 30px 20px;
            }

            .stats-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 15px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
                grid-auto-rows: 250px;
            }

            .gallery-item:nth-child(1) {
                grid-column: span 1;
                grid-row: span 1;
            }

            .menu-filters {
                gap: 15px;
                flex-wrap: wrap;
            }

            .filter-btn {
                font-size: 1.2rem;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .modern-testimonials {
                padding: 60px 0;
                background-attachment: scroll;
                /* Fix for iOS parallax bug */
            }

            .testimonial-text {
                font-size: 1.4rem;
                min-height: auto;
            }

            .big-quote {
                font-size: 5rem;
                top: 0;
            }

            .testimonial-card {
                padding: 20px;
            }

            .form-layout {
                grid-template-columns: 1fr;
            }

            .form-intro {
                text-align: center;
                margin-bottom: 30px;
            }

            .review-form-card {
                padding: 30px 20px;
            }

            .contact-info {
                padding: 30px 20px;
            }

            .map-frame {
                min-height: 300px;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .btn {
                padding: 12px 25px;
                font-size: 0.75rem;
                letter-spacing: 1px;
            }
        }


        /* --- Luxury Limited Offer Section --- */
        .luxury-offer-wrapper {
            position: relative;
            padding: 120px 0;
            background: linear-gradient(180deg, #0a0a0a 0%, #050505 50%, #0a0a0a 100%);
            overflow: hidden;
        }


        .luxury-offer-wrapper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .luxury-offer-layout {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }


        .luxury-offer-image-side {
            position: relative;
        }

        .luxury-img-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            height: 80%;
            background: rgba(212, 175, 55, 0.2);
            filter: blur(80px);
            border-radius: 50%;
            z-index: -1;
            animation: pulseGlow 4s infinite alternate;
        }

        @keyframes pulseGlow {
            0% {
                opacity: 0.3;
                transform: translate(-50%, -50%) scale(0.9);
            }

            100% {
                opacity: 0.6;
                transform: translate(-50%, -50%) scale(1.1);
            }
        }

        .luxury-offer-img {
            width: 100%;
            height: 550px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid rgba(212, 175, 55, 0.3);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8);
            transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .luxury-offer-img:hover {
            transform: scale(1.03);
        }

        .luxury-offer-badge {
            position: absolute;
            top: 25px;
            right: 25px;
            background: rgba(10, 10, 10, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid var(--gold-primary);
            color: var(--gold-primary);
            padding: 10px 25px;
            font-family: var(--font-sans);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-radius: 50px;
            animation: badgePulse 2s infinite;
        }

        .luxury-offer-badge i {
            margin-right: 8px;
        }

        @keyframes badgePulse {
            0% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(212, 175, 55, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(212, 175, 55, 0);
            }
        }


        .luxury-offer-content {
            padding: 20px 0;
        }

        .luxury-eyebrow {
            color: var(--gold-primary);
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 6px;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .luxury-offer-title {
            font-family: var(--font-serif);
            font-size: 4rem;
            line-height: 1.1;
            color: var(--text-white);
            margin-bottom: 25px;
            background: linear-gradient(45deg, #fff, #D4AF37);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .luxury-offer-desc {
            color: var(--text-muted);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 35px;
        }

        .luxury-pricing {
            margin-bottom: 45px;
            display: flex;
            align-items: baseline;
            gap: 20px;
        }

        .luxury-old-price {
            font-size: 1.8rem;
            color: #666;
            text-decoration: line-through;
        }

        .luxury-new-price {
            font-size: 3.5rem;
            font-family: var(--font-serif);
            color: var(--gold-primary);
            font-weight: 600;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.4);
        }


        .luxury-countdown-head {
            color: #888;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .luxury-countdown {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 50px;
        }

        .luxury-time-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 20px 25px;
            text-align: center;
            min-width: 90px;
            backdrop-filter: blur(15px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }


        .luxury-time-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.5), transparent);
        }

        .lux-time-num {
            font-family: var(--font-serif);
            font-size: 3rem;
            color: var(--text-white);
            font-weight: 600;
            display: block;
            line-height: 1;
        }

        .lux-time-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--gold-primary);
            margin-top: 8px;
            display: block;
        }

        .luxury-time-sep {
            font-size: 3rem;
            color: rgba(212, 175, 55, 0.3);
            font-weight: 100;
            margin-bottom: 25px;
        }

        .luxury-offer-btn {
            padding: 18px 45px;
            font-size: 1rem;
            letter-spacing: 3px;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }


        @media (max-width: 992px) {
            .luxury-offer-layout {
                grid-template-columns: 1fr;
                gap: 50px;
            }

            .luxury-offer-title {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .luxury-offer-wrapper {
                padding: 80px 0;
            }

            .luxury-offer-title {
                font-size: 2.5rem;
            }

            .luxury-new-price {
                font-size: 2.5rem;
            }

            .luxury-offer-img {
                height: 350px;
            }

            .luxury-countdown {
                gap: 8px;
            }

            .luxury-time-box {
                padding: 15px 10px;
                min-width: 70px;
                border-radius: 8px;
            }

            .lux-time-num {
                font-size: 2.2rem;
            }

            .luxury-time-sep {
                font-size: 2rem;
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">
                @if($setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->site_name }}" class="logo-img w-auto">
                @else
                <i class="fas fa-utensils text-[#E60914]"></i>
                @endif
            </a>
            <div class="mobile-toggle" id="mobile-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-links" id="nav-links">
                <li><a href="#home" class="nav-link" data-lang="nav_home">Home</a></li>
                <li><a href="#about" class="nav-link" data-lang="nav_about">About</a></li>
                <li><a href="#menu" class="nav-link" data-lang="nav_menu">Menu</a></li>
                <li><a href="#gallery" class="nav-link" data-lang="nav_gallery">Gallery</a></li>
                <li><a href="#reservation" class="nav-link" data-lang="nav_reservation">Book</a></li>
                <li><a href="#contact" class="nav-link" data-lang="nav_contact">Contact</a></li>
                <li>
                    <div class="lang-switch" id="lang-switch">
                        <i class="fas fa-globe"></i>
                        <span id="current-lang">EN</span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="nav-overlay" id="nav-overlay"></div>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="{{ asset('storage/' . $heroVideo->path) }}" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <span class="hero-subtitle"
                data-content-en="{{ $content->hero_subtitle_en }}"
                data-content-ar="{{ $content->hero_subtitle_ar }}">
                {{ $content->hero_subtitle_en }}
            </span>
            <h1 class="hero-title"
                data-content-en="{{ $content->hero_title_en }}"
                data-content-ar="{{ $content->hero_title_ar }}">
                {{ $content->hero_title_en }}
            </h1>
            <div class="hero-buttons">
                <a href="#reservation" class="btn btn-fill" data-lang="btn_book">Book a Table</a>
                <a href="#menu" class="btn" data-lang="btn_menu">View Menu</a>
            </div>
        </div>
    </section>

    <!-- Limited Time Offer - Luxury Section -->
    @if(isset($limitedOffer))
    <section id="luxury-offer" class="luxury-offer-wrapper">
        <div class="container">
            <div class="luxury-offer-layout">

                <!-- جانب الصورة مع التأثيرات -->
                <div class="luxury-offer-image-side">
                    <div class="luxury-img-glow"></div>
                    <img src="{{ $limitedOffer->image ? asset('storage/' . $limitedOffer->image) : 'https://picsum.photos/seed/luxury_dish/600/700' }}" alt="{{ $limitedOffer->name_en }}" class="luxury-offer-img">

                    <!-- شارة العرض النابضة -->
                    <div class="luxury-offer-badge">
                        <i class="fas fa-bolt"></i>
                        <span data-lang="lux_offer_badge">Limited Time</span>
                    </div>
                </div>

                <!-- جانب التفاصيل والتايمر -->
                <div class="luxury-offer-content">
                    <p class="luxury-eyebrow" data-lang="lux_offer_eyebrow">Don't Miss Out</p>

                    <h2 class="luxury-offer-title"
                        data-content-en="{{ $limitedOffer->name_en }}"
                        data-content-ar="{{ $limitedOffer->name_ar }}">
                        {{ $limitedOffer->name_en }}
                    </h2>

                    <p class="luxury-offer-desc"
                        data-content-en="{{ $limitedOffer->description_en }}"
                        data-content-ar="{{ $limitedOffer->description_ar }}">
                        {{ $limitedOffer->description_en }}
                    </p>

                    <!-- الأسعار -->
                    <div class="luxury-pricing">
                        <span class="luxury-old-price">${{ $limitedOffer->price }}</span>
                        <span class="luxury-new-price">${{ $limitedOffer->discount_price }}</span>
                    </div>

                    <!-- مؤقت العد التنازلي الفاخر -->
                    <div class="luxury-countdown-head" data-lang="lux_countdown_head">Offer Ends In:</div>
                    <div class="luxury-countdown" id="luxury-timer" data-expires="{{ $limitedOffer->offer_expires_at }}">
                        <div class="luxury-time-box">
                            <span class="lux-time-num" id="lux-days">00</span>
                            <span class="lux-time-label" data-lang="lux_days">Days</span>
                        </div>
                        <div class="luxury-time-sep">:</div>
                        <div class="luxury-time-box">
                            <span class="lux-time-num" id="lux-hours">00</span>
                            <span class="lux-time-label" data-lang="lux_hours">Hours</span>
                        </div>
                        <div class="luxury-time-sep">:</div>
                        <div class="luxury-time-box">
                            <span class="lux-time-num" id="lux-mins">00</span>
                            <span class="lux-time-label" data-lang="lux_mins">Mins</span>
                        </div>
                        <div class="luxury-time-sep">:</div>
                        <div class="luxury-time-box">
                            <span class="lux-time-num" id="lux-secs">00</span>
                            <span class="lux-time-label" data-lang="lux_secs">Secs</span>
                        </div>
                    </div>

                    <a href="#reservation" class="btn btn-fill luxury-offer-btn" data-lang="lux_offer_btn">Reserve Your Spot</a>
                </div>

            </div>
        </div>
    </section>
    @endif

    <!-- About Section -->
    <section id="about" class="section-padding">
        <div class="container">
            <div class="about-grid">
                <div class="about-image-wrapper">
                    <img src="{{ asset('storage/' . $heroImage->path) }}" alt="Executive Chef" class="about-image">
                </div>
                <div class="about-text">
                    <h2 data-content-en="{{ $content->about_title_en }}"
                        data-content-ar="{{ $content->about_title_ar }}">
                        {{ $content->about_title_en }}
                    </h2>
                    <p data-content-en="{{ $content->about_desc_en }}"
                        data-content-ar="{{ $content->about_desc_ar }}">
                        {{ $content->about_desc_en }}
                    </p>
                    <a href="#menu" class="btn" data-lang="about_btn">Discover More</a>

                    <div class="stats-container">
                        @forelse($stats as $index => $item)
                        <div class="stat-item">
                            <h4>{{ $item->number }}</h4>
                            <p data-lang="stat_exp"
                                data-content-en="{{ $item->title_en }}"
                                data-content-ar="{{ $item->title_ar }}">
                                {{ $item->title_en }}
                            </p>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <!-- Menu Section -->
    <section id="menu" class="section-padding menu-section">
        <div class="container">
            <div class="section-header">
                <h2 data-lang="menu_title">Culinary Masterpieces</h2>
                <p data-lang="menu_subtitle" class="text-gold">Seasonally Inspired | Globally Sourced</p>
            </div>

            <div class="menu-filters">
                <!-- زر الكل -->
                <button class="filter-btn active" data-filter="all" data-lang="filter_all">All</button>

                <!-- أزرار الأصناف الديناميكية -->
                @foreach($categories as $category)
                <button class="filter-btn" data-filter="cat-{{ $category->id }}">
                    <span data-content-en="{{ $category->name_en }}" data-content-ar="{{ $category->name_ar }}">
                        {{ $category->name_en }}
                    </span>
                </button>
                @endforeach
            </div>

            <div class="menu-grid">
                <!-- الأطباق الديناميكية -->
                @foreach($items as $item)
                <div class="menu-item" data-category="cat-{{ $item->cat_id }}">
                    <div class="menu-img-container">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/seed/default/400/300' }}" alt="{{ $item->name_en }}" class="menu-img">
                    </div>
                    <div class="menu-details">
                        <div class="dish-header">
                            <h3 class="dish-name"
                                data-content-en="{{ $item->name_en }}"
                                data-content-ar="{{ $item->name_ar }}">
                                {{ $item->name_en }}
                            </h3>

                            <span class="dish-price">
                                @if($item->is_discount && $item->discount_price)
                                <!-- عرض السعر القديم مشطوب والسعر الجديد -->
                                <span style="text-decoration: line-through; color: #888; font-size: 0.8em; margin-right: 5px;">${{ $item->price }}</span>
                                <span style="color: #4ade80;">${{ $item->discount_price }}</span>
                                @else
                                ${{ $item->price }}
                                @endif
                            </span>
                        </div>
                        <p class="dish-desc"
                            data-content-en="{{ $item->description_en }}"
                            data-content-ar="{{ $item->description_ar }}">
                            {{ $item->description_en }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section-padding">
        <div class="container">
            <div class="section-header">
                <h2 data-lang="gallery_title">Visual Feast</h2>
                <p class="text-gold" data-lang="gallery_subtitle">Atmosphere & Plating</p>
            </div>
            <div class="gallery-grid">
                @foreach ($galleryImages as $image)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' .$image->path) }}" alt="Gallery" class="gallery-img">
                    <div class="gallery-overlay"><i class="fas fa-search-plus gallery-icon"></i></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="modern-testimonials">
        <div class="container">
            <div class="testimonial-slider">

                @forelse($testimonials as $item)
                <div class="testimonial-card {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}">
                    <div class="big-quote">“</div>
                    <img src="https://picsum.photos/seed/{{ $item->id ?? 'user' }}/200/200" alt="User" class="user-img">
                    <div class="t-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <=$item->rating)
                            <i class="fas fa-star"></i>
                            @else
                            <i class="far fa-star" style="opacity: 0.3;"></i>
                            @endif
                            @endfor
                    </div>
                    <p class="testimonial-text">{{ $item->message }}</p>
                    <div class="user-info">
                        <h5 class="user-name">{{ $item->name }}</h5>
                        @if($item->role)
                        <span class="user-role">{{ $item->role }}</span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="text-center text-gray-400 py-10">
                    <p>لا توجد آراء لعرضها حالياً.</p>
                </div>
                @endforelse

                <div class="slider-dots" id="slider-dots">
                    @foreach($testimonials as $item)
                    <div class="dot {{ $loop->first ? 'active' : '' }}" onclick="setSlide({{ $loop->index }})"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Form Section -->
    <section class="testimonial-form-section">
        <div class="container">
            <div class="form-layout">
                <div class="form-intro">
                    <h3 data-lang="share_exp_title">Share Your Experience</h3>
                    <p data-lang="share_exp_desc">
                        We always strive to provide the best dining experience. Your opinion matters greatly and helps us improve continuously. We look forward to hearing your story.
                    </p>
                    <div style="font-size: 3rem; color: rgba(212, 175, 55, 0.2);">
                        <i class="fas fa-quote-right"></i>
                    </div>
                </div>

                <div class="review-form-card">
                    <div id="successMessage" style="display: none; text-align: center; padding: 40px 0;">
                        <i class="fas fa-check-circle" style="font-size: 4rem; color: #4ade80; margin-bottom: 20px;"></i>
                        <h3 data-lang="success_thank_you" style="color: #fff; font-family: 'Cormorant Garamond', serif; font-size: 2rem; margin-bottom: 10px;">Thank You!</h3>
                        <p data-lang="success_review_msg" style="color: #aaa;">Your review has been submitted successfully and will be published after review.</p>
                        <button onclick="resetFormView()" data-lang="success_add_another" style="margin-top: 20px; background: transparent; border: 1px solid #333; color: #fff; padding: 10px 20px; cursor: pointer; border-radius: 4px;">Add Another Review</button>
                    </div>

                    <form id="reviewForm" action="{{ route('testimonials.store') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" id="inputName" class="review-input"
                                data-placeholder-en="Full Name" data-placeholder-ar="الاسم الكامل"
                                placeholder="Full Name" required value="{{ old('name') }}">
                            <span class="error-msg" id="error-name"></span>
                        </div>

                        <div class="input-group">
                            <input type="text" name="role" class="review-input"
                                data-placeholder-en="Role (Optional)" data-placeholder-ar="المنصب (اختياري)"
                                placeholder="Role (Optional)" value="{{ old('role') }}">
                        </div>

                        <div class="input-group">
                            <label data-lang="rate_experience" style="display:block; margin-bottom:10px; color:#888; font-size:0.9rem;">Rate your experience:</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" class="fas fa-star"></label>
                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4" class="fas fa-star"></label>
                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3" class="fas fa-star"></label>
                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2" class="fas fa-star"></label>
                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1" class="fas fa-star"></label>
                            </div>
                            <span class="error-msg" id="error-rating"></span>
                        </div>

                        <div class="input-group">
                            <textarea name="message" id="inputMessage" class="review-input" rows="4"
                                data-placeholder-en="Write your experience here..." data-placeholder-ar="اكتب تجربتك هنا..."
                                placeholder="Write your experience here..." required>{{ old('message') }}</textarea>
                            <span class="error-msg" id="error-message"></span>
                        </div>

                        <button type="submit" id="submitBtn" class="btn-submit-review">
                            <span data-lang="submit_review">Submit Review</span> <i class="fas fa-paper-plane" style="margin-right: 10px;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation Section -->
    <section id="reservation" class="section-padding reservation-section">
        <div class="container">
            <div class="section-header">
                <h2 data-lang="book_title">Reserve Your Table</h2>
                <p class="text-gold" data-lang="book_subtitle">Secure your evening of indulgence</p>
            </div>

            <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form" id="bookingForm">
                @if(session('status'))
                <div style=" margin-bottom: 20px; background: #D4AF37; color: #000; padding: 15px 25px; border-radius: 4px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                    {{ session('status') }}
                </div>
                @endif
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input name="phone" type="tel" class="form-control" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <input name="reservation_date" type="date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <select name="reservation_time" class="form-control">
                            <option value="" disabled selected>Time</option>
                            <option value="18:00">6:00 PM</option>
                            <option value="19:00">7:00 PM</option>
                            <option value="20:00">8:00 PM</option>
                            <option value="21:00">9:00 PM</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <select name="guests" class="form-control">
                            <option value="" disabled selected>Guests</option>
                            <option value="1">1 Person</option>
                            <option value="2">2 People</option>
                            <option value="3">3 People</option>
                            <option value="4">4 People</option>
                            <option value="5">5+ People</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: flex; align-items: flex-end;">
                        <button type="submit" class="btn btn-fill" style="width: 100%;" data-lang="btn_confirm">Confirm Booking</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section-padding contact-section">
        <div class="contact-container">
            <div class="contact-info">
                <h2 style="margin-bottom: 30px; color: var(--gold-primary);" data-lang="contact_title">Contact Us</h2>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-details">
                        <h5 data-lang="contact_addr_title">Address</h5>
                        <p data-content-en="{{ $setting->address_en }}" data-content-ar="{{ $setting->address_ar }}">
                            {{ $setting->address_en }}
                        </p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone"></i></div>
                    <div class="contact-details">
                        <h5 data-lang="contact_phone_title">Phone</h5>
                        <p dir="ltr">{{ $setting->mobile }}</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="contact-details">
                        <h5 data-lang="contact_email_title">Email</h5>
                        <a href="mailto:{{ $setting->email }}" class="hover:text-[#E60914] transition">
                            <p>{{ $setting->email }}</p>
                        </a>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-clock"></i></div>
                    <div class="contact-details">
                        <h5 data-lang="contact_hours_title">Opening Hours</h5>
                        <p data-content-en="{{ $setting->hours_en }}" data-content-ar="{{ $setting->hours_ar }}">
                            {{ $setting->hours_en }}
                        </p>
                    </div>
                </div>

                <div class="social-links">
                    @if($setting->facebook)
                    <a href="{{ $setting->facebook }}" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($setting->instagram)
                    <a href="{{ $setting->instagram }}" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($setting->twitter)
                    <a href="{{ $setting->twitter }}" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if($setting->snapchat)
                    <a href="{{ $setting->snapchat }}" target="_blank" class="social-link"><i class="fab fa-snapchat-ghost"></i></a>
                    @endif
                    @if($setting->tiktok)
                    <a href="{{ $setting->tiktok }}" target="_blank" class="social-link"><i class="fab fa-tiktok"></i></a>
                    @endif
                </div>
            </div>
            <div class="map-wrapper">
                {!! $setting->map_link !!}
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="section-padding faq-section-wrapper">
        <div class="container">
            <div class="text-center mb-16 faq-header">
                <p class="mb-2">Have Questions?</p>
                <h2 data-lang="faq_title">الأسئلة الشائعة</h2>
                <div style="width: 60px; height: 2px; background: var(--gold-primary); margin: 20px auto;"></div>
            </div>

            <div class="max-w-4xl mx-auto">
                @forelse($faqs as $faq)
                <div class="faq-card" onclick="toggleFaq(this)">
                    <button class="faq-btn">
                        <span class="faq-question data-content-wrapper"
                            data-content-en="{{ $faq->question_en }}"
                            data-content-ar="{{ $faq->question_ar }}">
                            {{ $faq->question_en }}
                        </span>
                        <div class="faq-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                    </button>

                    <div class="faq-body">
                        <div class="faq-content data-content-wrapper"
                            data-content-en="{{ $faq->answer_en }}"
                            data-content-ar="{{ $faq->answer_ar }}">
                            {{ $faq->answer_en }}
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-10 border border-dashed border-gray-800 rounded-lg">
                    <p class="text-gray-500">لا توجد أسئلة شائعة حالياً.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container">
            <a href="#" class="footer-logo">
                @if($setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" class="logo-img w-auto">
                @endif
                {{ $setting->site_name ?? 'AURUM' }}<span>.</span>
            </a>
            <p class="copyright">&copy; 2023 {{ $setting->site_name ?? 'Aurum Restaurant' }}. All Rights Reserved.</p>
            <div class="newsletter-form">
                <input type="email" placeholder="Subscribe to our newsletter">
                <button class="btn">GO</button>
            </div>
        </div>
    </footer>

    <!-- Toast Notification -->
    <div id="toast" style="position: fixed; bottom: 30px; left: 50%; transform: translateX(-50%); background: var(--gold-primary); color: #000; padding: 15px 30px; border-radius: 4px; font-weight: 600; opacity: 0; pointer-events: none; transition: opacity 0.3s; z-index: 2000;">
        Table Booked Successfully!
    </div>

    <script>
        // --- Translations ---
        const translations = {
            en: {
                nav_home: "Home",
                nav_about: "About",
                nav_menu: "Menu",
                nav_gallery: "Gallery",
                nav_reservation: "Book",
                nav_contact: "Contact",
                hero_subtitle: "Experience the Extraordinary",
                hero_title: "Taste the Art of Perfection",
                btn_book: "Book a Table",
                btn_menu: "View Menu",
                about_title: "Our Story",
                about_desc: "Founded in 2010, Aurum represents the pinnacle of culinary excellence. Our philosophy is simple: source the finest ingredients, treat them with respect, and transform them into unforgettable memories. Under the guidance of Executive Chef Alessandro Marco, we invite you on a journey through flavor, texture, and emotion.",
                about_btn: "Discover More",
                stat_exp: "Years Experience",
                menu_title: "Culinary Masterpieces",
                menu_subtitle: "Seasonally Inspired | Globally Sourced",
                filter_all: "All",
                filter_starters: "Starters",
                filter_mains: "Mains",
                filter_desserts: "Desserts",
                filter_drinks: "Drinks",
                dish1_name: "Truffle Arancini",
                dish1_desc: "Wild mushroom risotto balls, black truffle aioli, parmesan dust.",
                dish2_name: "Wagyu Beef Tenderloin",
                dish2_desc: "A5 Japanese Wagyu, garlic confit, roasted root vegetables, red wine reduction.",
                dish3_name: "Golden Sphere",
                dish3_desc: "Chocolate sphere, gold leaf, passion fruit core, vanilla bean gelato.",
                dish4_name: "Smoked Old Fashioned",
                dish4_desc: "Bourbon, maple syrup, angostura bitters, hickory smoke infusion.",
                dish5_name: "Scallop Crudo",
                dish5_desc: "Hokkaido scallops, yuzu pearls, radish, micro cilantro.",
                dish6_name: "Pan Seared Scallops",
                dish6_desc: "Cauliflower purée, crispy pancetta, caper butter sauce.",
                gallery_title: "Visual Feast",
                gallery_subtitle: "Atmosphere & Plating",
                book_title: "Reserve Your Table",
                book_subtitle: "Secure your evening of indulgence",
                btn_confirm: "Confirm Booking",
                contact_title: "Contact Us",
                contact_addr_title: "Address",
                contact_phone_title: "Phone",
                contact_email_title: "Email",
                contact_hours_title: "Opening Hours",
                lux_offer_badge: "Limited Time",
                lux_offer_eyebrow: "Don't Miss Out",
                lux_countdown_head: "Offer Ends In:",
                lux_days: "Days",
                lux_hours: "Hours",
                lux_mins: "Mins",
                lux_secs: "Secs",
                lux_offer_btn: "Reserve Your Spot",
                share_exp_title: "Share Your Experience",
                share_exp_desc: "We always strive to provide the best dining experience. Your opinion matters greatly and helps us improve continuously. We look forward to hearing your story.",
                success_thank_you: "Thank You!",
                success_review_msg: "Your review has been submitted successfully and will be published after review.",
                success_add_another: "Add Another Review",
                rate_experience: "Rate your experience:",
                submit_review: "Submit Review"
            },
            ar: {
                nav_home: "الرئيسية",
                nav_about: "قصتنا",
                nav_menu: "القائمة",
                nav_gallery: "المعرض",
                nav_reservation: "حجز",
                nav_contact: "اتصل بنا",
                hero_subtitle: "اختبر الاستثنائي",
                hero_title: "تذوق فن الكمال",
                btn_book: "احجز طاولة",
                btn_menu: "تصفح القائمة",
                about_title: "قصتنا",
                about_desc: "تأسس أوروم في عام 2010، ويمثل قمة التميز الطهوي. فلسفتنا بسيطة: الحصول على أجود المكونات، ومعاملتها باحترام، وتحويلها إلى ذكريات لا تُنسى. تحت إشراف الشيف التنفيذي أليساندرو ماركو، ندعوك في رحلة عبر النكهة والملمس والمشاعر.",
                about_btn: "اكتشف المزيد",
                stat_exp: "سنوات خبرة",
                menu_title: "روائع الطهي",
                menu_subtitle: "إلهام موسمي | مصادر عالمية",
                filter_all: "الكل",
                filter_starters: "المقبلات",
                filter_mains: "الأطباق الرئيسية",
                filter_desserts: "الحلويات",
                filter_drinks: "المشروبات",
                dish1_name: "أرنشيني الترافل",
                dish1_desc: "كرات أرز بالفطر البري، أليولي الترافل الأسود، غبار بارميزان.",
                dish2_name: "فيليه واجي ياكي",
                dish2_desc: "واجي ياباني A5، ثوم مملح، خضروات جذرية مشوية، صلصة النبيذ الأحمر.",
                dish3_name: "الكرة الذهبية",
                dish3_desc: "كرة شوكولاتة، ورق ذهبي، قلب فاكهة الباشن فروت، جيلاتي فانيلا.",
                dish4_name: "أولد فاشن المدخن",
                dish4_desc: "بوربون، شراب القيقب، مرارة أنجوستورا، دخان Hickoky.",
                dish5_name: "سكلوب كرودو",
                dish5_desc: "سكلوب هوكايدو، لآلئ اليوزو، فجل، كزبرة صغيرة.",
                dish6_name: "سكلوب مقلي",
                dish6_desc: "هريس القرنبيط، بانشيتا مقرمشة، صلصة الكابر.",
                gallery_title: "وليمة بصرية",
                gallery_subtitle: "الأجواء والتقديم",
                book_title: "احجز طاولتك",
                book_subtitle: "تأمين مساء من الترف",
                btn_confirm: "تأكيد الحجز",
                contact_title: "اتصل بنا",
                contact_addr_title: "العنوان",
                contact_phone_title: "الهاتف",
                contact_email_title: "البريد الإلكتروني",
                contact_hours_title: "ساعات العمل",
                lux_offer_badge: "عرض محدود",
                lux_offer_eyebrow: "لا تفوت الفرصة",
                lux_countdown_head: "ينتهي العرض خلال:",
                lux_days: "أيام",
                lux_hours: "ساعات",
                lux_mins: "دقائق",
                lux_secs: "ثواني",
                lux_offer_btn: "احجز مكانك الآن",
                share_exp_title: "شاركنا تجربتك",
                share_exp_desc: "نسعى دائماً لتقديم أفضل تجربة طعام لعملائنا. رأيك يهمنا جداً ويساعدنا على التحسين المستمر. نحن نتطلع لسماع قصتك معنا.",
                success_thank_you: "شكراً لك!",
                success_review_msg: "تم إرسال تقييمك بنجاح وسيتم نشره بعد المراجعة.",
                success_add_another: "إضافة تقييم آخر",
                rate_experience: "قيم تجربتك:",
                submit_review: "إرسال التقييم"
            }
        };

        // --- Language Switching Logic with LocalStorage Persistence ---
        const savedLang = localStorage.getItem('aurumLang') || 'en';
        let currentLanguage = savedLang;

        const langSwitcher = document.getElementById('lang-switch');
        const currentLangDisplay = document.getElementById('current-lang');

        langSwitcher.addEventListener('click', () => {
            currentLanguage = currentLanguage === 'en' ? 'ar' : 'en';
            localStorage.setItem('aurumLang', currentLanguage);
            updateLanguage();
        });

        function updateLanguage() {
            const html = document.documentElement;
            html.setAttribute('dir', currentLanguage === 'ar' ? 'rtl' : 'ltr');
            html.setAttribute('lang', currentLanguage);

            currentLangDisplay.textContent = currentLanguage === 'en' ? 'EN' : 'عربي';

            document.querySelectorAll('[data-lang]').forEach(el => {
                const key = el.getAttribute('data-lang');
                if (translations[currentLanguage][key]) {
                    el.textContent = translations[currentLanguage][key];
                }
            });

            document.querySelectorAll('[data-content-en]').forEach(el => {
                const text = currentLanguage === 'ar' ?
                    el.getAttribute('data-content-ar') :
                    el.getAttribute('data-content-en');

                if (text && text.trim() !== "") {
                    el.textContent = text;
                }
            });
            document.querySelectorAll('[data-placeholder-en]').forEach(el => {
                const placeholderText = currentLanguage === 'ar' ?
                    el.getAttribute('data-placeholder-ar') :
                    el.getAttribute('data-placeholder-en');

                if (placeholderText) {
                    el.setAttribute('placeholder', placeholderText);
                }
            });
        }

        // Initialize language on page load
        updateLanguage();

        // --- Sticky Navbar ---
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // --- Mobile Menu & Overlay Logic ---
        const mobileToggle = document.getElementById('mobile-toggle');
        const navLinks = document.getElementById('nav-links');
        const navOverlay = document.getElementById('nav-overlay');
        const menuIcon = mobileToggle.querySelector('i');

        function openMenu() {
            navLinks.classList.add('active');
            navOverlay.classList.add('active');
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
            document.body.style.overflow = 'hidden'; // Prevent background scroll
        }

        function closeMenu() {
            navLinks.classList.remove('active');
            navOverlay.classList.remove('active');
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
            document.body.style.overflow = ''; // Restore scroll
        }

        mobileToggle.addEventListener('click', () => {
            if (navLinks.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });

        // Close menu when clicking on overlay
        navOverlay.addEventListener('click', closeMenu);

        // Close menu when clicking on links
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // --- GSAP Animations ---
        gsap.registerPlugin(ScrollTrigger);

        const heroTl = gsap.timeline();
        heroTl.to(".hero-subtitle", {
                opacity: 1,
                y: 0,
                duration: 1,
                delay: 0.5
            })
            .to(".hero-title", {
                opacity: 1,
                y: 0,
                duration: 1
            }, "-=0.5")
            .to(".hero-buttons", {
                opacity: 1,
                y: 0,
                duration: 1
            }, "-=0.5");

        gsap.from(".about-text", {
            scrollTrigger: {
                trigger: "#about",
                start: "top 70%"
            },
            y: 50,
            opacity: 0,
            duration: 1
        });

        gsap.from(".menu-item", {
            scrollTrigger: {
                trigger: "#menu",
                start: "top 75%"
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.1
        });

        // --- Menu Filtering ---
        const filterBtns = document.querySelectorAll('.filter-btn');
        const menuItems = document.querySelectorAll('.menu-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filterValue = btn.getAttribute('data-filter');

                menuItems.forEach(item => {
                    item.classList.remove('show');

                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        setTimeout(() => item.classList.add('show'), 10);
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            window.addEventListener('DOMContentLoaded', () => {
                menuItems.forEach(item => {
                    item.style.display = 'block';
                    setTimeout(() => item.classList.add('show'), 100); // تأخير بسيط عشان الـ Animation تشتغل
                });
            });
        });

        // --- Testimonial Slider ---
        let currentSlide = 0;
        const slides = document.querySelectorAll('.testimonial-card');
        const dots = document.querySelectorAll('.dot');

        function setSlide(index) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            currentSlide = index;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        setInterval(() => {
            if (slides.length > 0) {
                let next = (currentSlide + 1) % slides.length;
                setSlide(next);
            }
        }, 5000);

        // --- Form Submission ---
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const submitBtn = document.getElementById('submitBtn');
            const formData = new FormData(form);

            const originalBtnContent = submitBtn.innerHTML;
            submitBtn.innerHTML = 'جاري الإرسال...';
            submitBtn.disabled = true;

            document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        form.style.display = 'none';
                        document.getElementById('successMessage').style.display = 'block';
                        form.reset();
                    } else {
                        if (data.errors) {
                            if (data.errors.name) document.getElementById('error-name').textContent = data.errors.name[0];
                            if (data.errors.rating) document.getElementById('error-rating').textContent = data.errors.rating[0];
                            if (data.errors.message) document.getElementById('error-message').textContent = data.errors.message[0];
                        } else {
                            alert('حدث خطأ غير متوقع');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('حدث خطأ في الاتصال بالخادم');
                })
                .finally(() => {
                    submitBtn.innerHTML = originalBtnContent;
                    submitBtn.disabled = false;
                });
        });

        function resetFormView() {
            document.getElementById('successMessage').style.display = 'none';
            document.getElementById('reviewForm').style.display = 'block';
        }

        // Reservation Form
        const bookingForm = document.getElementById('bookingForm');
        const toast = document.getElementById('toast');

        bookingForm.addEventListener('submit', async function(e) {
            e.preventDefault();

            const btn = bookingForm.querySelector('button[type="submit"]');
            const originalText = btn.innerText;

            btn.innerText = "Processing...";
            btn.disabled = true;

            try {
                const formData = new FormData(bookingForm);

                const response = await fetch(bookingForm.action, {
                    method: "POST",
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    bookingForm.reset();
                    showToast(data.message || "Table Booked Successfully!");
                } else {
                    showToast("Something went wrong");
                }

            } catch (error) {
                showToast("Server error");
            }

            btn.innerText = originalText;
            btn.disabled = false;
        });

        function showToast(message) {
            toast.innerText = message;
            toast.style.opacity = '1';
            toast.style.bottom = '50px';

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.bottom = '30px';
            }, 3000);
        }

        function toggleFaq(element) {
            const allCards = document.querySelectorAll('.faq-card');
            const isActive = element.classList.contains('active');

            allCards.forEach(card => {
                if (card !== element && card.classList.contains('active')) {
                    card.classList.remove('active');
                    card.querySelector('.faq-body').style.maxHeight = null;
                }
            });

            if (isActive) {
                element.classList.remove('active');
                element.querySelector('.faq-body').style.maxHeight = null;
            } else {
                element.classList.add('active');
                const body = element.querySelector('.faq-body');
                body.style.maxHeight = body.scrollHeight + "px";
            }
        }

        // --- Luxury Countdown Timer ---
        function startLuxuryCountdown() {
            const timerElement = document.getElementById('luxury-timer');
            if (!timerElement) return;

            const expiresAt = timerElement.getAttribute('data-expires');
            if (!expiresAt) return;

            const targetDate = new Date(expiresAt).getTime();

            if (isNaN(targetDate)) return;

            const interval = setInterval(() => {
                const now = new Date().getTime();
                const distance = targetDate - now;

                if (distance < 0) {
                    clearInterval(interval);
                    document.getElementById('lux-days').innerText = "00";
                    document.getElementById('lux-hours').innerText = "00";
                    document.getElementById('lux-mins').innerText = "00";
                    document.getElementById('lux-secs').innerText = "00";
                    // يمكنك إخفاء السيكشن بالكامل إذا انتهى
                    // document.getElementById('luxury-offer').style.display = 'none';
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('lux-days').innerText = days < 10 ? "0" + days : days;
                document.getElementById('lux-hours').innerText = hours < 10 ? "0" + hours : hours;
                document.getElementById('lux-mins').innerText = minutes < 10 ? "0" + minutes : minutes;
                document.getElementById('lux-secs').innerText = seconds < 10 ? "0" + seconds : seconds;
            }, 1000);
        }


        startLuxuryCountdown();
    </script>
</body>

</html>
