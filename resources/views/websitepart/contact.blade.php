@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="contact-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Contact Us</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Get in touch with us and let's create impact together
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Support Available</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">< 1hr</div>
                            <div class="stat-label">Response Time</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">100%</div>
                            <div class="stat-label">Satisfaction Rate</div>
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

<!-- Contact Information -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Get in Touch</h2>
            <p class="lead text-muted">Multiple ways to reach us</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="contact-info-card text-center p-4">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4 class="contact-title">Visit Us</h4>
                    <p class="contact-details">
                        Kijana Hub Africa Headquarters<br>
                        Dar es Salaam, Tanzania<br>
                        East Africa
                    </p>
                    <button class="btn btn-outline-primary btn-sm" onclick="openMap()">
                        <i class="fas fa-map"></i> Get Directions
                    </button>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="contact-info-card text-center p-4">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h4 class="contact-title">Call Us</h4>
                    <p class="contact-details">
                        Main: +255 700 000 000<br>
                        Support: +255 754 000 000<br>
                        WhatsApp: +255 689 000 000
                    </p>
                    <button class="btn btn-outline-primary btn-sm" onclick="makeCall()">
                        <i class="fas fa-phone-alt"></i> Call Now
                    </button>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="contact-info-card text-center p-4">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4 class="contact-title">Email Us</h4>
                    <p class="contact-details">
                        General: info@kijanahub.africa<br>
                        Support: support@kijanahub.africa<br>
                        Partnerships: partnerships@kijanahub.africa
                    </p>
                    <button class="btn btn-outline-primary btn-sm" onclick="openEmail()">
                        <i class="fas fa-envelope"></i> Send Email
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Send Us a Message</h2>
            <p class="lead text-muted">We'd love to hear from you</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-form-card">
                    <div class="contact-form-header">
                        <h3 class="form-title">Contact Form</h3>
                        <p class="form-subtitle">Fill out the form below and we'll get back to you soon</p>
                    </div>
                    
                    <form method="POST" action="{{ route('contact.store') }}" class="contact-form" id="contactForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                                    <div class="form-help">Your name as you'd like us to address you</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" name="email" placeholder="your.email@example.com" required>
                                    <div class="form-help">We'll use this to respond to your message</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="+255 XXX XXX XXX">
                                    <div class="form-help">Optional - include country code</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Subject *</label>
                                    <select class="form-select" name="subject">
                                        <option value="">Select a subject</option>
                                        <option value="general_inquiry">General Inquiry</option>
                                        <option value="program_information">Program Information</option>
                                        <option value="partnership">Partnership Opportunity</option>
                                        <option value="volunteer">Volunteer Interest</option>
                                        <option value="support">Technical Support</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="form-help">Choose the most relevant subject</div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Message *</label>
                                    <textarea class="form-control" name="message" rows="6" placeholder="Tell us more about your inquiry..." required></textarea>
                                    <div class="form-help">Provide as much detail as possible to help us assist you better</div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Preferred Contact Method</label>
                                    <select class="form-select" name="contact_method">
                                        <option value="email">Email</option>
                                        <option value="phone">Phone</option>
                                        <option value="whatsapp">WhatsApp</option>
                                        <option value="any">Any method</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">How did you hear about us?</label>
                                    <select class="form-select" name="referral_source">
                                        <option value="">Select source</option>
                                        <option value="social_media">Social Media</option>
                                        <option value="search_engine">Search Engine</option>
                                        <option value="friend">Friend or Colleague</option>
                                        <option value="event">Event or Workshop</option>
                                        <option value="website">Our Website</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter_signup">
                                        <label class="form-check-label" for="newsletter">
                                            I'd like to receive updates about programs and events
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                        <i class="fas fa-paper-plane"></i> Send Message
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary btn-lg" onclick="resetContactForm()">
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

<!-- Office Hours -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Office Hours</h2>
            <p class="lead text-muted">When you can reach us</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="office-hours-card">
                    <div class="hours-grid">
                        <div class="hours-item">
                            <div class="hours-day">Monday - Friday</div>
                            <div class="hours-time">9:00 AM - 6:00 PM</div>
                            <div class="hours-status open">Open Now</div>
                        </div>
                        
                        <div class="hours-item">
                            <div class="hours-day">Saturday</div>
                            <div class="hours-time">9:00 AM - 2:00 PM</div>
                            <div class="hours-status">Limited Hours</div>
                        </div>
                        
                        <div class="hours-item">
                            <div class="hours-day">Sunday</div>
                            <div class="hours-time">Closed</div>
                            <div class="hours-status closed">Closed</div>
                        </div>
                        
                        <div class="hours-item">
                            <div class="hours-day">Public Holidays</div>
                            <div class="hours-time">Closed</div>
                            <div class="hours-status closed">Closed</div>
                        </div>
                    </div>
                    
                    <div class="emergency-contact">
                        <h4 class="emergency-title">Emergency Contact</h4>
                        <p class="emergency-text">For urgent matters outside office hours:</p>
                        <div class="emergency-info">
                            <div class="emergency-item">
                                <i class="fas fa-phone-alt"></i>
                                <span>+255 689 000 000 (Emergency Line)</span>
                            </div>
                            <div class="emergency-item">
                                <i class="fas fa-envelope"></i>
                                <span>emergency@kijanahub.africa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Our Team</h2>
            <p class="lead text-muted">Meet the people behind Kijana Hub Africa</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card text-center">
                    <div class="member-image">
                        <img src="{{ asset('images/team-1.jpg') }}" alt="Team Member" class="img-fluid" onerror="this.src='{{ asset('assets/k1.jpeg') }}'">
                    </div>
                    <h4 class="member-name">John Smith</h4>
                    <p class="member-position">Executive Director</p>
                    <div class="member-contact">
                        <a href="mailto:john@kijanahub.africa" class="contact-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="tel:+255700000001" class="contact-link">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card text-center">
                    <div class="member-image">
                        <img src="{{ asset('images/team-2.jpg') }}" alt="Team Member" class="img-fluid" onerror="this.src='{{ asset('assets/k8.jpeg') }}'">
                    </div>
                    <h4 class="member-name">Sarah Johnson</h4>
                    <p class="member-position">Program Manager</p>
                    <div class="member-contact">
                        <a href="mailto:sarah@kijanahub.africa" class="contact-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="tel:+255700000002" class="contact-link">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card text-center">
                    <div class="member-image">
                        <img src="{{ asset('images/team-3.jpg') }}" alt="Team Member" class="img-fluid" onerror="this.src='{{ asset('assets/k9.jpeg') }}'">
                    </div>
                    <h4 class="member-name">Michael Brown</h4>
                    <p class="member-position">Technical Lead</p>
                    <div class="member-contact">
                        <a href="mailto:michael@kijanahub.africa" class="contact-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="tel:+255700000003" class="contact-link">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="team-member-card text-center">
                    <div class="member-image">
                        <img src="{{ asset('images/team-4.jpg') }}" alt="Team Member" class="img-fluid" onerror="this.src='{{ asset('assets/k4.jpeg') }}'">
                    </div>
                    <h4 class="member-name">Emily Davis</h4>
                    <p class="member-position">Community Manager</p>
                    <div class="member-contact">
                        <a href="mailto:emily@kijanahub.africa" class="contact-link">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="tel:+255700000004" class="contact-link">
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="display-4 fw-bold text-primary mb-4">Stay Connected</h2>
                <p class="lead text-muted mb-4">
                    Subscribe to our newsletter and never miss updates on programs, events, and opportunities
                </p>
                <div class="newsletter-benefits">
                    <div class="benefit-item">
                        <i class="fas fa-check-circle text-success"></i>
                        <span>Weekly program updates</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle text-success"></i>
                        <span>Exclusive event invitations</span>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-check-circle text-success"></i>
                        <span>Skill development tips</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter-card">
                    <h4 class="newsletter-title">Subscribe to Our Newsletter</h4>
                    <form method="POST" action="{{ route('newsletter.store') }}" class="newsletter-form" id="newsletterForm">
                        @csrf
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email address" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to receive marketing emails
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="newsletterBtn">
                            <i class="fas fa-envelope"></i> Subscribe Now
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
.contact-hero-section {
    background: linear-gradient(135deg, #34C759 0%, #2E865F 100%);
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
    background-image: url('{{ asset('assets/k8.jpeg') }}');
    opacity: 0.2;
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

/* Contact Info Cards */
.contact-info-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
}

.contact-info-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.contact-icon {
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

.contact-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.contact-details {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* Contact Form Card */
.contact-form-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.contact-form-header {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 40px;
    text-align: center;
}

.form-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.form-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
}

.contact-form {
    padding: 40px;
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

.form-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 30px;
}

/* Office Hours Card */
.office-hours-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.hours-grid {
    margin-bottom: 40px;
}

.hours-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #e0e0e0;
}

.hours-item:last-child {
    border-bottom: none;
}

.hours-day {
    font-weight: 600;
    color: #2c3e50;
}

.hours-time {
    color: #6c757d;
}

.hours-status {
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
}

.hours-status.open {
    background: #d4edda;
    color: #155724;
}

.hours-status.closed {
    background: #f8d7da;
    color: #721c24;
}

.emergency-contact {
    background: #fff3cd;
    border: 1px solid #ffeaa7;
    border-radius: 15px;
    padding: 25px;
}

.emergency-title {
    color: #856404;
    font-weight: bold;
    margin-bottom: 10px;
}

.emergency-text {
    color: #856404;
    margin-bottom: 15px;
}

.emergency-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.emergency-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #856404;
}

