@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="impact-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Our Impact</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Transforming lives and communities through technology and innovation
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">5000+</div>
                            <div class="stat-label">Lives Impacted</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">25+</div>
                            <div class="stat-label">Communities Reached</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">100+</div>
                            <div class="stat-label">Projects Completed</div>
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

<!-- Key Impact Metrics -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Key Impact Metrics</h2>
            <p class="lead text-muted">Measurable results that drive our mission forward</p>
        </div>
        
        <div class="row g-4" id="impact-stats-container">
            @foreach($impactStats as $item)
            <div class="col-md-6 col-lg-3">
                <div class="impact-stat-card text-center p-4">
                    <div class="stat-icon">
                        <i class="fas @if($item->title == 'Youth Trained') fa-users @elseif($item->title == 'Jobs Created') fa-briefcase @elseif($item->title == 'Startups Launched') fa-rocket @elseif($item->title == 'Countries Reached') fa-globe @elseif($item->title == 'Communities Impacted') fa-home @else fa-chart-line @endif"></i>
                    </div>
                    <div class="stat-number" data-target="{{ $item->value }}">{{ $item->value }}+</div>
                    <div class="stat-title">{{ $item->title }}</div>
                    <div class="stat-description">{{ $item->description }}</div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($impactStats) == 0)
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="impact-stat-card text-center p-4">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" data-target="2000">2000+</div>
                    <div class="stat-title">Youth Trained</div>
                    <div class="stat-description">Young people equipped with digital skills</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="impact-stat-card text-center p-4">
                    <div class="stat-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="stat-number" data-target="150">150+</div>
                    <div class="stat-title">Jobs Created</div>
                    <div class="stat-description">Employment opportunities generated</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="impact-stat-card text-center p-4">
                    <div class="stat-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="stat-number" data-target="50">50+</div>
                    <div class="stat-title">Startups Launched</div>
                    <div class="stat-description">Youth-led enterprises established</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="impact-stat-card text-center p-4">
                    <div class="stat-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="stat-number" data-target="15">15+</div>
                    <div class="stat-title">Countries Reached</div>
                    <div class="stat-description">Global impact and expansion</div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Impact Areas -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Impact Areas</h2>
            <p class="lead text-muted">How we're creating change across different sectors</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="impact-area-card h-100">
                    <div class="area-header">
                        <div class="area-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4 class="area-title">Education</h4>
                    </div>
                    <div class="area-body">
                        <p class="area-description">Providing quality digital education and skills training to youth across Tanzania and beyond.</p>
                        <div class="area-metrics">
                            <div class="metric-item">
                                <span class="metric-number">1000+</span>
                                <span class="metric-label">Students Trained</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">95%</span>
                                <span class="metric-label">Completion Rate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="impact-area-card h-100">
                    <div class="area-header">
                        <div class="area-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h4 class="area-title">Employment</h4>
                    </div>
                    <div class="area-body">
                        <p class="area-description">Connecting youth with meaningful employment opportunities and career development pathways.</p>
                        <div class="area-metrics">
                            <div class="metric-item">
                                <span class="metric-number">500+</span>
                                <span class="metric-label">Jobs Secured</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">85%</span>
                                <span class="metric-label">Placement Rate</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="impact-area-card h-100">
                    <div class="area-header">
                        <div class="area-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4 class="area-title">Innovation</h4>
                    </div>
                    <div class="area-body">
                        <p class="area-description">Fostering creativity and supporting youth-led innovations that address real-world challenges.</p>
                        <div class="area-metrics">
                            <div class="metric-item">
                                <span class="metric-number">60+</span>
                                <span class="metric-label">Projects Developed</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">25+</span>
                                <span class="metric-label">Innovations Launched</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="impact-area-card h-100">
                    <div class="area-header">
                        <div class="area-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="area-title">Community</h4>
                    </div>
                    <div class="area-body">
                        <p class="area-description">Building strong communities and networks that support youth development and collaboration.</p>
                        <div class="area-metrics">
                            <div class="metric-item">
                                <span class="metric-number">25+</span>
                                <span class="metric-label">Communities Reached</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">1000+</span>
                                <span class="metric-label">Community Members</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="impact-area-card h-100">
                    <div class="area-header">
                        <div class="area-icon">
                            <i class="fas fa-female"></i>
                        </div>
                        <h4 class="area-title">Gender Equality</h4>
                    </div>
                    <div class="area-body">
                        <p class="area-description">Empowering young women and girls to pursue careers in technology and innovation.</p>
                        <div class="area-metrics">
                            <div class="metric-item">
                                <span class="metric-number">50%</span>
                                <span class="metric-label">Female Participation</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">200+</span>
                                <span class="metric-label">Girls Empowered</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="impact-area-card h-100">
                    <div class="area-header">
                        <div class="area-icon">
                            <i class="fas fa-globe-africa"></i>
                        </div>
                        <h4 class="area-title">Global Reach</h4>
                    </div>
                    <div class="area-body">
                        <p class="area-description">Expanding our impact across Africa and connecting youth to global opportunities.</p>
                        <div class="area-metrics">
                            <div class="metric-item">
                                <span class="metric-number">15+</span>
                                <span class="metric-label">Countries Reached</span>
                            </div>
                            <div class="metric-item">
                                <span class="metric-number">50+</span>
                                <span class="metric-label">Global Partners</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Success Stories</h2>
            <p class="lead text-muted">Real stories of transformation and success</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="story-card h-100">
                    <div class="story-image">
                        <img src="{{ asset('assets/k7.jpeg') }}" alt="Success Story" class="img-fluid">
                        <div class="story-overlay">
                            <div class="story-category">Education</div>
                        </div>
                    </div>
                    <div class="story-content">
                        <h4 class="story-title">From Student to Tech Leader</h4>
                        <p class="story-text">Maria transformed her life through our digital skills program and now leads a tech team at a leading company.</p>
                        <div class="story-impact">
                            <span class="impact-tag">Career Growth</span>
                            <span class="impact-tag">Leadership</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="story-card h-100">
                    <div class="story-image">
                        <img src="{{ asset('assets/k1.jpeg') }}" alt="Success Story" class="img-fluid">
                        <div class="story-overlay">
                            <div class="story-category">Innovation</div>
                        </div>
                    </div>
                    <div class="story-content">
                        <h4 class="story-title">Startup Success Story</h4>
                        <p class="story-text">James launched his agritech startup after participating in our innovation hub, now serving 1000+ farmers.</p>
                        <div class="story-impact">
                            <span class="impact-tag">Entrepreneurship</span>
                            <span class="impact-tag">Agriculture</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="story-card h-100">
                    <div class="story-image">
                        <img src="{{ asset('assets/k3.jpeg') }}" alt="Success Story" class="img-fluid">
                        <div class="story-overlay">
                            <div class="story-category">Community</div>
                        </div>
                    </div>
                    <div class="story-content">
                        <h4 class="story-title">Community Champion</h4>
                        <p class="story-text">Sarah established a digital learning center in her community, impacting over 200 young lives.</p>
                        <div class="story-impact">
                            <span class="impact-tag">Community Impact</span>
                            <span class="impact-tag">Education</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Impact Journey</h2>
            <p class="lead text-muted">Milestones and achievements over the years</p>
        </div>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-year">2021</div>
                    <h4 class="timeline-title">Kijana Hub Founded</h4>
                    <p class="timeline-description">Started with a vision to empower youth through technology and innovation.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-year">2022</div>
                    <h4 class="timeline-title">First Training Cohort</h4>
                    <p class="timeline-description">Successfully trained 50 youth in digital skills with 90% completion rate.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-year">2023</div>
                    <h4 class="timeline-title">Expansion Phase</h4>
                    <p class="timeline-description">Expanded to 5 regions and launched innovation hub with 15+ projects.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-dot"></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-year">2024</div>
                    <h4 class="timeline-title">National Recognition</h4>
                    <p class="timeline-description">Received national award for excellence in youth empowerment and digital education.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Partners</h2>
            <p class="lead text-muted">Organizations that support our mission</p>
        </div>
        
        <div class="row g-4 align-items-center">
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-building fa-3x text-primary"></i>
                    </div>
                    <h6>Tech Foundation</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-graduation-cap fa-3x text-success"></i>
                    </div>
                    <h6>Edu Partners</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-globe fa-3x text-info"></i>
                    </div>
                    <h6>Global Fund</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="partner-logo text-center">
                    <div class="logo-placeholder">
                        <i class="fas fa-handshake fa-3x text-warning"></i>
                    </div>
                    <h6>Local NGOs</h6>
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
                <h2 class="display-4 fw-bold text-white mb-4">Be Part of Our Impact</h2>
                <p class="lead text-white mb-5">
                    Join us in creating meaningful change and transforming lives through technology
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('get-involved') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-heart"></i> Get Involved
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-question-circle"></i> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.impact-hero-section {
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
    background-image: url('{{ asset('assets/k13.jpeg') }}');
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

