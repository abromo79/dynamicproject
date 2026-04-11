@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">About Kijana Hub Africa</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Where Youth Potential and Technology Converge
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">60%</div>
                            <div class="stat-label">Youth Population</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Youth Trained</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">50%</div>
                            <div class="stat-label">Female Participation</div>
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

<!-- Introduction Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="content-card p-4">
                    <h2 class="section-title mb-4">Who We Are</h2>
                    <p class="lead text-muted mb-4">
                        We are a youth-centered innovation and capacity-building hub rooted in Tanzania and scalable across Africa.
                    </p>
                    <p class="text-muted">
                        Kijana Hub Africa responds directly to national development priorities such as youth employment, digital transformation, innovation, and inclusive growth. By providing hands-on digital skills training, mentorship, and innovation support, we enable young people to transition from talent to opportunity.
                    </p>
                    <div class="mt-4">
                        <button class="btn btn-primary btn-lg me-3" onclick="scrollToSection('vision')">Learn More</button>
                        <button class="btn btn-outline-primary btn-lg" onclick="scrollToSection('team')">Meet Our Team</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-container">
                    <img src="{{ asset('assets/k8.jpeg') }}" alt="Youth Technology Hub" class="img-fluid rounded-3 shadow-lg">
                    <div class="floating-card">
                        <h5 class="text-primary fw-bold">Starting in Tanzania</h5>
                        <p class="text-muted mb-0">Expanding Across Africa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section id="vision" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Purpose</h2>
            <p class="lead text-muted">Driving change through technology and innovation</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="vision-card h-100 p-4 text-center">
                    <div class="icon-container mb-4">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="card-title mb-4">Vision</h3>
                    <p class="card-text">
                        Empowered African youth leveraging technology for global impact.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mission-card h-100 p-4 text-center">
                    <div class="icon-container mb-4">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="card-title mb-4">Mission</h3>
                    <p class="card-text">
                        Bridge the gap between talent and opportunity through practical digital skills and industry exposure.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Objectives Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Objectives</h2>
            <p class="lead text-muted">Key areas of focus for maximum impact</p>
        </div>
        
        <div class="row g-4" id="objectives-container">
            <div class="col-md-6 col-lg-4">
                <div class="objective-card p-4 h-100">
                    <div class="objective-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4 class="mb-3">Digital Skills Training</h4>
                    <p class="text-muted">Provide accessible, tailored training in digital and emerging technologies</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="objective-card p-4 h-100">
                    <div class="objective-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="mb-3">Innovation & Creativity</h4>
                    <p class="text-muted">Nurture creativity and innovation through real-world projects</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="objective-card p-4 h-100">
                    <div class="objective-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="mb-3">Mentorship & Careers</h4>
                    <p class="text-muted">Connect youth with mentors, internships and job opportunities</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="objective-card p-4 h-100">
                    <div class="objective-icon">
                        <i class="fas fa-globe-africa"></i>
                    </div>
                    <h4 class="mb-3">Inclusive Growth</h4>
                    <p class="text-muted">Empower underserved and diverse communities</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="objective-card p-4 h-100">
                    <div class="objective-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="mb-3">Collaborative Ecosystem</h4>
                    <p class="text-muted">Build a network of changemakers, technologists and entrepreneurs</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="objective-card p-4 h-100">
                    <div class="objective-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="mb-3">Youth-Led Innovations</h4>
                    <p class="text-muted">Support innovations that address local and global challenges</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founders and Leadership Section -->
