@extends('websitepart.layout')
@section('content')
<!-- Logo Section -->
<section class="logo-hero-section py-5 position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <div class="row align-items-center">
                    <!-- Logo on Left -->
                    <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">
                        <div class="logo-container position-relative d-inline-block">
                            <img src="{{ asset('assets/logo.png') }}" alt="Kijana Hub Africa Logo" class="main-logo img-fluid animate-float" style="width: 500px;">
                            
                            <!-- Decorative Elements -->
                            <div class="decorative-orbit">
                                <div class="orbit-dot dot-1"></div>
                                <div class="orbit-dot dot-2"></div>
                                <div class="orbit-dot dot-3"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Welcome Message on Right -->
                    <div class="col-lg-6 text-center text-lg-start">
                        <div class="welcome-content">
                            <div class="welcome-bubble">
                                <h2 class="welcome-title mb-2">Welcome to</h2>
                                <h1 class="brand-name mb-0">Kijana Hub Africa</h1>
                                <div class="welcome-divider"></div>
                                <p class="welcome-tagline">Empowering Youth Through Technology</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section -->
<section class="home-hero-section position-relative overflow-hidden">
    <!-- Background Slideshow -->
    <div class="hero-bg-slide active" style="background-image: url('{{ asset('assets/k2.jpeg') }}');"></div>
    <div class="hero-bg-slide" style="background-image: url('{{ asset('assets/k3.jpeg') }}');"></div>
    <div class="hero-bg-slide" style="background-image: url('{{ asset('assets/k4.jpeg') }}');"></div>
    <div class="hero-bg-slide" style="background-image: url('{{ asset('assets/k5.jpeg') }}');"></div>
    <div class="hero-particles"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-2 fw-bold text-white mb-4 animate-fade-in-up">Where Youth Potential and Technology Converge</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Empowering African youth with digital skills, innovation capacity, and access to opportunities
                </p>
                <div class="hero-buttons animate-fade-in-up animation-delay-400">
                    <a href="{{ route('get-involved') }}" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-rocket"></i> Apply for Programs
                    </a>
                    <a href="{{ route('get-involved') }}" class="btn btn-accent btn-lg">
                        <i class="fas fa-users"></i> Join the Community
                    </a>
                </div>
                
                <div class="hero-stats mt-5 animate-fade-in-up animation-delay-600">
                    <div class="row g-4 justify-content-center">
                        <div class="col-auto">
                            <div class="hero-stat">
                                <div class="hero-stat-number">5000+</div>
                                <div class="hero-stat-label">Youth Empowered</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="hero-stat">
                                <div class="hero-stat-number">25+</div>
                                <div class="hero-stat-label">Programs</div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="hero-stat">
                                <div class="hero-stat-number">15+</div>
                                <div class="hero-stat-label">Countries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-arrow"></div>
    </div>
</section>

