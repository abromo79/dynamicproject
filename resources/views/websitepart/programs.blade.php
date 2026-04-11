@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="programs-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Our Programs</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Empowering youth with cutting-edge digital skills and innovation training
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">15+</div>
                            <div class="stat-label">Programs Offered</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">2000+</div>
                            <div class="stat-label">Youth Trained</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">95%</div>
                            <div class="stat-label">Success Rate</div>
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

<!-- Program Categories Filter -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Explore Our Programs</h2>
            <p class="lead text-muted">Find the perfect program to accelerate your tech journey</p>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Programs</button>
                    <button class="filter-btn" data-filter="digital-skills">Digital Skills</button>
                    <button class="filter-btn" data-filter="innovation">Innovation</button>
                    <button class="filter-btn" data-filter="entrepreneurship">Entrepreneurship</button>
                    <button class="filter-btn" data-filter="mentorship">Mentorship</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Grid -->
<section class="py-5">
    <div class="container py-5">
        <div class="row g-4" id="programs-container">
            @foreach($programs as $item)
            <div class="col-lg-6 program-item" data-category="{{ strtolower(str_replace(' ', '-', $item->category)) }}">
                <div class="program-card h-100">
                    <div class="program-header">
                        <div class="program-category">
                            <span class="category-badge">{{ $item->category }}</span>
                        </div>
                        <div class="program-duration">
                            <i class="fas fa-clock"></i>
                            <span>{{ $item->duration }}</span>
                        </div>
                    </div>
                    
                    <div class="program-body">
                        <h3 class="program-title">{{ $item->title }}</h3>
                        <p class="program-description">{{ $item->description }}</p>
                        
                        <div class="program-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i>
                                <span>Hands-on Training</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i>
                                <span>Industry Experts</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle text-success"></i>
                                <span>Certification</span>
                            </div>
                        </div>
                        
                        <div class="program-meta">
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>{{ rand(15, 50) }} enrolled</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-star text-warning"></i>
                                <span>{{ number_format(4.5 + rand(0, 4) * 0.1, 1) }} rating</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="program-footer">
                        <button class="btn btn-outline-primary btn-sm" onclick="showProgramDetails({{ $item->id }})">
                            <i class="fas fa-info-circle"></i> Learn More
                        </button>
                        <a href="{{ route('get-involved') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-rocket"></i> Apply Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($programs) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-graduation-cap fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">No Programs Available</h4>
                <p class="text-muted">Check back soon for upcoming programs and workshops.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Program Features Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Why Choose Our Programs?</h2>
            <p class="lead text-muted">Comprehensive learning experience designed for your success</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4 class="mb-3">Practical Skills</h4>
                    <p class="text-muted">Hands-on experience with real-world projects and industry tools</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4 class="mb-3">Expert Mentors</h4>
                    <p class="text-muted">Learn from industry professionals with years of experience</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4 class="mb-3">Certification</h4>
                    <p class="text-muted">Earn recognized certificates upon program completion</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-card text-center p-4">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4 class="mb-3">Career Support</h4>
                    <p class="text-muted">Job placement assistance and career guidance programs</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Success Stories</h2>
            <p class="lead text-muted">Hear from our program graduates</p>
        </div>
        
        <div class="row g-4">
            @php
                $successStories = \App\Models\SuccessStory::where('status', true)->orderBy('sort_order')->latest()->take(3)->get();
            @endphp
            
            @forelse($successStories as $story)
                <div class="col-lg-4">
                    <div class="testimonial-card h-100 {{ $story->is_featured ? 'featured-testimonial' : '' }}">
                        @if($story->is_featured)
                            <div class="featured-badge">
                                <i class="fas fa-star"></i> Featured Story
                            </div>
                        @endif
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">
                                "{{ $story->testimonial }}"
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                @if($story->image)
                                    <img src="{{ asset($story->image) }}" alt="{{ $story->name }}">
                                @else
                                    <img src="{{ asset('assets/k2.jpeg') }}" alt="{{ $story->name }}">
                                @endif
                            </div>
                            <div class="author-info">
                                <h6 class="author-name">{{ $story->name }}</h6>
                                <p class="author-program">{{ $story->program }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback to default stories if no stories in database -->
                <div class="col-lg-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">
                                "The digital skills program transformed my career. I went from unemployed to working as a web developer in just 3 months!"
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="{{ asset('assets/k2.jpeg') }}" alt="Success Story">
                            </div>
                            <div class="author-info">
                                <h6 class="author-name">Sarah M.</h6>
                                <p class="author-program">Web Development Program</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">
                                "The entrepreneurship program gave me the confidence and skills to start my own tech startup. Thank you Kijana Hub!"
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="{{ asset('assets/k8.jpeg') }}" alt="Success Story">
                            </div>
                            <div class="author-info">
                                <h6 class="author-name">John K.</h6>
                                <p class="author-program">Entrepreneurship Program</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-card h-100">
                        <div class="testimonial-content">
                            <div class="quote-icon">
                                <i class="fas fa-quote-left"></i>
                            </div>
                            <p class="testimonial-text">
                                "The mentorship I received was invaluable. I now work as a data analyst at a leading tech company."
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <img src="{{ asset('assets/k8.jpeg') }}" alt="Success Story">
                            </div>
                            <div class="author-info">
                                <h6 class="author-name">Grace L.</h6>
                                <p class="author-program">Data Analytics Program</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 cta-section">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 fw-bold text-white mb-4">Ready to Start Your Journey?</h2>
                <p class="lead text-white mb-5">
                    Join thousands of youth who have transformed their careers through our programs
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('get-involved') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-rocket"></i> Apply Now
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-question-circle"></i> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Details Modal -->
<div class="modal fade" id="programModal" tabindex="-1" aria-labelledby="programModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programModalLabel">Program Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="programModalBody">
                <!-- Content will be dynamically loaded -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('get-involved') }}" class="btn btn-primary">Apply Now</a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.programs-hero-section {
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
    opacity: 0.3;
    animation: float 6s ease-in-out infinite;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    
    
}