<section id="team" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Founders and Leadership</h2>
            <p class="lead text-muted">Meet the visionaries behind Kijana Hub Africa</p>
        </div>
        
        <div class="row g-4" id="team-container">
            @foreach($teamMembers as $member)
            <div class="col-md-6 col-lg-4 team-member" data-member-id="{{ $member->id }}">
                <div class="team-card h-100">
                    <div class="team-image-container">
                        <img src="{{ $member->image ? asset('storage/' . $member->image) : asset('assets/k7.jpeg') }}" 
                             alt="{{ $member->name }}" 
                             class="team-image">
                        <div class="team-overlay">
                            <div class="social-links">
                                @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank" class="social-link">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                @endif
                                @if($member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank" class="social-link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif
                                @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="social-link">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="team-content p-4">
                        <h5 class="team-name">{{ $member->name }}</h5>
                        <p class="team-position text-muted">{{ $member->position }}</p>
                        <p class="team-bio">{{ $member->bio }}</p>
                        <button class="btn btn-outline-primary btn-sm mt-3" onclick="showMemberDetails({{ $member->id }})">
                            Learn More
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Target Beneficiaries Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Who We Serve</h2>
            <p class="lead text-muted">Our target beneficiaries across Tanzania and expanding across Africa</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="beneficiary-card text-center p-4">
                    <div class="beneficiary-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4 class="mb-3">Students & Graduates</h4>
                    <p class="text-muted">Youth in education and early career stages</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="beneficiary-card text-center p-4">
                    <div class="beneficiary-icon">
                        <i class="fas fa-female"></i>
                    </div>
                    <h4 class="mb-3">Young Women</h4>
                    <p class="text-muted">Girls and women interested in technology</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="beneficiary-card text-center p-4">
                    <div class="beneficiary-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="mb-3">Underserved Communities</h4>
                    <p class="text-muted">Youth from rural and marginalized areas</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="beneficiary-card text-center p-4">
                    <div class="beneficiary-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="mb-3">Tech Entrepreneurs</h4>
                    <p class="text-muted">Aspiring innovators and startup founders</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 cta-section">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 fw-bold text-white mb-4">Join Us in Empowering African Youth</h2>
                <p class="lead text-white mb-5">
                    Be part of our mission to bridge the gap between talent and opportunity across Africa
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('get-involved') }}" class="btn btn-light btn-lg">
                        Get Involved
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Member Details Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="memberModalLabel">Team Member Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="memberModalBody">
                <!-- Content will be dynamically loaded -->
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.hero-section {
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
    background-image: url('{{ asset('assets/k4.jpeg') }}');
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

/* Card Styles */
.content-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.content-card:hover {
    transform: translateY(-5px);
}

.image-container {
    position: relative;
}

.floating-card {
    position: absolute;
    bottom: -20px;
    right: -20px;
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    animation: float 4s ease-in-out infinite;
}

.vision-card, .mission-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.vision-card:hover {
    border-color: #667eea;
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
}

.mission-card:hover {
    border-color: #764ba2;
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(118, 75, 162, 0.3);
}

.icon-container {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
}

.vision-card .icon-container {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
}

.mission-card .icon-container {
    background: linear-gradient(135deg, #41e081, #36c773);
    color: white;
}

/* Objective Cards */
.objective-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border-left: 4px solid transparent;
}

.objective-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    border-left-color: #41e081;
}

.objective-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
}

/* Team Cards */
.team-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.team-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

.team-image-container {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.team-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.team-card:hover .team-image {
    transform: scale(1.1);
}

.team-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.7));
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.team-card:hover .team-overlay {
    opacity: 1;
}

.social-links {
    display: flex;
    gap: 15px;
}

.social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #41e081;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #41e081;
    color: white;
    transform: translateY(-3px);
}

.team-name {
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 5px;
}

.team-position {
    color: #41e081;
    font-size: 0.9rem;
    margin-bottom: 15px;
}

.team-bio {
    font-size: 0.9rem;
    color: #6c757d;
    line-height: 1.6;
}

/* Beneficiary Cards */
.beneficiary-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.beneficiary-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.beneficiary-icon {
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
    
    .hero-section {
        min-height: auto;
        padding: 100px 0;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Smooth scroll function
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Animate elements on scroll
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
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.objective-card, .team-card, .beneficiary-card');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});

// Team member details function
function showMemberDetails(memberId) {
    // This would typically make an AJAX call to get member details
    // For now, we'll use the data already available in the DOM
    const memberElement = document.querySelector(`[data-member-id="${memberId}"]`);
    if (memberElement) {
        const name = memberElement.querySelector('.team-name').textContent;
        const position = memberElement.querySelector('.team-position').textContent;
        const bio = memberElement.querySelector('.team-bio').textContent;
        const image = memberElement.querySelector('.team-image').src;
        
        const modalBody = document.getElementById('memberModalBody');
        modalBody.innerHTML = `
            <div class="text-center mb-4">
                <img src="${image}" alt="${name}" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <h4 class="text-center mb-3">${name}</h4>
            <p class="text-muted text-center mb-4">${position}</p>
            <p>${bio}</p>
        `;
        
        const modal = new bootstrap.Modal(document.getElementById('memberModal'));
        modal.show();
    }
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
        element.textContent = Math.floor(current) + (element.textContent.includes('%') ? '%' : '+');
    }, 30);
}

// Initialize counters when visible
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
            const target = parseInt(entry.target.textContent);
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