<!-- Impact Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Impact</h2>
            <p class="lead text-muted">Transforming lives through technology and innovation</p>
        </div>
        
        <div class="row g-4 mb-5">
            @foreach($impactStats as $stat)
            <div class="col-6 col-md-3">
                <div class="impact-card text-center p-4">
                    <div class="impact-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="impact-number">{{ $stat->value }}+</h3>
                    <p class="impact-label">{{ $stat->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('impact') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-chart-line"></i> View Full Impact Report
            </a>
        </div>
    </div>
</section>

<!-- Featured Programs -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Featured Programs</h2>
            <p class="lead text-muted">Discover opportunities to grow and innovate</p>
        </div>
        
        <div class="row g-4">
            @foreach($programs as $item)
            <div class="col-md-6 col-lg-3">
                <div class="program-card h-100">
                    <div class="program-image">
                        <img src="{{ asset('images/program-' . $item->id . '.jpg') }}" alt="{{ $item->title }}" class="img-fluid" onerror="this.src='{{ asset('assets/k1.jpeg') }}'">
                    </div>
                    <div class="program-content">
                        <h4 class="program-title">{{ $item->title }}</h4>
                        <p class="program-description">{{ \Illuminate\Support\Str::limit($item->description, 100) }}</p>
                        <div class="program-meta">
                            <span class="program-duration">3-6 months</span>
                            <span class="program-level">All Levels</span>
                        </div>
                        <a href="{{ route('programs') }}" class="btn btn-primary btn-sm">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('programs') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-th-large"></i> View All Programs
            </a>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Success Stories</h2>
            <p class="lead text-muted">Hear from our graduates and community members</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">
                            "Kijana Hub Africa transformed my career. The skills I gained helped me land my dream job as a software developer."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="{{ asset('assets/k4.jpeg') }}" alt="Author" class="img-fluid" onerror="this.src='{{ asset('images/default-author.jpg') }}'">
                        </div>
                        <div class="author-info">
                            <h5 class="author-name">Maria Johnson</h5>
                            <p class="author-role">Software Developer</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">
                            "The innovation program gave me the confidence and skills to start my own tech company. I'm now creating jobs for others."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="{{ asset('assets/k6.jpeg') }}" alt="Author" class="img-fluid" onerror="this.src='{{ asset('images/default-author.jpg') }}'">
                        </div>
                        <div class="author-info">
                            <h5 class="author-name">David Kimani</h5>
                            <p class="author-role">Tech Entrepreneur</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">
                            "The mentorship program connected me with industry leaders who guided my career path. I'm now a data analyst at a top company."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="{{ asset('assets/k1.jpeg') }}" alt="Author" class="img-fluid" onerror="this.src='{{ asset('assets/k1.jpeg') }}'">
                        </div>
                        <div class="author-info">
                            <h5 class="author-name">Sarah Mwangi</h5>
                            <p class="author-role">Data Analyst</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Upcoming Events</h2>
            <p class="lead text-muted">Join our workshops, seminars, and networking events</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="event-card">
                    <div class="event-date">
                        <div class="event-day">15</div>
                        <div class="event-month">DEC</div>
                    </div>
                    <div class="event-content">
                        <h4 class="event-title">Web Development Bootcamp</h4>
                        <p class="event-description">Learn modern web development technologies and build real projects.</p>
                        <div class="event-meta">
                            <span class="event-time"><i class="fas fa-clock"></i> 9:00 AM - 5:00 PM</span>
                            <span class="event-location"><i class="fas fa-map-marker-alt"></i> Dar es Salaam</span>
                        </div>
                        <a href="{{ route('events') }}" class="btn btn-primary btn-sm">Register Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="event-card">
                    <div class="event-date">
                        <div class="event-day">22</div>
                        <div class="event-month">DEC</div>
                    </div>
                    <div class="event-content">
                        <h4 class="event-title">Innovation Summit</h4>
                        <p class="event-description">Connect with innovators and explore cutting-edge technologies.</p>
                        <div class="event-meta">
                            <span class="event-time"><i class="fas fa-clock"></i> 10:00 AM - 4:00 PM</span>
                            <span class="event-location"><i class="fas fa-map-marker-alt"></i> Virtual</span>
                        </div>
                        <a href="{{ route('events') }}" class="btn btn-primary btn-sm">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('events') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-calendar-alt"></i> View All Events
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #d8dc5a 0%, #41e081 100%);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2 class="display-4 fw-bold mb-4">Ready to Start Your Journey?</h2>
                <p class="lead mb-4">
                    Join thousands of youth who are already transforming their lives through technology and innovation.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('get-involved') }}" class="btn btn-accent btn-lg me-3">
                        <i class="fas fa-rocket"></i> Get Started Today
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-info-circle"></i> Learn More
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cta-illustration">
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Blog Posts -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Latest from Our Blog</h2>
            <p class="lead text-muted">Insights, stories, and updates from our community</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset('assets/k9.jpeg') }}" alt="Blog Post" class="img-fluid" onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-category">Technology</span>
                            <span class="blog-date">Dec 10, 2024</span>
                        </div>
                        <h4 class="blog-title">The Future of Tech in Africa</h4>
                        <p class="blog-excerpt">Exploring how technology is reshaping opportunities across the continent.</p>
                        <a href="{{ route('blog') }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset('assets/k6.jpeg') }}" alt="Blog Post" class="img-fluid" onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-category">Success Stories</span>
                            <span class="blog-date">Dec 8, 2024</span>
                        </div>
                        <h4 class="blog-title">From Student to Entrepreneur</h4>
                        <p class="blog-excerpt">How our graduates are building successful tech startups.</p>
                        <a href="{{ route('blog') }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="blog-card">
                    <div class="blog-image">
                        <img src="{{ asset('assets/k5.jpeg') }}" alt="Blog Post" class="img-fluid" onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-category">Skills Development</span>
                            <span class="blog-date">Dec 5, 2024</span>
                        </div>
                        <h4 class="blog-title">Essential Skills for 2025</h4>
                        <p class="blog-excerpt">Top digital skills that will be in high demand next year.</p>
                        <a href="{{ route('blog') }}" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('blog') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-blog"></i> Visit Our Blog
            </a>
        </div>
    </div>
</section>


@endsection

