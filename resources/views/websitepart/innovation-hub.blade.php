@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="innovation-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Innovation Hub</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Where creativity meets technology to solve real-world challenges
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">60+</div>
                            <div class="stat-label">Active Projects</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">25+</div>
                            <div class="stat-label">Innovators</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">15+</div>
                            <div class="stat-label">Sectors Impacted</div>
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

<!-- Innovation Sectors Filter -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Explore Innovations</h2>
            <p class="lead text-muted">Discover groundbreaking projects across different sectors</p>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Innovations</button>
                    <button class="filter-btn" data-filter="agriculture">Agriculture</button>
                    <button class="filter-btn" data-filter="health">Health</button>
                    <button class="filter-btn" data-filter="education">Education</button>
                    <button class="filter-btn" data-filter="fintech">FinTech</button>
                    <button class="filter-btn" data-filter="climate">Climate</button>
                    <button class="filter-btn" data-filter="tourism">Tourism</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Innovations Grid -->
<section class="py-5">
    <div class="container py-5">
        <div class="row g-4" id="innovations-container">
            @foreach($innovations as $item)
            <div class="col-lg-4 innovation-item" data-sector="{{ strtolower($item->sector) }}">
                <div class="innovation-card h-100">
                    <div class="innovation-header">
                        <div class="innovation-sector">
                            <span class="sector-badge sector-{{ strtolower(str_replace(' ', '-', $item->sector)) }}">
                                <i class="fas @if($item->sector == 'Agriculture') fa-seedling @elseif($item->sector == 'Health') fa-heartbeat @elseif($item->sector == 'Education') fa-graduation-cap @elseif($item->sector == 'FinTech') fa-coins @elseif($item->sector == 'Climate') fa-leaf @elseif($item->sector == 'Tourism') fa-plane @else fa-lightbulb @endif"></i>
                                {{ $item->sector }}
                            </span>
                        </div>
                        <div class="innovation-status">
                            <span class="status-badge status-active">
                                <i class="fas fa-circle"></i>
                                Active
                            </span>
                        </div>
                    </div>
                    
                    <div class="innovation-body">
                        <h3 class="innovation-title">{{ $item->title }}</h3>
                        <div class="innovation-owner">
                            <div class="owner-info">
                                <div class="owner-avatar">
                                    <img src="{{ asset('assets/k8.jpeg') }}" alt="{{ $item->owner_name }}">
                                </div>
                                <div class="owner-details">
                                    <h6 class="owner-name">{{ $item->owner_name }}</h6>
                                    <p class="owner-role">Innovator</p>
                                </div>
                            </div>
                        </div>
                        <p class="innovation-description">{{ $item->description }}</p>
                        
                        <div class="innovation-features">
                            <div class="feature-item">
                                <i class="fas fa-lightbulb text-warning"></i>
                                <span>{{ ['Prototype', 'Testing', 'Beta', 'Launch Ready', 'Scaling'][array_rand(['Prototype', 'Testing', 'Beta', 'Launch Ready', 'Scaling'])] }}</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-users text-primary"></i>
                                <span>{{ rand(2, 8) }} Team Members</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-rocket text-success"></i>
                                <span>{{ ['Local Impact', 'Regional Impact', 'National Impact', 'Global Impact'][array_rand(['Local Impact', 'Regional Impact', 'National Impact', 'Global Impact'])] }}</span>
                            </div>
                        </div>
                        
                        <div class="innovation-progress">
                            <div class="progress-label">
                                <span>Development Progress</span>
                                <span>{{ rand(60, 95) }}%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-gradient" style="width: {{ rand(60, 95) }}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="innovation-footer">
                        <button class="btn btn-outline-primary btn-sm" onclick="showInnovationDetails({{ $item->id }})">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="supportInnovation({{ $item->id }})">
                            <i class="fas fa-heart"></i> Support
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($innovations) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-lightbulb fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">No Innovations Available</h4>
                <p class="text-muted">Check back soon for exciting new projects and innovations.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Innovation Process Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Innovation Process</h2>
            <p class="lead text-muted">From idea to impact - our systematic approach</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">1</div>
                    <div class="process-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h4 class="mb-3">Ideation</h4>
                    <p class="text-muted">Brainstorming and concept development for innovative solutions</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">2</div>
                    <div class="process-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h4 class="mb-3">Prototyping</h4>
                    <p class="text-muted">Building and testing minimum viable products</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">3</div>
                    <div class="process-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="mb-3">Testing</h4>
                    <p class="text-muted">User feedback and iterative improvement</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">4</div>
                    <div class="process-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h4 class="mb-3">Launch</h4>
                    <p class="text-muted">Scaling and deployment of successful innovations</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Impact Metrics Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Impact</h2>
            <p class="lead text-muted">Measurable results from our innovation programs</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="impact-card text-center">
                    <div class="impact-number" data-target="45">45+</div>
                    <div class="impact-label">Innovations Launched</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="impact-card text-center">
                    <div class="impact-number" data-target="10000">10K+</div>
                    <div class="impact-label">Lives Impacted</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="impact-card text-center">
                    <div class="impact-number" data-target="12">12+</div>
                    <div class="impact-label">Awards Won</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="impact-card text-center">
                    <div class="impact-number" data-target="8">8+</div>
                    <div class="impact-label">Countries Reached</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Innovation Resources Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Innovation Resources</h2>
            <p class="lead text-muted">Tools and support for your innovation journey</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="resource-card text-center p-4">
                    <div class="resource-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h4 class="mb-3">Maker Space</h4>
                    <p class="text-muted">Access to tools, equipment, and prototyping facilities</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="resource-card text-center p-4">
                    <div class="resource-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h4 class="mb-3">Mentorship</h4>
                    <p class="text-muted">Guidance from industry experts and experienced innovators</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="resource-card text-center p-4">
                    <div class="resource-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <h4 class="mb-3">Funding</h4>
                    <p class="text-muted">Access to grants, seed funding, and investment opportunities</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="resource-card text-center p-4">
                    <div class="resource-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h4 class="mb-3">Network</h4>
                    <p class="text-muted">Connect with innovators, partners, and potential collaborators</p>
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
                <h2 class="display-4 fw-bold text-white mb-4">Ready to Innovate?</h2>
                <p class="lead text-white mb-5">
                    Join our innovation ecosystem and turn your ideas into impactful solutions
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('get-involved') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-rocket"></i> Start Innovating
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-question-circle"></i> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Innovation Details Modal -->
<div class="modal fade" id="innovationModal" tabindex="-1" aria-labelledby="innovationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="innovationModalLabel">Innovation Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="innovationModalBody">
                <!-- Content will be dynamically loaded -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="supportInnovation(0)">Support This Innovation</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.innovation-hero-section {
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
    background-image: url('{{ asset('assets/k5.jpeg') }}');
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

/* Innovation Cards */
.innovation-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.innovation-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.innovation-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 0;
}