.stat-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 15px;
    padding: 20px 30px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #fff;
    margin-bottom: 5px;
}

.stat-label {
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

/* Filter Buttons */
.filter-buttons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: center;
}

.filter-btn {
    background: white;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
    cursor: pointer;
}

.filter-btn:hover {
    border-color: #41e081;
    color: #41e081;
}

.filter-btn.active {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    border-color: transparent;
    color: white;
}

/* Program Cards */
.program-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.program-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.program-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 0;
}

.category-badge {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.program-duration {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c757d;
    font-size: 0.9rem;
}

.program-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.program-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.program-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.program-features {
    margin-bottom: 20px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.program-meta {
    display: flex;
    justify-content: space-between;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
    margin-bottom: 15px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.85rem;
    color: #6c757d;
}

.program-footer {
    display: flex;
    gap: 10px;
    padding: 20px;
    border-top: 1px solid #e0e0e0;
}

/* Feature Cards */
.feature-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.feature-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    margin: 0 auto 20px;
}

/* Testimonial Cards */
.testimonial-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 30px;
    transition: all 0.3s ease;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.quote-icon {
    color: #41e081;
    font-size: 2rem;
    margin-bottom: 15px;
}

.testimonial-text {
    font-style: italic;
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
}

.testimonial-author {
    display: flex;
    align-items: center;
    gap: 15px;
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
}

.author-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.author-name {
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 2px;
}

.author-program {
    font-size: 0.85rem;
    color: #6c757d;
    margin: 0;
}

/* Featured Stories */
.featured-testimonial {
    border: 2px solid #41e081;
    position: relative;
}

.featured-badge {
    position: absolute;
    top: -10px;
    right: 20px;
    background: linear-gradient(135deg, #41e081, #d8dc5a);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(65, 224, 129, 0.3);
}

.featured-badge i {
    margin-right: 5px;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #d8dc5a 0%, #41e081 100%);
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: url('{{ asset('images/pattern-bg.png') }}');
    opacity: 0.1;
}

.cta-section > .container {
    position: relative;
    z-index: 1;
}

/* Empty State */
.empty-state {
    padding: 60px 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .section-title {
        font-size: 2rem;
    }
    
    .stat-card {
        padding: 15px 20px;
    }
    
    .stat-number {
        font-size: 2rem;
    }
    
    .programs-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .program-footer {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const programItems = document.querySelectorAll('.program-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter programs
            programItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Initialize program items with animation
    programItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Trigger initial animation
    setTimeout(() => {
        programItems.forEach(item => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
    }, 100);
});

// Program details function
function showProgramDetails(programId) {
    // This would typically make an AJAX call to get program details
    // For now, we'll show a modal with placeholder content
    const modalBody = document.getElementById('programModalBody');
    modalBody.innerHTML = `
        <div class="text-center mb-4">
            <div class="program-icon">
                <i class="fas fa-graduation-cap fa-3x text-primary"></i>
            </div>
        </div>
        <h4 class="text-center mb-3">Program Details</h4>
        <p>This program offers comprehensive training in modern digital skills with hands-on projects and expert mentorship.</p>
        <ul class="list-unstyled">
            <li><i class="fas fa-check text-success"></i> 12 weeks intensive training</li>
            <li><i class="fas fa-check text-success"></i> Industry expert instructors</li>
            <li><i class="fas fa-check text-success"></i> Real-world projects</li>
            <li><i class="fas fa-check text-success"></i> Career support and placement</li>
            <li><i class="fas fa-check text-success"></i> Certificate of completion</li>
        </ul>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('programModal'));
    modal.show();
}

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroBg = document.querySelector('.hero-bg');
    if (heroBg) {
        heroBg.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Counter animation for stats
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + (element.textContent.includes('+') ? '+' : element.textContent.includes('%') ? '%' : '');
    }, 30);
}

// Initialize counters when visible
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
            const text = entry.target.textContent;
            const target = parseInt(text.replace(/\D/g, ''));
            animateCounter(entry.target, target);
            entry.target.classList.add('animated');
        }
    });
}, { threshold: 0.5 });

// Observe stat numbers
document.addEventListener('DOMContentLoaded', function() {
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        counterObserver.observe(stat);
    });
});
</script>
@endpush
