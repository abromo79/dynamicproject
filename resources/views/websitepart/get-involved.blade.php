@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="get-involved-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Get Involved</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Join our community and be part of the youth empowerment movement
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">5000+</div>
                            <div class="stat-label">Youth Engaged</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">25+</div>
                            <div class="stat-label">Programs Available</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Opportunities</div>
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

<!-- Involvement Options -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Ways to Get Involved</h2>
            <p class="lead text-muted">Choose how you want to make an impact</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="involvement-card text-center p-4">
                    <div class="involvement-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4 class="involvement-title">Join Programs</h4>
                    <p class="involvement-description">Enroll in our training programs and develop valuable skills</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="scrollToApplication('program')">Apply Now</button>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="involvement-card text-center p-4">
                    <div class="involvement-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h4 class="involvement-title">Find Opportunities</h4>
                    <p class="involvement-description">Discover internships, jobs, and fellowships</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="scrollToApplication('opportunity')">Explore</button>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="involvement-card text-center p-4">
                    <div class="involvement-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h4 class="involvement-title">Volunteer</h4>
                    <p class="involvement-description">Contribute your time and skills to our mission</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="scrollToApplication('volunteer')">Volunteer</button>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="involvement-card text-center p-4">
                    <div class="involvement-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="involvement-title">Partner</h4>
                    <p class="involvement-description">Collaborate with us to create impact</p>
                    <button class="btn btn-outline-primary btn-sm" onclick="scrollToApplication('partner')">Partner</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Application Form Section -->