.sector-badge {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 5px;
}

.sector-agriculture { background: linear-gradient(135deg, #28a745, #20c997); }
.sector-health { background: linear-gradient(135deg, #dc3545, #fd7e14); }
.sector-education { background: linear-gradient(135deg, #007bff, #6610f2); }
.sector-fintech { background: linear-gradient(135deg, #17a2b8, #6f42c1); }
.sector-climate { background: linear-gradient(135deg, #ffc107, #28a745); }
.sector-tourism { background: linear-gradient(135deg, #e83e8c, #fd7e14); }

.status-badge {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.8rem;
    font-weight: 500;
    color: #28a745;
}

.status-badge i {
    font-size: 0.5rem;
}

.innovation-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.innovation-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.innovation-owner {
    margin-bottom: 15px;
}

.owner-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.owner-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
}

.owner-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.owner-name {
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 2px;
}

.owner-role {
    font-size: 0.8rem;
    color: #6c757d;
    margin: 0;
}

.innovation-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.innovation-features {
    margin-bottom: 20px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.innovation-progress {
    margin-bottom: 20px;
}

.progress-label {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
    color: #6c757d;
    margin-bottom: 5px;
}

.progress {
    height: 8px;
    border-radius: 4px;
    background: #e9ecef;
}

.progress-bar.bg-gradient {
    background: linear-gradient(45deg, #d8dc5a, #41e081);
    border-radius: 4px;
}

.innovation-footer {
    display: flex;
    gap: 10px;
    padding: 20px;
    border-top: 1px solid #e0e0e0;
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

/* Impact Cards */
.impact-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    padding: 30px 20px;
    transition: all 0.3s ease;
}

.impact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.impact-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #41e081;
    margin-bottom: 10px;
}

.impact-label {
    font-size: 0.9rem;
    color: #6c757d;
    font-weight: 500;
}

/* Resource Cards */
.resource-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.resource-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.resource-icon {
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
    
    .innovation-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .innovation-footer {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Helper functions
function getSectorIcon(sector) {
    const icons = {
        'Agriculture': 'fa-seedling',
        'Health': 'fa-heartbeat',
        'Education': 'fa-graduation-cap',
        'FinTech': 'fa-coins',
        'Climate': 'fa-leaf',
        'Tourism': 'fa-plane'
    };
    return icons[sector] || 'fa-lightbulb';
}

function getInnovationStage(title) {
    const stages = ['Prototype', 'Testing', 'Beta', 'Launch Ready', 'Scaling'];
    return stages[Math.floor(Math.random() * stages.length)];
}

function getImpactLevel(sector) {
    const levels = ['Local Impact', 'Regional Impact', 'National Impact', 'Global Impact'];
    return levels[Math.floor(Math.random() * levels.length)];
}

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const innovationItems = document.querySelectorAll('.innovation-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter innovations
            innovationItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-sector') === filter) {
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
    
    // Initialize innovation items with animation
    innovationItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Trigger initial animation
    setTimeout(() => {
        innovationItems.forEach(item => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
    }, 100);
});

// Innovation details function
function showInnovationDetails(innovationId) {
    const modalBody = document.getElementById('innovationModalBody');
    modalBody.innerHTML = `
        <div class="text-center mb-4">
            <div class="innovation-icon">
                <i class="fas fa-lightbulb fa-3x text-primary"></i>
            </div>
        </div>
        <h4 class="text-center mb-3">Innovation Details</h4>
        <p>This innovation represents a groundbreaking approach to solving real-world challenges through technology and creative thinking.</p>
        <h5 class="mb-3">Key Features:</h5>
        <ul>
            <li>Innovative technology integration</li>
            <li>User-centered design approach</li>
            <li>Scalable and sustainable solution</li>
            <li>Measurable social impact</li>
        </ul>
        <h5 class="mb-3">Development Roadmap:</h5>
        <ul>
            <li>Research and development phase</li>
            <li>Prototype testing and validation</li>
            <li>Pilot implementation</li>
            <li>Full-scale deployment</li>
        </ul>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('innovationModal'));
    modal.show();
}

// Support innovation function
function supportInnovation(innovationId) {
    alert('Thank you for your interest! This feature will connect you with the innovation team.');
}

// Parallax effect for hero section
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const heroBg = document.querySelector('.hero-bg');
    if (heroBg) {
        heroBg.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});

// Counter animation for impact metrics
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + (element.textContent.includes('K') ? 'K+' : element.textContent.includes('+') ? '+' : '');
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

// Observe impact numbers
document.addEventListener('DOMContentLoaded', function() {
    const impactNumbers = document.querySelectorAll('.impact-number');
    impactNumbers.forEach(impact => {
        counterObserver.observe(impact);
    });
});
</script>
@endpush
