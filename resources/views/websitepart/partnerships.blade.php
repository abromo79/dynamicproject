@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="partnerships-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Partnerships</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Collaborate with Kijana Hub Africa to scale youth innovation and digital inclusion
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Strategic Partners</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">25+</div>
                            <div class="stat-label">Countries Represented</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">$2M+</div>
                            <div class="stat-label">Joint Investments</div>
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

<!-- Partnership Types -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Partnership Opportunities</h2>
            <p class="lead text-muted">Different ways to collaborate and create impact together</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="partnership-type-card text-center p-4">
                    <div class="type-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="type-title">Strategic Partners</h4>
                    <p class="type-description">Long-term collaboration on shared goals and initiatives</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="partnership-type-card text-center p-4">
                    <div class="type-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h4 class="type-title">Funding Partners</h4>
                    <p class="type-description">Financial support for programs and innovation projects</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="partnership-type-card text-center p-4">
                    <div class="type-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4 class="type-title">Knowledge Partners</h4>
                    <p class="type-description">Expertise sharing and capacity development support</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="partnership-type-card text-center p-4">
                    <div class="type-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4 class="type-title">Technology Partners</h4>
                    <p class="type-description">Technical solutions and infrastructure support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Partners -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Partners</h2>
            <p class="lead text-muted">Organizations working with us to transform youth futures</p>
        </div>
        
        <div class="row g-4" id="partners-container">
            @foreach($partners as $partner)
            <div class="col-lg-4 partner-item">
                <div class="partner-card h-100">
                    <div class="partner-header">
                        <div class="partner-logo">
                            <img src="{{ asset('images/partner-' . $partner->id . '.jpg') }}" alt="{{ $partner->name }}" class="img-fluid" onerror="this.src='{{ asset('assets/k6.jpeg') }}'">
                        </div>
                        <div class="partner-type">
                            <span class="type-badge">{{ ['Strategic', 'Funding', 'Knowledge', 'Technology', 'Implementation'][array_rand(['Strategic', 'Funding', 'Knowledge', 'Technology', 'Implementation'])] }}</span>
                        </div>
                    </div>
                    
                    <div class="partner-body">
                        <h3 class="partner-name">{{ $partner->name }}</h3>
                        <p class="partner-description">{{ $partner->description }}</p>
                        
                        <div class="partner-impact">
                            <div class="impact-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>{{ rand(100, 1000) }}+ Youth Reached</span>
                            </div>
                            <div class="impact-item">
                                <i class="fas fa-project-diagram text-success"></i>
                                <span>{{ rand(5, 25) }}+ Joint Projects</span>
                            </div>
                            <div class="impact-item">
                                <i class="fas fa-calendar-alt text-info"></i>
                                <span>{{ rand(1, 5) }}+ Years Partnership</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="partner-footer">
                        @if($partner->website)
                        <a href="{{ $partner->website }}" target="_blank" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-external-link-alt"></i> Visit Partner
                        </a>
                        @endif
                        <button class="btn btn-primary btn-sm" onclick="showPartnerDetails({{ $partner->id }})">
                            <i class="fas fa-info-circle"></i> Learn More
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($partners) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-handshake fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Partnership Opportunities Available</h4>
                <p class="text-muted">Join our growing network of partners making a difference in youth development.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Partnership Benefits -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Why Partner With Us</h2>
            <p class="lead text-muted">Benefits of collaborating with Kijana Hub Africa</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4 class="benefit-title">Impact Alignment</h4>
                    <p class="benefit-description">Align your CSR goals with measurable youth impact and community development</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="benefit-title">Scalable Solutions</h4>
                    <p class="benefit-description">Access proven models and frameworks that scale across communities</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4 class="benefit-title">Network Access</h4>
                    <p class="benefit-description">Connect with youth innovators, communities, and stakeholders across Africa</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h4 class="benefit-title">Brand Recognition</h4>
                    <p class="benefit-description">Enhance your brand visibility through youth empowerment initiatives</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="benefit-title">Innovation Pipeline</h4>
                    <p class="benefit-description">Access emerging innovations and talent from our youth programs</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="benefit-card h-100">
                    <div class="benefit-icon">
                        <i class="fas fa-globe-africa"></i>
                    </div>
                    <h4 class="benefit-title">Regional Reach</h4>
                    <p class="benefit-description">Expand your impact across multiple African countries</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partnership Process -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Partnership Process</h2>
            <p class="lead text-muted">Simple steps to become our partner</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">1</div>
                    <div class="process-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4 class="mb-3">Explore Opportunities</h4>
                    <p class="text-muted">Review partnership types and identify alignment with your goals</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">2</div>
                    <div class="process-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h4 class="mb-3">Initial Consultation</h4>
                    <p class="text-muted">Meet with our team to discuss potential collaboration areas</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">3</div>
                    <div class="process-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <h4 class="mb-3">Partnership Agreement</h4>
                    <p class="text-muted">Formalize collaboration with clear objectives and expectations</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">4</div>
                    <div class="process-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="mb-3">Launch & Scale</h4>
                    <p class="text-muted">Implement joint initiatives and measure collective impact</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Metrics -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Partnership Success</h2>
            <p class="lead text-muted">Measurable outcomes from our collaborations</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="success-metric text-center">
                    <div class="metric-number" data-target="95">95%</div>
                    <div class="metric-label">Partner Satisfaction</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="success-metric text-center">
                    <div class="metric-number" data-target="150">150+</div>
                    <div class="metric-label">Joint Programs</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="success-metric text-center">
                    <div class="metric-number" data-target="5000">5K+</div>
                    <div class="metric-label">Youth Benefited</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="success-metric text-center">
                    <div class="metric-number" data-target="25">25+</div>
                    <div class="metric-label">Countries Reached</div>
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
                <h2 class="display-4 fw-bold text-white mb-4">Ready to Partner With Us?</h2>
                <p class="lead text-white mb-5">
                    Join our network of partners creating sustainable impact for youth across Africa
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-handshake"></i> Become a Partner
                    </a>
                    <a href="{{ route('get-involved') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-info-circle"></i> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partner Details Modal -->