<section class="py-5" id="application-section">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Start Your Journey</h2>
            <p class="lead text-muted">Fill out the form below and we'll get back to you soon</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="application-card">
                    <div class="application-header">
                        <h3 class="application-title">Application Form</h3>
                        <p class="application-subtitle">Tell us about yourself and how you'd like to get involved</p>
                    </div>
                    
                    <form method="POST" action="{{ route('apply.store') }}" class="application-form" id="applicationForm">
                        @csrf
                        <div class="row g-4">
                            <!-- Personal Information -->
                            <div class="col-12">
                                <div class="form-section">
                                    <h4 class="form-section-title">
                                        <i class="fas fa-user"></i> Personal Information
                                    </h4>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" name="full_name" placeholder="Enter your full name" required>
                                    <div class="form-help">Your legal name as it appears on official documents</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" name="email" placeholder="your.email@example.com" required>
                                    <div class="form-help">We'll use this to contact you</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="+255 XXX XXX XXX">
                                    <div class="form-help">Include country code</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="date_of_birth">
                                    <div class="form-help">Helps us tailor programs for you</div>
                                </div>
                            </div>
                            
                            <!-- Involvement Type -->
                            <div class="col-12">
                                <div class="form-section">
                                    <h4 class="form-section-title">
                                        <i class="fas fa-bullseye"></i> How Would You Like to Get Involved?
                                    </h4>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Program Interest</label>
                                    <select class="form-select" name="program_id" onchange="updateOpportunityOptions()">
                                        <option value="">Select a Program</option>
                                        @foreach($programs as $p)
                                        <option value="{{ $p->id }}">{{ $p->title }}</option>
                                        @endforeach
                                        <option value="general">General Interest</option>
                                    </select>
                                    <div class="form-help">Choose a specific program or general interest</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Opportunity Interest</label>
                                    <select class="form-select" name="opportunity_id">
                                        <option value="">Select an Opportunity</option>
                                        @foreach($opportunities as $o)
                                        <option value="{{ $o->id }}">{{ $o->title }}</option>
                                        @endforeach
                                        <option value="general">General Interest</option>
                                    </select>
                                    <div class="form-help">Available positions and opportunities</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Involvement Type</label>
                                    <select class="form-select" name="involvement_type">
                                        <option value="">Select Type</option>
                                        <option value="participant">Program Participant</option>
                                        <option value="volunteer">Volunteer</option>
                                        <option value="partner">Partner Organization</option>
                                        <option value="mentor">Mentor</option>
                                        <option value="sponsor">Sponsor</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="form-help">How you'd like to contribute</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Availability</label>
                                    <select class="form-select" name="availability">
                                        <option value="">Select Availability</option>
                                        <option value="full-time">Full-time</option>
                                        <option value="part-time">Part-time</option>
                                        <option value="weekends">Weekends Only</option>
                                        <option value="flexible">Flexible</option>
                                    </select>
                                    <div class="form-help">Your time availability</div>
                                </div>
                            </div>
                            
                            <!-- Skills & Experience -->
                            <div class="col-12">
                                <div class="form-section">
                                    <h4 class="form-section-title">
                                        <i class="fas fa-tools"></i> Skills & Experience
                                    </h4>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Skills & Expertise</label>
                                    <textarea class="form-control" name="skills" rows="4" placeholder="Tell us about your skills, experience, and what you're passionate about..."></textarea>
                                    <div class="form-help">Include technical skills, soft skills, and any relevant experience</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Education Level</label>
                                    <select class="form-select" name="education_level">
                                        <option value="">Select Education Level</option>
                                        <option value="high_school">High School</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="bachelor">Bachelor's Degree</option>
                                        <option value="master">Master's Degree</option>
                                        <option value="phd">PhD</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="form-help">Highest level of education completed</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Field of Study</label>
                                    <input type="text" class="form-control" name="field_of_study" placeholder="e.g., Computer Science, Business, etc.">
                                    <div class="form-help">Your academic or professional field</div>
                                </div>
                            </div>
                            
                            <!-- Additional Information -->
                            <div class="col-12">
                                <div class="form-section">
                                    <h4 class="form-section-title">
                                        <i class="fas fa-info-circle"></i> Additional Information
                                    </h4>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Motivation</label>
                                    <textarea class="form-control" name="motivation" rows="3" placeholder="Why do you want to get involved with Kijana Hub Africa?"></textarea>
                                    <div class="form-help">Tell us what motivates you to join our community</div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">How did you hear about us?</label>
                                    <select class="form-select" name="referral_source">
                                        <option value="">Select Source</option>
                                        <option value="social_media">Social Media</option>
                                        <option value="friend">Friend or Colleague</option>
                                        <option value="event">Event or Workshop</option>
                                        <option value="website">Our Website</option>
                                        <option value="search">Search Engine</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Terms & Submit -->
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="link-primary">Terms of Service</a> and <a href="#" class="link-primary">Privacy Policy</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                        <i class="fas fa-paper-plane"></i> Submit Application
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetForm()">
                                        <i class="fas fa-redo"></i> Reset Form
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
            <p class="lead text-muted">Hear from those who've joined our community</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="story-card">
                    <div class="story-image">
                        <img src="{{ asset('images/story-1.jpg') }}" alt="Success Story" class="img-fluid" onerror="this.src='{{ asset('assets/k5.jpeg') }}'">
                    </div>
                    <div class="story-content">
                        <h4 class="story-title">Maria J. - Web Developer</h4>
                        <p class="story-text">"The training program transformed my career. I went from unemployed to a junior developer in just 6 months!"</p>
                        <div class="story-meta">
                            <span class="story-program">Web Development Program</span>
                            <span class="story-date">Graduated 2024</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="story-card">
                    <div class="story-image">
                        <img src="{{ asset('images/story-2.jpg') }}" alt="Success Story" class="img-fluid" onerror="this.src='{{ asset('assets/k8.jpeg') }}'">
                    </div>
                    <div class="story-content">
                        <h4 class="story-title">John K. - Entrepreneur</h4>
                        <p class="story-text">"The innovation hub gave me the skills and confidence to start my own tech company."</p>
                        <div class="story-meta">
                            <span class="story-program">Innovation Hub</span>
                            <span class="story-date">Graduated 2023</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="story-card">
                    <div class="story-image">
                        <img src="{{ asset('images/story-3.jpg') }}" alt="Success Story" class="img-fluid" onerror="this.src='{{ asset('assets/k7.jpeg') }}'">
                    </div>
                    <div class="story-content">
                        <h4 class="story-title">Sarah M. - Data Analyst</h4>
                        <p class="story-text">"The mentorship program connected me with industry leaders who guided my career path."</p>
                        <div class="story-meta">
                            <span class="story-program">Mentorship Program</span>
                            <span class="story-date">Graduated 2024</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Frequently Asked Questions</h2>
            <p class="lead text-muted">Common questions about getting involved</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Who can apply to your programs?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Our programs are open to all youth aged 18-35 who are passionate about technology and innovation. We welcome applicants from diverse backgrounds and experience levels.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Are there any costs involved?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Many of our programs are free or heavily subsidized through partnerships and grants. Some specialized programs may have nominal fees to cover materials. We also offer scholarships for those who need financial assistance.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                How long do the programs typically last?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Program durations vary from 2-week intensive workshops to 6-month comprehensive training programs. Each program description includes specific duration information.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What happens after I submit my application?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We review all applications within 2-3 weeks. Shortlisted candidates will be contacted for an interview or assessment. All applicants receive notification of their application status.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-4 fw-bold text-primary mb-4">Still Have Questions?</h2>
                <p class="lead text-muted mb-4">
                    Our team is here to help you find the best way to get involved. Reach out to us and we'll guide you through the process.
                </p>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>info@kijanahub.africa</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+255 700 000 000</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Dar es Salaam, Tanzania</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-card">
                    <h4 class="contact-title">Quick Contact Form</h4>
                    <form class="contact-form">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary w-100" onclick="sendQuickContact()">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.get-involved-hero-section {
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

/* Involvement Cards */
.involvement-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
}