@push('styles')
<style>
/* Logo Section Styles */
.logo-hero-section {
    background: linear-gradient(135deg, rgba(26, 77, 46, 0.8) 0%, rgba(65, 224, 129, 0.8) 100%), 
                url('{{ asset('assets/k2.jpeg') }}') center/cover no-repeat;
    min-height: 60vh;
    display: flex;
    align-items: center;
    position: relative;
}

.logo-hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('{{ asset('assets/k2.jpeg') }}') center/cover no-repeat;
    opacity: 0.3;
    z-index: -1;
}

.logo-container {
    position: relative;
    max-width: 600px;
}

.main-logo {
    max-height: 400px;
    filter: drop-shadow(0 15px 40px rgba(0, 0, 0, 0.3));
    transition: transform 0.3s ease;
}

.main-logo:hover {
    transform: scale(1.05);
}

.welcome-content {
    display: inline-block;
}

.welcome-bubble {
    background: linear-gradient(135deg, rgba(227, 142, 24, 0.95) 0%, rgba(65, 224, 129, 0.95) 100%);
    color: white;
    padding: 2.5rem 3rem;
    border-radius: 25px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.2);
    animation: float-bubble 3s ease-in-out infinite;
    position: relative;
    overflow: hidden;
    max-width: 400px;
}

.welcome-bubble::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    animation: shimmer 3s infinite;
}

.welcome-title {
    font-size: 1.2rem;
    font-weight: 300;
    opacity: 0.9;
    margin-bottom: 0.5rem;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.brand-name {
    font-size: 2.5rem;
    font-weight: bold;
    background: linear-gradient(45deg, #fff, var(--kh-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    margin-bottom: 1rem;
}

.welcome-divider {
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, transparent, var(--kh-accent), transparent);
    margin: 1rem auto;
    border-radius: 2px;
}

.welcome-tagline {
    font-size: 0.9rem;
    opacity: 0.8;
    margin: 0;
    font-style: italic;
}

.decorative-orbit {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 500px;
    pointer-events: none;
}

.orbit-dot {
    position: absolute;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--kh-accent);
    box-shadow: 0 0 20px var(--kh-accent);
}

.dot-1 {
    top: 10%;
    left: 50%;
    animation: orbit-dot-1 8s linear infinite;
}

.dot-2 {
    top: 50%;
    right: 10%;
    animation: orbit-dot-2 10s linear infinite;
}

.dot-3 {
    bottom: 10%;
    left: 50%;
    animation: orbit-dot-3 12s linear infinite;
}

/* Animations */
@keyframes float-bubble {
    0%, 100% {
        transform: translateY(0px) scale(1);
    }
    50% {
        transform: translateY(-10px) scale(1.02);
    }
}

@keyframes shimmer {
    0% {
        transform: translateX(-100%) translateY(-100%) rotate(45deg);
    }
    100% {
        transform: translateX(100%) translateY(100%) rotate(45deg);
    }
}

@keyframes orbit-dot-1 {
    0% {
        transform: rotate(0deg) translateX(250px) rotate(0deg);
    }
    100% {
        transform: rotate(360deg) translateX(250px) rotate(-360deg);
    }
}

@keyframes orbit-dot-2 {
    0% {
        transform: rotate(120deg) translateX(250px) rotate(-120deg);
    }
    100% {
        transform: rotate(480deg) translateX(250px) rotate(-480deg);
    }
}

@keyframes orbit-dot-3 {
    0% {
        transform: rotate(240deg) translateX(250px) rotate(-240deg);
    }
    100% {
        transform: rotate(600deg) translateX(250px) rotate(-600deg);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Hero Section Styles */
.home-hero-section {
    background: linear-gradient(135deg, #d8dc5a 0%, #41e081 100%);
    min-height: 100vh;
    position: relative;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0.2;
    transition: opacity 1s ease-in-out;
}

.hero-bg-slide {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.hero-bg-slide.active {
    opacity: 0.2;
}

.hero-bg-slide.prev {
    opacity: 0;
}

.hero-particles {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
    animation: particles 20s linear infinite;
}

.hero-stat {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    padding: 20px 30px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hero-stat:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.hero-stat-number {
    font-size: 2rem;
    font-weight: bold;
    color: #fff;
    margin-bottom: 5px;
}

.hero-stat-label {
    font-size: 0.9rem;
    color: rgba(255, 255, 255, 0.8);
}

.scroll-indicator {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 2s infinite;
}

.scroll-arrow {
    width: 30px;
    height: 30px;
    border-right: 3px solid #fff;
    border-bottom: 3px solid #fff;
    transform: rotate(45deg);
}

/* Animation Classes */
.animate-fade-in-up {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease forwards;
}

.animation-delay-200 {
    animation-delay: 0.2s;
}

.animation-delay-400 {
    animation-delay: 0.4s;
}

.animation-delay-600 {
    animation-delay: 0.6s;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}

@keyframes particles {
    0% { transform: translateX(0) translateY(0); }
    100% { transform: translateX(-100px) translateY(-100px); }
}

/* Section Styles */
.section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 1rem;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background: linear-gradient(45deg, #d8dc5a, #41e081);
    border-radius: 2px;
}

/* Impact Cards */
.impact-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
}

.impact-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.impact-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 20px;
}

.impact-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #41e081;
    margin-bottom: 10px;
}

.impact-label {
    color: #6c757d;
    font-weight: 500;
}

/* Program Cards */
.program-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.program-image {
    height: 200px;
    overflow: hidden;
}

.program-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.program-card:hover .program-image img {
    transform: scale(1.05);
}

.program-content {
    padding: 25px;
}

.program-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.program-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 15px;
}

.program-meta {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.program-duration, .program-level {
    background: #e8f5e8;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    color: #41e081;
    font-weight: 500;
}

/* Testimonial Cards */
.testimonial-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 30px;
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.testimonial-stars {
    color: #ffc107;
    margin-bottom: 20px;
}

.testimonial-text {
    color: #6c757d;
    line-height: 1.6;
    font-style: italic;
    margin-bottom: 25px;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
}

.author-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-name {
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 5px;
}

.author-role {
    color: #41e081;
    margin: 0;
}

/* Event Cards */
.event-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 30px;
    display: flex;
    gap: 20px;
    transition: all 0.3s ease;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.event-date {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    min-width: 80px;
}

.event-day {
    font-size: 1.5rem;
    font-weight: bold;
    margin-bottom: 5px;
}

.event-month {
    font-size: 0.9rem;
    opacity: 0.9;
}

.event-content {
    flex: 1;
}

.event-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 10px;
}

.event-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 15px;
}

.event-meta {
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 20px;
}

.event-time, .event-location {
    color: #6c757d;
    font-size: 0.9rem;
}

.event-time i, .event-location i {
    color: #41e081;
    margin-right: 5px;
}

/* Call to Action */
.cta-illustration {
    text-align: center;
    font-size: 8rem;
    opacity: 0.3;
}

/* Blog Cards */
.blog-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.blog-image {
    height: 200px;
    overflow: hidden;
}

.blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-card:hover .blog-image img {
    transform: scale(1.05);
}

.blog-content {
    padding: 25px;
}

.blog-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.blog-category {
    background: #41e081;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.blog-date {
    color: #6c757d;
    font-size: 0.9rem;
}

.blog-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.blog-excerpt {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Partners Grid */
.partners-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 30px;
    align-items: center;
}

.partner-item {
    text-align: center;
    padding: 20px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.partner-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.partner-logo {
    font-size: 2.5rem;
    color: #667eea;
    margin-bottom: 10px;
}

.partner-name {
    font-weight: 600;
    color: #2c3e50;
}

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .hero-stat {
        padding: 15px 20px;
    }
    
    .hero-stat-number {
        font-size: 1.5rem;
    }
    
    .home-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .event-card {
        flex-direction: column;
        text-align: center;
    }
    
    .event-date {
        align-self: center;
    }
    
    .cta-illustration {
        font-size: 4rem;
        margin-top: 20px;
    }
    
    .partners-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
@endpush

@push('scripts')
<script>
// Background Slideshow
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-bg-slide');
    let currentSlide = 0;
    const slideInterval = 4000; // 4 seconds per slide
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active', 'prev');
            if (i === index) {
                slide.classList.add('active');
            } else if (i === (index - 1 + slides.length) % slides.length) {
                slide.classList.add('prev');
            }
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    // Initialize first slide
    showSlide(0);
    
    // Start slideshow
    setInterval(nextSlide, slideInterval);
    
    // Update parallax effect to work with slideshow
    const heroParticles = document.querySelector('.hero-particles');
    const activeSlide = document.querySelector('.hero-bg-slide.active');
});

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const activeSlide = document.querySelector('.hero-bg-slide.active');
    const heroParticles = document.querySelector('.hero-particles');
    
    if (activeSlide) {
        activeSlide.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
    
    if (heroParticles) {
        heroParticles.style.transform = `translateY(${scrolled * 0.3}px)`;
    }
});

// Intersection Observer for animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe all cards
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.impact-card, .program-card, .testimonial-card, .event-card, .blog-card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});
</script>
@endpush
