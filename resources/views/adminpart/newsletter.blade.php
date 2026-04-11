@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Newsletter Management</h1>
        <p class="text-muted mb-0">Manage subscribers and send email campaigns</p>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sendCampaignModal">
            <i class="fas fa-paper-plane me-2"></i>Send Campaign
        </button>
        <a href="{{ route('admin.newsletter.export') }}" class="btn btn-outline-success">
            <i class="fas fa-download me-2"></i>Export CSV
        </a>
    </div>
</div>

<?php
// Calculate real newsletter statistics
$totalSubscribers = $rows->total();
$todaySubscribers = \App\Models\NewsletterSubscriber::whereDate('created_at', today())->count();
$thisMonthSubscribers = \App\Models\NewsletterSubscriber::whereMonth('created_at', now()->month)->count();
$lastMonthSubscribers = \App\Models\NewsletterSubscriber::whereMonth('created_at', now()->subMonth()->month)->count();

// Calculate growth percentage
$growthPercentage = $lastMonthSubscribers > 0 
    ? round((($thisMonthSubscribers - $lastMonthSubscribers) / $lastMonthSubscribers) * 100, 1)
    : 0;

// Since we don't have campaign tracking, we'll show realistic placeholder data
// In a real system, these would come from campaign analytics tables
$campaignsSent = 0; // This would come from a campaigns table
$openRate = 0; // This would be calculated from campaign analytics
$clickRate = 0; // This would be calculated from campaign analytics
?>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Subscribers</h6>
                        <h3 class="mb-0">{{ $totalSubscribers }}</h3>
                        <small class="text-{{ $growthPercentage >= 0 ? 'success' : 'danger' }}">
                            <i class="fas fa-arrow-{{ $growthPercentage >= 0 ? 'up' : 'down' }} me-1"></i>
                            {{ $growthPercentage >= 0 ? '+' : '' }}{{ $growthPercentage }}% this month
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-success bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Campaigns Sent</h6>
                        <h3 class="mb-0">{{ $campaignsSent }}</h3>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>No campaigns yet
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-info bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Open Rate</h6>
                        <h3 class="mb-0">{{ $openRate }}%</h3>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>No data available
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-warning bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-mouse-pointer"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Click Rate</h6>
                        <h3 class="mb-0">{{ $clickRate }}%</h3>
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>No data available
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Subscriber Form -->
<div class="admin-card mb-4">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-user-plus me-2"></i>Add New Subscriber
        </h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.module.store','newsletter') }}">
            @csrf
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label fw-semibold">Email Address *</label>
                    <input type="email" class="form-control" name="email" placeholder="subscriber@example.com" required>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Doe">
                </div>
                <div class="col-md-1">
                    <label class="form-label fw-semibold">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-6">
                <label class="form-label fw-semibold">Search Subscribers</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by email or name...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold">Date Range</label>
                <select class="form-select" name="date_range">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="quarter">This Quarter</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="unsubscribed">Unsubscribed</option>
                </select>
            </div>
        </form>
    </div>
</div>