.involvement-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.involvement-icon {
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

.involvement-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.involvement-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Application Card */
.application-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.application-header {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 40px;
    text-align: center;
}

.application-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.application-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
}

.application-form {
    padding: 40px;
}

.form-section {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e0e0e0;
}

.form-section-title {
    color: #2c3e50;
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-section-title i {
    color: #41e081;
}

.form-group {
    margin-bottom: 25px;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 8px;
}

.form-control, .form-select {
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #41e081;
    box-shadow: 0 0 0 0.2rem rgba(65, 224, 129, 0.25);
}

.form-help {
    font-size: 0.85rem;
    color: #6c757d;
    margin-top: 5px;
}

.form-check {
    margin-bottom: 20px;
}

.form-check-input:checked {
    background-color: #41e081;
    border-color: #41e081;
}

.link-primary {
    color: #41e081;
    text-decoration: none;
}

.link-primary:hover {
    text-decoration: underline;
}

.form-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 30px;
}

/* Story Cards */
.story-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.story-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.story-image {
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
    transform: scale(1.05);
}

.story-content {
    padding: 25px;
}

.story-title {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.story-text {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 15px;
}

.story-meta {
    display: flex;
    justify-content: space-between;
    font-size: 0.85rem;
    color: #6c757d;
}

.story-program {
    font-weight: 600;
    color: #41e081;
}

/* FAQ Accordion */
.accordion-item {
    border: none;
    margin-bottom: 15px;
    border-radius: 10px !important;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.accordion-button {
    background: white;
    color: #2c3e50;
    font-weight: 600;
    border: none;
    padding: 20px;
}

.accordion-button:not(.collapsed) {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
}

.accordion-button:focus {
    box-shadow: none;
}

.accordion-button::after {
    filter: invert(1);
}

/* Contact Section */
.contact-info {
    margin-top: 30px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 1.1rem;
}

.contact-item i {
    color: #41e081;
    font-size: 1.2rem;
    width: 20px;
}

.contact-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.contact-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 20px;
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
    
    .get-involved-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .application-header {
        padding: 30px 20px;
    }
    
    .application-form {
        padding: 30px 20px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .story-meta {
        flex-direction: column;
        gap: 5px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Scroll to application section
function scrollToApplication(type) {
    const section = document.getElementById('application-section');
    section.scrollIntoView({ behavior: 'smooth' });
    
    // Focus on relevant field based on type
    setTimeout(() => {
        if (type === 'program') {
            document.querySelector('select[name="program_id"]').focus();
        } else if (type === 'opportunity') {
            document.querySelector('select[name="opportunity_id"]').focus();
        }
    }, 500);
}

// Update opportunity options based on program selection
function updateOpportunityOptions() {
    const programSelect = document.querySelector('select[name="program_id"]');
    const opportunitySelect = document.querySelector('select[name="opportunity_id"]');
    
    // This would typically filter opportunities based on selected program
    // For now, we'll just keep all options available
}

// Reset form
function resetForm() {
    if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
        document.getElementById('applicationForm').reset();
    }
}

// Form submission enhancement
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('applicationForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            submitBtn.disabled = true;
            
            // Simulate form submission (remove this in production)
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Application Submitted!';
                submitBtn.style.background = '#28a745';
                
                // Show success message
                const successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success mt-3';
                successAlert.innerHTML = '<i class="fas fa-check-circle"></i> Your application has been submitted successfully! We will contact you soon.';
                form.appendChild(successAlert);
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    form.reset();
                    submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Application';
                    submitBtn.style.background = '';
                    submitBtn.disabled = false;
                    successAlert.remove();
                }, 3000);
            }, 2000);
            
            // Prevent actual form submission for demo
            e.preventDefault();
        });
    }
});

// Quick contact form
function sendQuickContact() {
    const form = document.querySelector('.contact-form');
    const inputs = form.querySelectorAll('input, textarea');
    
    // Basic validation
    let isValid = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            isValid = false;
        } else {
            input.classList.remove('is-invalid');
        }
    });
    
    if (isValid) {
        // Show success message
        const successMessage = document.createElement('div');
        successMessage.className = 'alert alert-success mt-3';
        successMessage.innerHTML = '<i class="fas fa-check-circle"></i> Message sent successfully! We\'ll get back to you soon.';
        form.appendChild(successMessage);
        
        // Reset form
        form.reset();
        
        // Remove message after 3 seconds
        setTimeout(() => {
            successMessage.remove();
        }, 3000);
    } else {
        // Show error message
        const errorMessage = document.createElement('div');
        errorMessage.className = 'alert alert-danger mt-3';
        errorMessage.innerHTML = '<i class="fas fa-exclamation-circle"></i> Please fill in all fields.';
        form.appendChild(errorMessage);
        
        // Remove message after 3 seconds
        setTimeout(() => {
            errorMessage.remove();
        }, 3000);
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
</script>
@endpush
