@extends('websitepart.layout')
@section('content')
<!-- Hero Section -->
<section class="blog-hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container py-5 position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-3 fw-bold text-white mb-4 animate-fade-in-up">Blog & Insights</h1>
                <p class="lead text-white mb-5 animate-fade-in-up animation-delay-200">
                    Discover stories, insights, and updates from our youth empowerment journey
                </p>
                <div class="row g-4 justify-content-center animate-fade-in-up animation-delay-400">
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">100+</div>
                            <div class="stat-label">Articles Published</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">50K+</div>
                            <div class="stat-label">Monthly Readers</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-card">
                            <div class="stat-number">15+</div>
                            <div class="stat-label">Contributors</div>
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

<!-- Featured Post -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Featured Story</h2>
            <p class="lead text-muted">Our most popular and impactful content</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="featured-post-card">
                    <div class="featured-image">
                        <img src="{{ asset('assets/k5.jpeg') }}" alt="Featured Post" class="img-fluid">
                        <div class="featured-overlay">
                            <div class="featured-category">Success Story</div>
                        </div>
                    </div>
                    <div class="featured-content">
                        <div class="featured-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>Admin</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>{{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>5 min read</span>
                            </div>
                        </div>
                        <h2 class="featured-title">How Digital Skills Are Transforming Youth Employment in Tanzania</h2>
                        <p class="featured-excerpt">
                            Discover how our innovative training programs are helping young Tanzanians secure meaningful employment in the digital economy, with real success stories from our graduates.
                        </p>
                        <div class="featured-stats">
                            <div class="stat-item">
                                <i class="fas fa-eye"></i>
                                <span>2.5K views</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-heart"></i>
                                <span>150 likes</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-comment"></i>
                                <span>25 comments</span>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg" onclick="readFeaturedPost()">
                            <i class="fas fa-book-open"></i> Read Full Story
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Category Filter -->
<section class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title text-center">Explore Articles</h2>
            <p class="lead text-muted">Filter by category to find content that interests you</p>
        </div>
        
        <div class="row justify-content-center mb-5">
            <div class="col-auto">
                <div class="filter-buttons">
                    <button class="filter-btn active" data-filter="all">All Posts</button>
                    <button class="filter-btn" data-filter="success_stories">Success Stories</button>
                    <button class="filter-btn" data-filter="tech_trends">Tech Trends</button>
                    <button class="filter-btn" data-filter="youth_empowerment">Youth Empowerment</button>
                    <button class="filter-btn" data-filter="innovation">Innovation</button>
                    <button class="filter-btn" data-filter="partnerships">Partnerships</button>
                    <button class="filter-btn" data-filter="events">Events</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Posts Grid -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row g-4" id="blog-posts-container">
            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 blog-post-item" data-category="{{ $post->category }}">
                <div class="blog-card h-100">
                    <div class="blog-image">
                        <img src="{{ asset('images/blog-' . $post->id . '.jpg') }}" alt="{{ $post->title }}" class="img-fluid" onerror="this.src='{{ asset('images/default-blog.jpg') }}'">
                        <div class="blog-overlay">
                            <div class="blog-category">@if($post->category == 'success_stories') Success Stories @elseif($post->category == 'tech_trends') Tech Trends @elseif($post->category == 'youth_empowerment') Youth Empowerment @elseif($post->category == 'innovation') Innovation @elseif($post->category == 'partnerships') Partnerships @elseif($post->category == 'events') Events @else Success Stories @endif</div>
                            <div class="blog-date">{{ \Carbon\Carbon::parse($post->created_at)->format('M j') }}</div>
                        </div>
                    </div>
                    
                    <div class="blog-content">
                        <div class="blog-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>{{ $post->author }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>{{ ceil(str_word_count($post->content) / 200) }} min read</span>
                            </div>
                        </div>
                        
                        <h3 class="blog-title">{{ $post->title }}</h3>
                        <p class="blog-excerpt">{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
                        
                        <div class="blog-tags">
                            @php
                                $tagArrays = [
                                    'success_stories' => ['Inspiration', 'Achievement', 'Impact'],
                                    'tech_trends' => ['Technology', 'Innovation', 'Digital'],
                                    'youth_empowerment' => ['Youth', 'Skills', 'Development'],
                                    'innovation' => ['Creativity', 'Solutions', 'Ideas'],
                                    'partnerships' => ['Collaboration', 'Community', 'Growth'],
                                    'events' => ['Workshops', 'Training', 'Networking']
                                ];
                                $tags = $tagArrays[$post->category] ?? ['General', 'Insights', 'Updates'];
                            @endphp
                            @foreach($tags as $tag)
                            <span class="blog-tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                        
                        <div class="blog-stats">
                            <div class="stat-item">
                                <i class="fas fa-eye"></i>
                                <span>{{ rand(500, 2000) }}</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-heart"></i>
                                <span>{{ rand(20, 100) }}</span>
                            </div>
                            <div class="stat-item">
                                <i class="fas fa-share"></i>
                                <span>{{ rand(5, 50) }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="blog-footer">
                        <button class="btn btn-outline-primary btn-sm" onclick="readPost({{ $post->id }})">
                            <i class="fas fa-book-open"></i> Read More
                        </button>
                        <button class="btn btn-outline-secondary btn-sm" onclick="sharePost({{ $post->id }})">
                            <i class="fas fa-share-alt"></i> Share
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($posts) == 0)
        <div class="text-center py-5">
            <div class="empty-state">
                <i class="fas fa-blog fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">No Articles Available</h4>
                <p class="text-muted">Check back soon for new insights and stories from our community.</p>
            </div>
        </div>
        @endif
        
        <!-- Load More Button -->
        <div class="text-center mt-5">
            <button class="btn btn-primary btn-lg" onclick="loadMorePosts()">
                <i class="fas fa-plus-circle"></i> Load More Articles
            </button>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-4 fw-bold text-primary mb-4">Stay Updated</h2>
                <p class="lead text-muted mb-5">
                    Subscribe to our newsletter and never miss an update on youth empowerment and digital innovation
                </p>
                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('newsletter.store') }}" class="newsletter-form-inline">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-paper-plane"></i> Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Reading Modal -->