/* Impact Stat Cards */
.impact-stat-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
}

.impact-stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.stat-icon {
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

.stat-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 10px;
}

.stat-description {
    font-size: 0.9rem;
    color: #6c757d;
    line-height: 1.6;
}

/* Impact Area Cards */
.impact-area-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.impact-area-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.area-header {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 30px 20px;
    text-align: center;
}

.area-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 15px;
}

.area-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin: 0;
}

.area-body {
    padding: 20px;
}

.area-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
}

.area-metrics {
    display: flex;
    justify-content: space-around;
    gap: 15px;
}

.metric-item {
    text-align: center;
}

.metric-number {
    display: block;
    font-size: 1.5rem;
    font-weight: bold;
    color: #41e081;
    margin-bottom: 5px;
}

.metric-label {
    font-size: 0.8rem;
    color: #6c757d;
}

/* Story Cards */
.story-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
}

.story-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.story-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.story-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.story-card:hover .story-image img {
    transform: scale(1.1);
}

.story-overlay {
    position: absolute;
    top: 20px;
    right: 20px;
}

.story-category {
    background: rgba(102, 126, 234, 0.9);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.story-content {
    padding: 20px;
}

.story-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 10px;
}

.story-text {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 15px;
}

.story-impact {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.impact-tag {
    background: #f8f9fa;
    color: #41e081;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Timeline */
.timeline {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(45deg, #d8dc5a, #41e081);
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    margin-bottom: 50px;
}

.timeline-item:nth-child(odd) .timeline-content {
    margin-right: 50%;
    padding-right: 40px;
    text-align: right;
}

.timeline-item:nth-child(even) .timeline-content {
    margin-left: 50%;
    padding-left: 40px;
}

.timeline-marker {
    position: absolute;
    left: 50%;
    top: 0;
    transform: translateX(-50%);
}

.timeline-dot {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: linear-gradient(45deg, #d8dc5a, #41e081);
    border: 4px solid white;
    box-shadow: 0 0 0 4px rgba(65, 224, 129, 0.2);
}

.timeline-year {
    font-size: 1.2rem;
    font-weight: bold;
    color: #41e081;
    margin-bottom: 10px;
}

.timeline-title {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 10px;
}

.timeline-description {
    color: #6c757d;
    line-height: 1.6;
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
    
    .impact-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .area-metrics {
        flex-direction: column;
        gap: 10px;
    }
    
    .timeline::before {
        left: 20px;
    }
    
    .timeline-item:nth-child(odd) .timeline-content,
    .timeline-item:nth-child(even) .timeline-content {
        margin-left: 60px;
        margin-right: 0;
        padding-left: 20px;
        padding-right: 0;
        text-align: left;
    }
    
    .timeline-marker {
        left: 20px;
    }
    
    .story-impact {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Helper function
function getImpactIcon(title) {
    const icons = {
        'Youth Trained': 'fa-users',
        'Jobs Created': 'fa-briefcase',
        'Startups Launched': 'fa-rocket',
        'Countries Reached': 'fa-globe',
        'Communities Impacted': 'fa-home',
        'Projects Completed': 'fa-check-circle'
    };
    return icons[title] || 'fa-chart-line';
}

// Counter animation for impact stats
function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + '+';
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
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(stat => {
        counterObserver.observe(stat);
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

// Animate timeline items on scroll
const timelineObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, { threshold: 0.3 });

document.addEventListener('DOMContentLoaded', function() {
    const timelineItems = document.querySelectorAll('.timeline-item');
    timelineItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        timelineObserver.observe(item);
    });
});
</script>
@endpush