<div class="modal fade" id="partnerModal" tabindex="-1" aria-labelledby="partnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partnerModalLabel">Partner Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="partnerModalBody">
                <!-- Content will be dynamically loaded -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('contact') }}" class="btn btn-primary">Contact About Partnership</a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.partnerships-hero-section {
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
    background-image: url('{{ asset('assets/k90.jpeg') }}');
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

/* Partnership Type Cards */
.partnership-type-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
}

.partnership-type-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.type-icon {
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

.type-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.type-description {
    color: #6c757d;
    line-height: 1.6;
}

/* Partner Cards */
.partner-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.partner-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.partner-header {
    position: relative;
    padding: 30px 20px 20px;
    text-align: center;
    background: #f8f9fa;
}

.partner-logo {
    width: 100px;
    height: 100px;
    border-radius: 15px;
    overflow: hidden;
    margin: 0 auto 15px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

.partner-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.type-badge {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.partner-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.partner-name {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
    text-align: center;
}

.partner-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.partner-impact {
    margin-bottom: 20px;
}

.impact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #6c757d;
}

.partner-footer {
    display: flex;
    gap: 10px;
    padding: 20px;
    border-top: 1px solid #e0e0e0;
    justify-content: center;
}

/* Benefit Cards */
.benefit-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
    text-align: center;
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.benefit-icon {
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

.benefit-title {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.benefit-description {
    color: #6c757d;
    line-height: 1.6;
}

/* Process Cards */
.process-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    position: relative;
}

.process-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.process-number {
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 30px;
    height: 30px;
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.9rem;
}

.process-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 20px auto 15px;
}

/* Success Metrics */
.success-metric {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    padding: 30px 20px;
    transition: all 0.3s ease;
}

.success-metric:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.metric-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #41e081;
    margin-bottom: 10px;
}

.metric-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 500;
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
    
    .partnerships-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .partner-footer {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Helper function
function getPartnerType(name) {
    const types = ['Strategic', 'Funding', 'Knowledge', 'Technology', 'Implementation'];
    return types[Math.floor(Math.random() * types.length)];
}

// Partner details function
function showPartnerDetails(partnerId) {
    const modalBody = document.getElementById('partnerModalBody');
    modalBody.innerHTML = `
        <div class="text-center mb-4">
            <div class="partner-icon">
                <i class="fas fa-handshake fa-3x text-primary"></i>
            </div>
        </div>
        <h4 class="text-center mb-3">Partnership Details</h4>
        <p>This partnership represents a strategic collaboration focused on youth empowerment and digital inclusion.</p>
        <h5 class="mb-3">Partnership Highlights:</h5>
        <ul>
            <li>Joint program development and implementation</li>
            <li>Shared resources and expertise</li>
            <li>Measurable impact on youth development</li>
            <li>Long-term sustainable collaboration</li>
        </ul>
        <h5 class="mb-3">Key Achievements:</h5>
        <ul>
            <li>Reached 500+ youth with digital skills training</li>
            <li>Launched 10+ joint innovation projects</li>
            <li>Established 3 community learning centers</li>
            <li>Created 50+ employment opportunities</li>
        </ul>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('partnerModal'));
    modal.show();
}

// Counter animation for success metrics
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + (element.textContent.includes('K') ? 'K+' : element.textContent.includes('%') ? '%' : '+');
    }, 30);
}

// Initialize counters when visible
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
            const target = parseInt(entry.target.getAttribute('data-target'));
            animateCounter(entry.target, target);
            entry.target.classList.add('animated');
        }
    });
}, { threshold: 0.5 });

// Observe metric numbers
document.addEventListener('DOMContentLoaded', function() {
    const metricNumbers = document.querySelectorAll('.metric-number');
    metricNumbers.forEach(metric => {
        counterObserver.observe(metric);
    });
});

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroBg = document.querySelector('.hero-bg');
    if (heroBg) {
        heroBg.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});
</script>
@endpush