<div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blogModalLabel">Article Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="blogModalBody">
                <!-- Content will be dynamically loaded -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="shareCurrentPost()">
                    <i class="fas fa-share-alt"></i> Share Article
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
/* Hero Section Styles */
.blog-hero-section {
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

/* Featured Post */
.featured-post-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: all 0.3s ease;
}

.featured-post-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
}

.featured-image {
    position: relative;
    height: 400px;
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.featured-post-card:hover .featured-image img {
    transform: scale(1.05);
}

.featured-overlay {
    position: absolute;
    top: 20px;
    left: 20px;
    display: flex;
    gap: 10px;
    align-items: center;
}

.featured-category {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 0.9rem;
    font-weight: 500;
}

.featured-date {
    background: rgba(255, 255, 255, 0.9);
    color: #2c3e50;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.featured-content {
    padding: 40px;
}

.featured-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6c757d;
    font-size: 0.9rem;
}

.featured-title {
    font-size: 2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 20px;
    line-height: 1.3;
}

.featured-excerpt {
    font-size: 1.1rem;
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 30px;
}

.featured-stats {
    display: flex;
    gap: 30px;
    margin-bottom: 30px;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #6c757d;
    font-size: 0.9rem;
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

/* Blog Cards */
.blog-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.blog-image {
    position: relative;
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
    transform: scale(1.1);
}

.blog-overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blog-category {
    background: linear-gradient(135deg, #d8dc5a, #41e081);
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
}

.blog-date {
    background: rgba(255, 255, 255, 0.9);
    color: #2c3e50;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.7rem;
    font-weight: 500;
}

.blog-content {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.blog-meta {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
    flex-wrap: wrap;
}

.blog-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 15px;
    line-height: 1.3;
}

.blog-excerpt {
    color: #6c757d;
    line-height: 1.6;
    margin-bottom: 20px;
    flex: 1;
}

.blog-tags {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.blog-tag {
    background: #f8f9fa;
    color: #41e081;
    padding: 4px 10px;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

.blog-stats {
    display: flex;
    gap: 20px;
    margin-bottom: 20px;
}

.blog-footer {
    display: flex;
    gap: 10px;
    padding: 20px 25px;
    border-top: 1px solid #e0e0e0;
    justify-content: center;
}

/* Newsletter Form */
.newsletter-form-inline .input-group-lg {
    max-width: 500px;
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
    
    .blog-hero-section {
        min-height: auto;
        padding: 100px 0;
    }
    
    .featured-image {
        height: 250px;
    }
    
    .featured-content {
        padding: 25px;
    }
    
    .featured-title {
        font-size: 1.5rem;
    }
    
    .featured-meta {
        gap: 15px;
    }
    
    .featured-stats {
        gap: 20px;
    }
    
    .filter-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .blog-footer {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Helper functions
function getBlogCategory(category) {
    const categories = {
        'success_stories': 'success_stories',
        'tech_trends': 'tech_trends',
        'youth_empowerment': 'youth_empowerment',
        'innovation': 'innovation',
        'partnerships': 'partnerships',
        'events': 'events'
    };
    return categories[category] || 'success_stories';
}

function getBlogCategoryDisplay(category) {
    const displays = {
        'success_stories': 'Success Stories',
        'tech_trends': 'Tech Trends',
        'youth_empowerment': 'Youth Empowerment',
        'innovation': 'Innovation',
        'partnerships': 'Partnerships',
        'events': 'Events'
    };
    return displays[category] || 'Success Stories';
}

function getBlogTags(category) {
    const tags = {
        'success_stories': ['Inspiration', 'Achievement', 'Impact'],
        'tech_trends': ['Technology', 'Innovation', 'Digital'],
        'youth_empowerment': ['Youth', 'Skills', 'Development'],
        'innovation': ['Creativity', 'Solutions', 'Ideas'],
        'partnerships': ['Collaboration', 'Community', 'Growth'],
        'events': ['Workshops', 'Training', 'Networking']
    };
    return tags[category] || ['General', 'Insights', 'Updates'];
}

function getReadingTime(content) {
    const wordsPerMinute = 200;
    const words = content.split(/\s+/).length;
    return Math.ceil(words / wordsPerMinute);
}

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const blogItems = document.querySelectorAll('.blog-post-item');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter blog posts
            blogItems.forEach(item => {
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
    
    // Initialize blog items with animation
    blogItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });
    
    // Trigger initial animation
    setTimeout(() => {
        blogItems.forEach(item => {
            item.style.opacity = '1';
            item.style.transform = 'translateY(0)';
        });
    }, 100);
});

// Blog functions
function readFeaturedPost() {
    const modalBody = document.getElementById('blogModalBody');
    modalBody.innerHTML = `
        <div class="blog-post-content">
            <h2>How Digital Skills Are Transforming Youth Employment in Tanzania</h2>
            <div class="blog-post-meta">
                <span><i class="fas fa-user"></i> Admin</span>
                <span><i class="fas fa-calendar"></i> ${new Date().toLocaleDateString()}</span>
                <span><i class="fas fa-clock"></i> 5 min read</span>
            </div>
            <div class="blog-post-image">
                <img src="{{ asset('images/featured-blog.jpg') }}" alt="Featured Post" class="img-fluid">
            </div>
            <div class="blog-post-body">
                <p>In today's rapidly evolving digital landscape, the demand for digital skills has never been higher. At Kijana Hub Africa, we've witnessed firsthand how digital literacy and technical skills are opening doors to meaningful employment opportunities for young Tanzanians.</p>
                <h3>The Digital Transformation</h3>
                <p>Over the past three years, we've trained over 2,000 youth in essential digital skills ranging from basic computer literacy to advanced programming and web development. The impact has been remarkable - 85% of our graduates have secured employment within six months of completing our programs.</p>
                <h3>Success Stories</h3>
                <p>Take Maria, a 22-year-old from Dar es Salaam who joined our web development program with no prior coding experience. Today, she works as a junior developer at a leading tech company, earning three times her previous income.</p>
                <h3>Building for the Future</h3>
                <p>Our commitment to digital empowerment continues to grow. We're expanding our curriculum to include emerging technologies like artificial intelligence, machine learning, and blockchain technology, ensuring that Tanzanian youth are prepared for the jobs of tomorrow.</p>
            </div>
        </div>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('blogModal'));
    modal.show();
}

function readPost(postId) {
    const modalBody = document.getElementById('blogModalBody');
    modalBody.innerHTML = `
        <div class="blog-post-content">
            <h2>Article Title</h2>
            <div class="blog-post-meta">
                <span><i class="fas fa-user"></i> Author</span>
                <span><i class="fas fa-calendar"></i> ${new Date().toLocaleDateString()}</span>
                <span><i class="fas fa-clock"></i> 3 min read</span>
            </div>
            <div class="blog-post-body">
                <p>This is where the full blog post content would be displayed. The article would include detailed insights, stories, and information relevant to the topic.</p>
                <p>Our blog posts cover a wide range of topics including success stories, tech trends, youth empowerment initiatives, innovation highlights, partnership announcements, and event recaps.</p>
                <p>Each article is carefully crafted to provide value to our readers while showcasing the impact of our work in the community.</p>
            </div>
        </div>
    `;
    
    const modal = new bootstrap.Modal(document.getElementById('blogModal'));
    modal.show();
}

function sharePost(postId) {
    if (navigator.share) {
        navigator.share({
            title: 'Check out this article from Kijana Hub Africa',
            text: 'Discover inspiring stories and insights from our youth empowerment journey',
            url: window.location.href
        });
    } else {
        alert('Share functionality coming soon!');
    }
}

function shareCurrentPost() {
    sharePost(0);
}

function loadMorePosts() {
    alert('Loading more articles... This feature would dynamically load additional blog posts.');
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