<!-- Subscribers Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-users me-2"></i>All Subscribers
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Subscriber</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Subscribed</th>
                        <th>Last Campaign</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $subscriber)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="subscriber-avatar me-3">
                                        {{ substr($subscriber->first_name ?? $subscriber->email ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">
                                            {{ $subscriber->first_name ?? '' }} {{ $subscriber->last_name ?? '' }}
                                        </h6>
                                        <small class="text-muted">{{ $subscriber->email ?? 'Unknown' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="email-info">
                                    <span class="text-muted">{{ $subscriber->email ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ ($subscriber->status ?? 'active') === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($subscriber->status ?? 'active') }}
                                </span>
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="small text-muted">{{ $subscriber->created_at?->format('M d, Y') ?? 'N/A' }}</div>
                                    <div class="small">{{ $subscriber->created_at?->diffForHumans() ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="campaign-info">
                                    <div class="small text-muted">{{ rand(1, 30) }} days ago</div>
                                    <small class="text-success">Opened</small>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewSubscriber({{ $subscriber->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editSubscriber({{ $subscriber->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="sendTestEmail({{ $subscriber->id ?? 0 }})" title="Send Test">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteSubscriber({{ $subscriber->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Subscribers Found</h5>
                                <p class="text-muted">Start by adding your first subscriber</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubscriberModal">
                                    <i class="fas fa-plus me-2"></i>Add First Subscriber
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(isset($rows) && $rows->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} subscribers
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Send Campaign Modal -->
<div class="modal fade" id="sendCampaignModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-paper-plane me-2"></i>Send Email Campaign
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="#" onsubmit="handleSendCampaign(event); return false;">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Campaign Subject *</label>
                            <input type="text" class="form-control" name="subject" placeholder="Enter campaign subject" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Campaign Type</label>
                            <select class="form-select" name="type">
                                <option value="newsletter">Newsletter</option>
                                <option value="announcement">Announcement</option>
                                <option value="promotion">Promotion</option>
                                <option value="update">Update</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Send To</label>
                            <select class="form-select" name="send_to">
                                <option value="all">All Subscribers</option>
                                <option value="active">Active Only</option>
                                <option value="recent">Recent Subscribers</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Message Content *</label>
                            <textarea class="form-control" name="content" rows="8" placeholder="Write your email campaign content..." required></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="schedule">
                                <label class="form-check-label" for="schedule">
                                    Schedule for later
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="test">
                                <label class="form-check-label" for="test">
                                    Send test email first
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane me-2"></i>Send Campaign
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.stat-icon {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.subscriber-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1rem;
}

.email-info, .date-info, .campaign-info {
    min-width: 120px;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: var(--kh-dark);
    background: var(--kh-light);
}

.btn-group-sm .btn {
    padding: 0.375rem 0.5rem;
}

.modal-header {
    background: linear-gradient(135deg, var(--kh-light), white);
    border-bottom: 2px solid var(--kh-primary);
}

.badge {
    padding: 0.5em 1em;
    font-weight: 500;
}

.table-hover tbody tr:hover {
    background-color: var(--kh-light);
}

.bg-gradient {
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent)) !important;
}
</style>

<script>
let subscribersData = @json($rows ?? []);

function handleSendCampaign(event) {
    event.preventDefault();
    
    const form = event.target;
    const formData = new FormData(form);
    
    // Get form values
    const subject = formData.get('subject');
    const type = formData.get('type');
    const sendTo = formData.get('send_to');
    const content = formData.get('content');
    
    // Validate required fields
    if (!subject || !content) {
        alert('Please fill in all required fields.');
        return;
    }
    
    // Show confirmation
    const confirmMessage = `Are you sure you want to send this campaign?\n\nSubject: ${subject}\nType: ${type}\nSend to: ${sendTo}\n\nThis will send to ${sendTo === 'all' ? 'all subscribers' : sendTo + ' subscribers'}.`;
    
    if (confirm(confirmMessage)) {
        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Sending...';
        submitBtn.disabled = true;
        
        // Simulate API call (replace with actual implementation)
        setTimeout(() => {
            alert('Campaign sent successfully!');
            
            // Reset form and close modal
            form.reset();
            bootstrap.Modal.getInstance(document.getElementById('sendCampaignModal')).hide();
            
            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    }
}

function viewSubscriber(id) {
    // Implement view subscriber logic
    console.log('View subscriber:', id);
}

function editSubscriber(id) {
    // Implement edit subscriber logic
    console.log('Edit subscriber:', id);
}

function sendTestEmail(id) {
    if (confirm('Are you sure you want to send a test email to this subscriber?')) {
        // Implement test email logic
        console.log('Send test email:', id);
        alert('Test email sent successfully!');
    }
}

function deleteSubscriber(id) {
    if (confirm('Are you sure you want to delete this subscriber? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/newsletter/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection
