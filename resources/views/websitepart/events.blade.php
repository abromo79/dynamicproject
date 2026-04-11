@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="events-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Events</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Join our workshops, webinars, and community events to learn and connect
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Events Hosted</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">2000+</div>
                            <div class="stat-label">Attendees</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">15+</div>
                            <div class="stat-label">Expert Speakers</div>
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

<!-- Event Type Filter -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Event Calendar</h2>
            <p class="lead text-muted">Discover and join our upcoming events</p>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Events</button>
                    <button class="filter-btn" data-filter="webinar">Webinars</button>
                    <button class="filter-btn" data-filter="workshop">Workshops</button>
                    <button class="filter-btn" data-filter="bootcamp">Bootcamps</button>
                    <button class="filter-btn" data-filter="community_event">Community</button>
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
            <p class="lead text-muted">Don't miss out on these exciting opportunities</p>
        </div>
        
        <div class="row g-4" id="upcoming-events-container">
            @foreach($upcoming as $item)
            <div class="col-lg-6 event-item" data-type="{{ $item->type }}">
                <div class="event-card h-100">
                    <div class="event-header">
                        <div class="event-date">
                            <div class="date-day">{{ \Carbon\Carbon::parse($item->event_date)->format('d') }}</div>
                            <div class="date-month">{{ \Carbon\Carbon::parse($item->event_date)->format('M') }}</div>
                        </div>
                        <div class="event-type">
                            <span class="type-badge type-{{ $item->type }}">
                                <i class="fas @if($item->type == 'webinar') fa-video @elseif($item->type == 'workshop') fa-tools @elseif($item->type == 'bootcamp') fa-rocket @elseif($item->type == 'community_event') fa-users @else fa-calendar @endif"></i>
                                {{ ucwords(str_replace('_', ' ', $item->type)) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="event-body">
                        <h3 class="event-title">{{ $item->title }}</h3>
                        <div class="event-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt text-primary"></i>
                                <span>{{ \Carbon\Carbon::parse($item->event_date)->format('F j, Y') }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-clock text-primary"></i>
                                <span>{{ \Carbon\Carbon::parse($item->event_date)->format('g:i A') }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span>{{ $item->location }}</span>
                            </div>
                        </div>
                        
                        <div class="event-features">
                            <div class="feature-item">
                                <i class="fas fa-users text-success"></i>
                                <span>{{ rand(20, 100) }}+ Attendees</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-microphone text-info"></i>
                                <span>{{ rand(1, 3) }}+ Speakers</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-certificate text-warning"></i>
                                <span>Certificate Available</span>
                            </div>
                        </div>
                        
                        <div class="event-description">
                            <p>{{ ['Join us for an engaging session focused on practical skills and real-world applications.', 'This event brings together industry experts to share insights and best practices.', 'An interactive workshop designed to enhance your knowledge and hands-on experience.', 'Connect with peers and professionals in this collaborative learning environment.', 'Discover new trends and innovations in this comprehensive learning experience.'][array_rand(['Join us for an engaging session focused on practical skills and real-world applications.', 'This event brings together industry experts to share insights and best practices.', 'An interactive workshop designed to enhance your knowledge and hands-on experience.', 'Connect with peers and professionals in this collaborative learning environment.', 'Discover new trends and innovations in this comprehensive learning experience.'])] }}</p>
                        </div>
                    </div>
                    
                    <div class="event-footer">
                        <button class="btn btn-outline-primary btn-sm" onclick="showEventDetails({{ $item->id }})">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                        <button class="btn btn-primary btn-sm" onclick="registerEvent({{ $item->id }})">
                            <i class="fas fa-ticket-alt"></i> Register Now
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($upcoming) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-calendar-alt fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">No Upcoming Events</h4>
                <p class="text-muted">Check back soon for new events and workshops.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Past Events -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Past Events</h2>
            <p class="lead text-muted">See what we've accomplished together</p>
        </div>
        
        <div class="row g-4" id="past-events-container">
            @foreach($past as $item)
            <div class="col-lg-6 event-item" data-type="{{ $item->type }}">
                <div class="event-card past-event h-100">
                    <div class="event-header">
                        <div class="event-date">
                            <div class="date-day">{{ \Carbon\Carbon::parse($item->event_date)->format('d') }}</div>
                            <div class="date-month">{{ \Carbon\Carbon::parse($item->event_date)->format('M') }}</div>
                        </div>
                        <div class="event-type">
                            <span class="type-badge type-{{ $item->type }}">
                                <i class="fas @if($item->type == 'webinar') fa-video @elseif($item->type == 'workshop') fa-tools @elseif($item->type == 'bootcamp') fa-rocket @elseif($item->type == 'community_event') fa-users @else fa-calendar @endif"></i>
                                {{ ucwords(str_replace('_', ' ', $item->type)) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="event-body">
                        <h3 class="event-title">{{ $item->title }}</h3>
                        <div class="event-details">
                            <div class="detail-item">
                                <i class="fas fa-calendar-alt text-muted"></i>
                                <span>{{ \Carbon\Carbon::parse($item->event_date)->format('F j, Y') }}</span>
                            </div>
                            <div class="detail-item">
                                <i class="fas fa-map-marker-alt text-muted"></i>
                                <span>{{ $item->location }}</span>
                            </div>
                        </div>
                        
                        <div class="event-features">
                            <div class="feature-item">
                                <i class="fas fa-users text-muted"></i>
                                <span>{{ rand(50, 200) }}+ Attended</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-star text-warning"></i>
                                <span>{{ number_format(4.5 + rand(0, 4) * 0.1, 1) }} Rating</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-images text-info"></i>
                                <span>{{ rand(10, 50) }}+ Photos</span>
                            </div>
                        </div>
                        
                        <div class="event-description">
                            <p>{{ ['Join us for an engaging session focused on practical skills and real-world applications.', 'This event brings together industry experts to share insights and best practices.', 'An interactive workshop designed to enhance your knowledge and hands-on experience.', 'Connect with peers and professionals in this collaborative learning environment.', 'Discover new trends and innovations in this comprehensive learning experience.'][array_rand(['Join us for an engaging session focused on practical skills and real-world applications.', 'This event brings together industry experts to share insights and best practices.', 'An interactive workshop designed to enhance your knowledge and hands-on experience.', 'Connect with peers and professionals in this collaborative learning environment.', 'Discover new trends and innovations in this comprehensive learning experience.'])] }}</p>
                        </div>
                    </div>
                    
                    <div class="event-footer">
                        <button class="btn btn-outline-primary btn-sm" onclick="showEventDetails({{ $item->id }})">
                            <i class="fas fa-info-circle"></i> View Details
                        </button>
                        <button class="btn btn-outline-secondary btn-sm" onclick="viewEventGallery({{ $item->id }})">
                            <i class="fas fa-images"></i> View Gallery
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($past) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-history fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">No Past Events</h4>
                <p class="text-muted">We're just getting started with our event series.</p>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Event Statistics -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Event Impact</h2>
            <p class="lead text-muted">The numbers behind our success</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="impact-stat text-center">
                    <div class="stat-number" data-target="95">95%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="impact-stat text-center">
                    <div class="stat-number" data-target="2000">2K+</div>
                    <div class="stat-label">Total Attendees</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="impact-stat text-center">
                    <div class="stat-number" data-target="50">50+</div>
                    <div class="stat-label">Events Hosted</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="impact-stat text-center">
                    <div class="stat-number" data-target="25">25+</div>
                    <div class="stat-label">Expert Speakers</div>
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
                <h2 class="display-4 fw-bold text-white mb-4">Stay Updated</h2>
                <p class="lead text-white mb-5">
                    Subscribe to our newsletter and never miss an upcoming event
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                        <i class="fas fa-envelope"></i> Subscribe
                    </a>
                    <a href="{{ route('get-involved') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-calendar-plus"></i> Host Event
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Details Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="eventModalBody">
                <!-- Content will be dynamically loaded -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="registerEvent(0)">Register Now</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.events-hero-section {
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
    background-image: url('{{ asset('assets/k7.jpeg') }}');
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

/* Event Cards */
.event-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.past-event {
    opacity: 0.9;
}

.event-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 20px 0;
}

.event-date {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    border-radius: 10px;
    padding: 10px 15px;
    text-align: center;
    min-width: 60px;
}

.date-day {
    font-size: 1.5rem;
    font-weight: bold;
    line-height: 1;
}

.date-month {
    font-size: 0.8rem;
    text-transform: uppercase;
}

.type-badge {
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

.type-webinar { background: linear-gradient(135deg, #007bff, #6610f2); }
.type-workshop { background: linear-gradient(135deg, #28a745, #20c997); }
.type-bootcamp { background: linear-gradient(135deg, #fd7e14, #e83e8c); }
.type-community_event { background: linear-gradient(135deg, #17a2b8, #6f42c1); }

.event-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.event-title {
    font-size: 1.3rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
}

.event-details {
    margin-bottom: 20px;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #6c757d;
}

.event-features {
    margin-bottom: 20px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #6c757d;
}

.event-description {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.event-footer {
    display: flex;
    gap: 10px;
    padding: 20px;
    border-top: 1px solid #e0e0e0;
}

/* Impact Stats */
.impact-stat {
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    padding: 30px 20px;
    transition: all 0.3s ease;
}

.impact-stat:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.impact-stat .stat-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #41e081;
    margin-bottom: 10px;
}

.impact-stat .stat-label {
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
    
    .events-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .event-footer {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Helper functions
function getEventIcon(type) {
    const icons = {
        'webinar': 'fa-video',
        'workshop': 'fa-tools',
        'bootcamp': 'fa-rocket',
        'community_event': 'fa-users'
    };
    return icons[type] || 'fa-calendar';
}

function getEventDescription(title) {
    const descriptions = [
        'Join us for an engaging session focused on practical skills and real-world applications.',
        'This event brings together industry experts to share insights and best practices.',
        'An interactive workshop designed to enhance your knowledge and hands-on experience.',
        'Connect with peers and professionals in this collaborative learning environment.',
        'Discover new trends and innovations in this comprehensive learning experience.'
    ];
    return descriptions[Math.floor(Math.random() * descriptions.length)];
}

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const eventItems = document.querySelectorAll('.event-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter events
            eventItems.forEach(item => {
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
    
    // Initialize event items with animation
    eventItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Trigger initial animation
    setTimeout(() => {
        eventItems.forEach(item => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
    }, 100);
});

// Event details function
function showEventDetails(eventId) {
    const modalBody = document.getElementById('eventModalBody');
    modalBody.innerHTML = `
        <div class="text-center mb-4">
            <div class="event-icon">
                <i class="fas fa-calendar-alt fa-3x text-primary"></i>
            </div>
        </div>
        <h4 class="text-center mb-3">Event Details</h4>
        <p>This event offers valuable learning opportunities with expert speakers and hands-on activities.</p>
        <h5 class="mb-3">What You'll Learn:</h5>
        <ul>
            <li>Industry best practices and current trends</li>
            <li>Practical skills and applications</li>
            <li>Networking opportunities with peers</li>
            <li>Certificate of completion</li>
        </ul>
        <h5 class="mb-3">Who Should Attend:</h5>
        <ul>
            <li>Students and young professionals</li>
            <li>Industry practitioners</li>
            <li>Entrepreneurs and innovators</li>
            <li>Anyone interested in personal development</li>
        </ul>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('eventModal'));
    modal.show();
}

// Registration function
function registerEvent(eventId) {
    alert('Thank you for your interest! Registration details will be sent to your email.');
}

// Gallery function
function viewEventGallery(eventId) {
    alert('Event gallery coming soon! Check back for photos and videos from our past events.');
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

// Observe impact numbers
document.addEventListener('DOMContentLoaded', function() {
    const impactNumbers = document.querySelectorAll('.impact-stat .stat-number');
    impactNumbers.forEach(stat => {
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
</script>
@endpush
