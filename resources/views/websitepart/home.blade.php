@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="home-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
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
    background-image: url('{{ asset('assets/k2.jpeg') }}');
    opacity: 0.2;
    animation: float 6s ease-in-out infinite;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

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
// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroBg = document.querySelector('.hero-bg');
    const heroParticles = document.querySelector('.hero-particles');
    
    if (heroBg) {
        heroBg.style.transform = `translateY(${scrolled * 0.5}px)`;
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