/* Team Member Cards */
.team-member-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    padding: 30px 20px;
}

.team-member-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.member-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 20px;
}

.member-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.member-name {
    font-size: 1.1rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 5px;
}

.member-position {
    color: #41e081;
    margin-bottom: 15px;
}

.member-contact {
    display: flex;
    justify-content: center;
    gap: 15px;
}

.contact-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f8f9fa;
    color: #41e081;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all 0.3s ease;
}

.contact-link:hover {
    background: #41e081;
    color: white;
    transform: translateY(-3px);
}

/* Newsletter Card */
.newsletter-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.newsletter-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 20px;
}

.newsletter-benefits {
    margin-top: 20px;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    color: #6c757d;
}

/* Social Media Card */
.social-media-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.social-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
}

.social-link {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    border-radius: 15px;
    text-decoration: none;
    transition: all 0.3s ease;
    color: white;
}

.social-link.facebook {
    background: #1877f2;
}

.social-link.twitter {
    background: #1da1f2;
}

.social-link.instagram {
    background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
}

.social-link.linkedin {
    background: #0077b5;
}

.social-link.youtube {
    background: #ff0000;
}

.social-link.whatsapp {
    background: #25d366;
}

.social-link:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
}

.social-link i {
    font-size: 1.5rem;
    width: 30px;
    text-align: center;
}

.social-info h5 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: bold;
}

.social-info p {
    margin: 0;
    opacity: 0.9;
    font-size: 0.9rem;
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
    
    .contact-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .contact-form-header {
        padding: 30px 20px;
    }
    
    .contact-form {
        padding: 30px 20px;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .hours-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
    
    .social-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Contact functions
function openMap() {
    window.open('https://maps.google.com/?q=Kijana+Hub+Africa+Dar+es+Salaam+Tanzania', '_blank');
}

function makeCall() {
    window.open('tel:+255700000000', '_self');
}

function openEmail() {
    window.open('mailto:info@kijanahub.africa', '_self');
}

// Reset contact form
function resetContactForm() {
    if (confirm('Are you sure you want to reset the form? All entered data will be lost.')) {
        document.getElementById('contactForm').reset();
    }
}

// Form submission enhancement
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;
            
            // Allow actual form submission to proceed
            // The form will submit to the server and handle the response
        });
    }
    
    // Newsletter form
    const newsletterForm = document.getElementById('newsletterForm');
    const newsletterBtn = document.getElementById('newsletterBtn');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            // Show loading state
            newsletterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Subscribing...';
            newsletterBtn.disabled = true;
            
            // Simulate form submission (remove this in production)
            setTimeout(() => {
                newsletterBtn.innerHTML = '<i class="fas fa-check"></i> Subscribed!';
                newsletterBtn.style.background = '#28a745';
                
                // Show success message
                const successAlert = document.createElement('div');
                successAlert.className = 'alert alert-success mt-3';
                successAlert.innerHTML = '<i class="fas fa-check-circle"></i> Thank you for subscribing to our newsletter!';
                newsletterForm.appendChild(successAlert);
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    newsletterForm.reset();
                    newsletterBtn.innerHTML = '<i class="fas fa-envelope"></i> Subscribe Now';
                    newsletterBtn.style.background = '';
                    newsletterBtn.disabled = false;
                    successAlert.remove();
                }, 3000);
            }, 1500);
            
            // Prevent actual form submission for demo
            e.preventDefault();
        });
    }
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
