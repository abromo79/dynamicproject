@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="opportunities-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Opportunities</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Discover pathways to launch your tech career and grow your potential
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Active Opportunities</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">1000+</div>
                            <div class="stat-label">Youth Placed</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Partner Companies</div>
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

<!-- Opportunity Types Filter -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Find Your Opportunity</h2>
            <p class="lead text-muted">Explore different pathways to advance your career</p>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Opportunities</button>
                    <button class="filter-btn" data-filter="internship">Internships</button>
                    <button class="filter-btn" data-filter="job">Jobs</button>
                    <button class="filter-btn" data-filter="fellowship">Fellowships</button>
                    <button class="filter-btn" data-filter="scholarship">Scholarships</button>
                    <button class="filter-btn" data-filter="volunteer">Volunteer</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opportunities Grid -->
<section class="py-5">
    <div class="container py-5">
        <div class="row g-4" id="opportunities-container">
            @foreach($opportunities as $item)
            <div class="col-lg-6 opportunity-item" data-type="{{ $item->type }}">
                <div class="opportunity-card h-100">
                    <div class="opportunity-header">
                        <div class="opportunity-type">
                            <span class="type-badge type-{{ $item->type }}">
                                <i class="fas @if($item->type == 'internship') fa-briefcase @elseif($item->type == 'job') fa-user-tie @elseif($item->type == 'fellowship') fa-graduation-cap @elseif($item->type == 'scholarship') fa-award @else fa-hands-helping @endif"></i>
                                {{ ucwords(str_replace('_', ' ', $item->type)) }}
                            </span>
                        </div>
                        <div class="opportunity-deadline">
                            <i class="fas fa-clock"></i>
                            <span>{{ \Carbon\Carbon::parse($item->deadline)->diffForHumans() }}</span>
                        </div>
                    </div>
                    
                    <div class="opportunity-body">
                        <h3 class="opportunity-title">{{ $item->title }}</h3>
                        <p class="opportunity-description">{{ $item->description }}</p>
                        
                        <div class="opportunity-features">
                            <div class="feature-item">
                                <i class="fas fa-briefcase text-primary"></i>
                                <span>@if($item->type == 'internship') Entry Level @elseif($item->type == 'job') Various Levels @elseif($item->type == 'fellowship') Professional @elseif($item->type == 'scholarship') Student @else Open to All @endif</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span>@if($item->type == 'internship') Various Locations @elseif($item->type == 'job') Multiple Cities @elseif($item->type == 'fellowship') Remote/On-site @elseif($item->type == 'scholarship') Global @else Community Based @endif</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-dollar-sign text-primary"></i>
                                <span>@if($item->type == 'internship') Stipend Available @elseif($item->type == 'job') Competitive Salary @elseif($item->type == 'fellowship') Fully Funded @elseif($item->type == 'scholarship') Full Tuition @else Certificate & Experience @endif</span>
                            </div>
                        </div>
                        
                        <div class="opportunity-meta">
                            <div class="meta-item">
                                <i class="fas fa-eye"></i>
                                <span>{{ rand(100, 500) }} views</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>{{ rand(10, 50) }} applicants</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar-alt text-{{ \Carbon\Carbon::parse($item->deadline)->diffInDays() <= 7 ? 'danger' : 'muted' }}">
                                    {{ \Carbon\Carbon::parse($item->deadline)->diffForHumans() }}
                                </i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="opportunity-footer">
                        <button class="btn btn-outline-primary btn-sm" onclick="showOpportunityDetails({{ $item->id }})">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                        <a href="{{ route('get-involved') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-paper-plane"></i> Apply Now
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($opportunities) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-briefcase fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">No Opportunities Available</h4>
                <p class="text-muted">Check back soon for new opportunities and openings.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- How It Works Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">How It Works</h2>
            <p class="lead text-muted">Simple steps to access and apply for opportunities</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">1</div>
                    <div class="process-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4 class="mb-3">Browse Opportunities</h4>
                    <p class="text-muted">Explore our curated list of internships, jobs, and programs</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">2</div>
                    <div class="process-icon">
                        <i class="fas fa-filter"></i>
                    </div>
                    <h4 class="mb-3">Filter & Match</h4>
                    <p class="text-muted">Use filters to find opportunities that match your skills and interests</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">3</div>
                    <div class="process-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <h4 class="mb-3">Apply Online</h4>
                    <p class="text-muted">Submit your application through our streamlined process</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="process-card text-center p-4">
                    <div class="process-number">4</div>
                    <div class="process-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h4 class="mb-3">Get Placed</h4>
                    <p class="text-muted">Receive support and guidance throughout your journey</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Metrics Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Impact & Success</h2>
            <p class="lead text-muted">Real results from our opportunity programs</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="metric-card text-center">
                    <div class="metric-number" data-target="85">85%</div>
                    <div class="metric-label">Placement Rate</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric-card text-center">
                    <div class="metric-number" data-target="150">150+</div>
                    <div class="metric-label">Partner Organizations</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric-card text-center">
                    <div class="metric-number" data-target="25">25+</div>
                    <div class="metric-label">Countries Reached</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric-card text-center">
                    <div class="metric-number" data-target="92">92%</div>
                    <div class="metric-label">Satisfaction Rate</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Partners Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Featured Partners</h2>
            <p class="lead text-muted">Top companies offering opportunities through our platform</p>
        </div>
        
        <div class="row g-4 align-items-center">
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-building fa-3x text-primary"></i>
                    </div>
                    <h6>Tech Corp</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-rocket fa-3x text-success"></i>
                    </div>
                    <h6>Startup Hub</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-globe fa-3x text-info"></i>
                    </div>
                    <h6>Global Tech</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-code fa-3x text-warning"></i>
                    </div>
                    <h6>Dev Agency</h6>
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
                <h2 class="display-4 fw-bold text-white mb-4">Ready to Find Your Opportunity?</h2>
                <p class="lead text-white mb-5">
                    Join thousands of youth who have launched their careers through our platform
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('get-involved') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-rocket"></i> Apply Now
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-question-circle"></i> Get Help
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Opportunity Details Modal -->
<div class="modal fade" id="opportunityModal" tabindex="-1" aria-labelledby="opportunityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="opportunityModalLabel">Opportunity Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="opportunityModalBody">
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
.opportunities-hero-section {
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
    background-image: url('{{ asset('assets/k0.jpeg') }}');
    opacity: 0.1;
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
    background: linear-gradient(135deg, #d8dc5a 0%, #41e081 100%);
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
    border-color: #667eea;
    color: #667eea;
}

.filter-btn.active {
     background: linear-gradient(135deg, #d8dc5a 0%, #41e081 100%);
    border-color: transparent;
    color: white;
}

/* Opportunity Cards */
.opportunity-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.opportunity-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.opportunity-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 0;
}

.type-badge {
     background: linear-gradient(135deg, #d8dc5a 0%, #41e081 100%);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 5px;
}

.type-internship { background: linear-gradient(135deg, #28a745, #20c997); }
.type-job { background: linear-gradient(135deg, #007bff, #6610f2); }
.type-fellowship { background: linear-gradient(135deg, #fd7e14, #e83e8c); }
.type-scholarship { background: linear-gradient(135deg, #6f42c1, #20c997); }
.type-volunteer { background: linear-gradient(135deg, #17a2b8, #28a745); }

.opportunity-deadline {
    display: flex;
    align-items: center;
    gap: 5px;
    color: #6c757d;
    font-size: 0.9rem;
}

.opportunity-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.opportunity-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.opportunity-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.opportunity-features {
    margin-bottom: 20px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
}

.opportunity-meta {
    display: flex;
    justify-content: space-between;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
    margin-bottom: 15px;
    flex-wrap: wrap;
    gap: 10px;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 0.85rem;
    color: #6c757d;
}

.opportunity-footer {
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

/* Metric Cards */
.metric-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    padding: 30px 20px;
    transition: all 0.3s ease;
}

.metric-card:hover {
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

/* Partner Logos */
.partner-logo {
    padding: 20px;
    transition: transform 0.3s ease;
}

.partner-logo:hover {
    transform: scale(1.1);
}

.logo-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 15px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
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
    
    .opportunities-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .opportunity-footer {
        flex-direction: column;
    }
    
    .opportunity-meta {
        flex-direction: column;
        gap: 5px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Helper functions (these would typically be in your Laravel helpers)
function getOpportunityIcon(type) {
    const icons = {
        'internship': 'fa-briefcase',
        'job': 'fa-user-tie',
        'fellowship': 'fa-graduation-cap',
        'scholarship': 'fa-award',
        'volunteer': 'fa-hands-helping'
    };
    return icons[type] || 'fa-briefcase';
}

function formatDeadline(deadline) {
    const date = new Date(deadline);
    const now = new Date();
    const diffTime = date - now;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 0) return 'Closed';
    if (diffDays <= 7) return `${diffDays} days left`;
    if (diffDays <= 30) return `${Math.ceil(diffDays/7)} weeks left`;
    return date.toLocaleDateString();
}

function getOpportunityLevel(type) {
    const levels = {
        'internship': 'Entry Level',
        'job': 'Various Levels',
        'fellowship': 'Professional',
        'scholarship': 'Student',
        'volunteer': 'Open to All'
    };
    return levels[type] || 'Various';
}

function getOpportunityLocation(type) {
    const locations = {
        'internship': 'Various Locations',
        'job': 'Multiple Cities',
        'fellowship': 'Remote/On-site',
        'scholarship': 'Global',
        'volunteer': 'Community Based'
    };
    return locations[type] || 'Various';
}

function getOpportunityCompensation(type) {
    const compensation = {
        'internship': 'Stipend Available',
        'job': 'Competitive Salary',
        'fellowship': 'Fully Funded',
        'scholarship': 'Full Tuition',
        'volunteer': 'Certificate & Experience'
    };
    return compensation[type] || 'Varies';
}

function isUrgent(deadline) {
    const date = new Date(deadline);
    const now = new Date();
    const diffTime = date - now;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    return diffDays <= 7;
}

function getTimeRemaining(deadline) {
    const date = new Date(deadline);
    const now = new Date();
    const diffTime = date - now;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 0) return 'Expired';
    if (diffDays === 0) return 'Today';
    if (diffDays === 1) return 'Tomorrow';
    if (diffDays <= 7) return `${diffDays} days left`;
    return `${Math.ceil(diffDays/7)} weeks left`;
}

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const opportunityItems = document.querySelectorAll('.opportunity-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter opportunities
            opportunityItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-type') === filter) {
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
    
    // Initialize opportunity items with animation
    opportunityItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Trigger initial animation
    setTimeout(() => {
        opportunityItems.forEach(item => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
    }, 100);
});

// Opportunity details function
function showOpportunityDetails(opportunityId) {
    const modalBody = document.getElementById('opportunityModalBody');
    modalBody.innerHTML = `
        <div class="text-center mb-4">
            <div class="opportunity-icon">
                <i class="fas fa-briefcase fa-3x text-primary"></i>
            </div>
        </div>
        <h4 class="text-center mb-3">Opportunity Details</h4>
        <p>This opportunity offers excellent growth potential and valuable experience in a dynamic environment. Join our team and make a meaningful impact.</p>
        <h5 class="mb-3">Requirements:</h5>
        <ul>
            <li>Relevant educational background</li>
            <li>Strong communication skills</li>
            <li>Passion for technology and innovation</li>
            <li>Ability to work in a team environment</li>
        </ul>
        <h5 class="mb-3">Benefits:</h5>
        <ul>
            <li>Professional development opportunities</li>
            <li>Mentorship from industry experts</li>
            <li>Networking opportunities</li>
            <li>Certificate of completion</li>
        </ul>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('opportunityModal'));
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

// Counter animation for metrics
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
</script>
@endpush
