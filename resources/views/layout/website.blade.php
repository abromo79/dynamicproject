<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Kijana Hub Africa' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
         integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
         crossorigin=""/>
    @stack('styles')
    <style>
        :root { --kh-primary:#0e4a86; --kh-accent:#2db3a0; --kh-dark:#0a1f33; --kh-light:#f5f9ff; }
        body { background: var(--kh-light); }
        .navbar,.footer { background: var(--kh-dark); }
        .hero { background: linear-gradient(rgba(10,31,51,.75), rgba(10,31,51,.75)), url('{{ asset('assets/KIjana Hub Logo PNG.png') }}') center/cover no-repeat; color:#fff; min-height: 65vh; display:flex; align-items:center; }
        .section-card { border:0; border-radius:1rem; box-shadow:0 .5rem 1rem rgba(0,0,0,.08); }
        :root {
            --kh-primary: #41e081;
            --kh-accent: #d8dc5a;
            --kh-dark: #1a4d2e;
            --kh-light: #e8f5e8;
        }
        
        .btn-primary { background:var(--kh-primary); border-color:var(--kh-primary); }
        .btn-accent { background:var(--kh-accent); color:#333; }
        .btn-primary:hover { background:#36c773; border-color:#36c773; }
        .btn-accent:hover { background:#cdd34f; }
        
        /* Enhanced Footer Styles */
        .footer {
            background: linear-gradient(135deg, var(--kh-dark) 0%, #0d3d1f 100%);
            position: relative;
            overflow: hidden;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ asset('images/k2.jpeg') }}');
            opacity: 0.05;
            pointer-events: none;
        }
        
        .footer > .container {
            position: relative;
            z-index: 1;
        }
        
        .footer-title {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        
        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .footer-heading {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--kh-accent);
            border-radius: 1px;
        }
        
        .footer-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-list li {
            margin-bottom: 0.5rem;
        }
        
        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .footer-link:hover {
            color: var(--kh-accent);
            transform: translateX(3px);
        }
        
        .footer-link i {
            font-size: 0.9rem;
            width: 16px;
        }
        
        /* Social Media Icons */
        .social-title {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .social-icons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .social-icon:hover {
            background: var(--kh-accent);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(45, 179, 160, 0.3);
        }
        
        /* Contact Information */
        .contact-info {
            margin-bottom: 1.5rem;
        }
        
        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 1rem;
        }
        
        .contact-item i {
            color: var(--kh-accent);
            font-size: 1.1rem;
            margin-top: 2px;
            width: 20px;
        }
        
        .contact-details {
            flex: 1;
        }
        
        .contact-details strong {
            color: #fff;
            font-weight: 600;
        }
        
        .contact-details br {
            line-height: 1.4;
        }
        
        /* Newsletter */
        .newsletter-title {
            color: #fff;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .newsletter-desc {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .newsletter-form .input-group {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }
        
        .newsletter-form .form-control {
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            padding: 12px 20px;
        }
        
        .newsletter-form .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .newsletter-form .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            box-shadow: none;
            color: #fff;
        }
        
        .newsletter-form .btn {
            border: none;
            padding: 12px 20px;
            font-weight: 500;
        }
        
        /* Footer Bottom */
        .footer-bottom {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
        
        .copyright {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        
        .footer-bottom-links {
            display: flex;
            gap: 20px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }
        
        .bottom-link {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .bottom-link:hover {
            color: var(--kh-accent);
        }
        
        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #d8dc5a, #41e081);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(65, 224, 129, 0.3);
        }
        
        .back-to-top.show {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background: var(--kh-primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(45, 179, 160, 0.4);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-bottom-links {
                justify-content: center;
                margin-top: 1rem;
            }
            
            .social-icons {
                justify-content: center;
            }
            
            .contact-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .newsletter-form .input-group {
                flex-direction: column;
                border-radius: 10px;
            }
            
            .newsletter-form .btn {
                border-radius: 0 0 10px 10px;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="Kijana Hub Africa" style="height: 40px; margin-right: 10px;">
            Kijana Hub Africa
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                @foreach([['home','Home'],['about','About'],['programs','Programs'],['opportunities','Opportunities'],['innovation-hub','Innovation Hub'],['impact','Impact'],['partnerships','Partnerships'],['events','Events'],['blog','Blog'],['get-involved','Get Involved'],['contact','Contact']] as [$r,$label])
                    <li class="nav-item"><a class="nav-link" href="{{ route($r) }}">{{ $label }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@if(session('success'))
    <div class="container mt-3"><div class="alert alert-success">{{ session('success') }}</div></div>
@endif

@yield('content')

<!-- Enhanced Footer -->
<footer class="footer text-white py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- About Section -->
            <div class="col-lg-4">
                <div class="footer-about">
                    <div class="footer-logo mb-3">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/logo.png') }}" alt="Kijana Hub Africa" style="height: 50px; margin-right: 15px;">
                            <h3 class="footer-title mb-0" style="font-size: 1.2em">Kijana Hub Africa</h3>
                        </div>
                    </div>
                    <p class="footer-description">
                        Empowering youth across Africa through technology, innovation, and digital inclusion. 
                        Where youth potential and technology converge to create sustainable impact.
                    </p>
                    <div class="footer-social-links mt-4">
                        <h5 class="social-title">Follow Us</h5>
                        <div class="social-icons">
                            <a href="https://facebook.com/kijanahub" target="_blank" class="social-icon" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/kijanahub" target="_blank" class="social-icon" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://instagram.com/kijanahub" target="_blank" class="social-icon" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://linkedin.com/company/kijanahub" target="_blank" class="social-icon" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://youtube.com/kijanahub" target="_blank" class="social-icon" title="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://wa.me/255700000000" target="_blank" class="social-icon" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-links">
                    <h5 class="footer-heading">Quick Links</h5>
                    <ul class="footer-list">
                        <li><a href="{{ route('home') }}" class="footer-link"><i class="fas fa-home me-2"></i>Home</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link"><i class="fas fa-info-circle me-2"></i>About Us</a></li>
                        <li><a href="{{ route('programs') }}" class="footer-link"><i class="fas fa-graduation-cap me-2"></i>Programs</a></li>
                        <li><a href="{{ route('opportunities') }}" class="footer-link"><i class="fas fa-briefcase me-2"></i>Opportunities</a></li>
                        <li><a href="{{ route('innovation-hub') }}" class="footer-link"><i class="fas fa-lightbulb me-2"></i>Innovation Hub</a></li>
                        <li><a href="{{ route('impact') }}" class="footer-link"><i class="fas fa-chart-line me-2"></i>Impact</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Resources -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-links">
                    <h5 class="footer-heading">Resources</h5>
                    <ul class="footer-list">
                        <li><a href="{{ route('partnerships') }}" class="footer-link"><i class="fas fa-handshake me-2"></i>Partnerships</a></li>
                        <li><a href="{{ route('events') }}" class="footer-link"><i class="fas fa-calendar me-2"></i>Events</a></li>
                        <li><a href="{{ route('blog') }}" class="footer-link"><i class="fas fa-blog me-2"></i>Blog</a></li>
                        <li><a href="{{ route('get-involved') }}" class="footer-link"><i class="fas fa-heart me-2"></i>Get Involved</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link"><i class="fas fa-envelope me-2"></i>Contact</a></li>
                        <li><a href="#" class="footer-link"><i class="fas fa-download me-2"></i>Resources</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Contact & Newsletter -->
            <div class="col-lg-4">
                <div class="footer-contact">
                    <h5 class="footer-heading">Get In Touch</h5>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="contact-details">
                                <strong>Head Office:</strong><br>
                                Dar es Salaam, Tanzania<br>
                                East Africa
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div class="contact-details">
                                <strong>Phone:</strong><br>
                                +255 700 000 000<br>
                                +255 754 000 000
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div class="contact-details">
                                <strong>Email:</strong><br>
                                info@kijanahub.africa<br>
                                partnerships@kijanahub.africa
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <div class="contact-details">
                                <strong>Working Hours:</strong><br>
                                Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 9:00 AM - 2:00 PM
                            </div>
                        </div>
                    </div>
                    
                    <!-- Newsletter Subscription -->
                    <div class="footer-newsletter mt-4">
                        <h6 class="newsletter-title">Subscribe to Our Newsletter</h6>
                        <p class="newsletter-desc">Get updates on our programs, events, and opportunities</p>
                        <form method="POST" action="{{ route('newsletter.store') }}" class="newsletter-form">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                                <button class="btn btn-accent" type="submit">
                                    <i class="fas fa-paper-plane"></i> Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Footer -->
        <div class="footer-bottom mt-5 pt-4 border-top border-secondary">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="copyright mb-0">
                        &copy; {{ date('Y') }} Kijana Hub Africa. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom-links">
                        <a href="#" class="bottom-link">Privacy Policy</a>
                        <a href="#" class="bottom-link">Terms of Service</a>
                        <a href="#" class="bottom-link">Cookie Policy</a>
                        <a href="#" class="bottom-link">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop" class="back-to-top" onclick="scrollToTop()">
    <i class="fas fa-arrow-up"></i>
</button>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
<script>AOS.init({ once: true });</script>

<!-- Footer JavaScript -->
<script>
// Back to Top Button
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show/Hide Back to Top Button
window.addEventListener('scroll', function() {
    const backToTopButton = document.getElementById('backToTop');
    if (window.pageYOffset > 300) {
        backToTopButton.classList.add('show');
    } else {
        backToTopButton.classList.remove('show');
    }
});

// Footer Newsletter Form Enhancement
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            const emailInput = this.querySelector('input[type="email"]');
            const submitButton = this.querySelector('button[type="submit"]');
            
            // Show loading state
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...';
            submitButton.disabled = true;
            
            // Simulate form submission (remove this in production)
            setTimeout(() => {
                submitButton.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                submitButton.style.background = '#28a745';
                emailInput.value = '';
                
                // Reset after 3 seconds
                setTimeout(() => {
                    submitButton.innerHTML = '<i class="fas fa-paper-plane"></i> Subscribe';
                    submitButton.style.background = '';
                    submitButton.disabled = false;
                }, 3000);
            }, 1500);
        });
    }
    
    // Add smooth scroll to footer links
    const footerLinks = document.querySelectorAll('.footer-link');
    footerLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Add ripple effect
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.width = '10px';
            ripple.style.height = '10px';
            ripple.style.animation = 'ripple 0.6s ease-out';
            ripple.style.pointerEvents = 'none';
            
            const rect = this.getBoundingClientRect();
            ripple.style.left = (e.clientX - rect.left - 5) + 'px';
            ripple.style.top = (e.clientY - rect.top - 5) + 'px';
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});

// Add CSS animation for ripple effect
const style = document.createElement('style');
style.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>
@stack('scripts')
</body>
</html>
