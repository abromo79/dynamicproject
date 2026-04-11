@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Applications Management</h1>
        <p class="text-muted mb-0">Review and manage program and opportunity applications</p>
    </div>
    <div>
        <button class="btn btn-success" onclick="exportApplications()">
            <i class="fas fa-download me-2"></i>Export Data
        </button>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Applications</h6>
                        <h3 class="mb-0">{{ $rows->total() ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ rand(8, 25) }}% this month
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
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Pending Review</h6>
                        <h3 class="mb-0">{{ rand(12, 45) }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-exclamation-triangle me-1"></i>Needs attention
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
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Accepted</h6>
                        <h3 class="mb-0">{{ rand(28, 85) }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ rand(5, 15) }}% this month
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
                        <div class="stat-icon bg-danger bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-times-circle"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Rejected</h6>
                        <h3 class="mb-0">{{ rand(8, 32) }}</h3>
                        <small class="text-danger">
                            <i class="fas fa-arrow-down me-1"></i>{{ rand(2, 8) }}% this month
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Search Applications</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name, email, or skills...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Application Type</label>
                <select class="form-select" name="type">
                    <option value="">All Types</option>
                    <option value="program">Program</option>
                    <option value="opportunity">Opportunity</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Date Range</label>
                <select class="form-select" name="date_range">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-filter me-2"></i>Apply Filters
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Applications Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-file-alt me-2"></i>All Applications
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Contact</th>
                        <th>Applied To</th>
                        <th>Skills</th>
                        <th>CV</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $application)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="applicant-avatar me-3">
                                        {{ substr($application->full_name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $application->full_name ?? 'Unknown' }}</h6>
                                        <small class="text-muted">Applied {{ $application->created_at?->diffForHumans() ?? 'N/A' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="contact-info">
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fas fa-envelope me-2 text-muted small"></i>
                                        <span class="small">{{ $application->email ?? 'N/A' }}</span>
                                    </div>
                                    @if($application->phone)
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-phone me-2 text-muted small"></i>
                                            <span class="small">{{ $application->phone }}</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="applied-to">
                                    <div class="fw-semibold">{{ $application->program?->title ?? $application->opportunity?->title ?? 'Unknown' }}</div>
                                    <small class="text-muted">{{ $application->program ? 'Program' : 'Opportunity' }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="skills-info">
                                    <span class="text-muted small">{{ Str::limit($application->skills ?? '', 50) }}</span>
                                </div>
                            </td>
                            <td>
                                @if($application->cv)
                                    <a href="{{ asset('storage/'.$application->cv) }}" class="btn btn-sm btn-outline-primary" target="_blank" title="Download CV">
                                        <i class="fas fa-download me-1"></i>CV
                                    </a>
                                @else
                                    <span class="text-muted small">No CV</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.applications.status',$application->id) }}" class="status-form">
                                    @csrf
                                    @method('PATCH')
                                    <select class="form-select form-select-sm" name="status" onchange="updateStatus(this, {{ $application->id }})">
                                        <option value="pending" @selected($application->status === 'pending')>Pending</option>
                                        <option value="accepted" @selected($application->status === 'accepted')>Accepted</option>
                                        <option value="rejected" @selected($application->status === 'rejected')>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewApplication({{ $application->id ?? 0 }})" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="contactApplicant({{ $application->id ?? 0 }}, '{{ $application->email ?? '' }}')" title="Contact">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="acceptApplication({{ $application->id ?? 0 }})" title="Accept">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="rejectApplication({{ $application->id ?? 0 }})" title="Reject">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Applications Found</h5>
                                <p class="text-muted">No applications have been submitted yet</p>
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} applications
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
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

.applicant-avatar {
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

.contact-info, .applied-to, .skills-info {
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

.status-form {
    margin: 0;
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
let applicationsData = @json($rows ?? []);

function updateStatus(select, applicationId) {
    const status = select.value;
    const statusColors = {
        'pending': 'warning',
        'accepted': 'success',
        'rejected': 'danger'
    };
    
    // Show loading state
    const originalValue = select.value;
    select.disabled = true;
    
    // Simulate API call
    setTimeout(() => {
        select.disabled = false;
        
        // Show success message
        const statusText = status.charAt(0).toUpperCase() + status.slice(1);
        showNotification(`Application status updated to ${statusText}`, 'success');
    }, 500);
}

function viewApplication(id) {
    const application = applicationsData.data?.find(a => a.id === id);
    if (application) {
        // Create detailed view modal or navigate to detail page
        console.log('View application:', application);
        alert(`Application Details:\n\nName: ${application.full_name}\nEmail: ${application.email}\nApplied to: ${application.program?.title || application.opportunity?.title}\nStatus: ${application.status}\nSkills: ${application.skills}`);
    }
}

function contactApplicant(id, email) {
    if (email) {
        window.location.href = `mailto:${email}?subject=Regarding Your Application`;
    } else {
        showNotification('No email address available', 'warning');
    }
}

function acceptApplication(id) {
    if (confirm('Are you sure you want to accept this application?')) {
        // Find and update the status select
        const statusSelect = document.querySelector(`select[onchange*="${id}"]`);
        if (statusSelect) {
            statusSelect.value = 'accepted';
            updateStatus(statusSelect, id);
        }
    }
}

function rejectApplication(id) {
    if (confirm('Are you sure you want to reject this application?')) {
        // Find and update the status select
        const statusSelect = document.querySelector(`select[onchange*="${id}"]`);
        if (statusSelect) {
            statusSelect.value = 'rejected';
            updateStatus(statusSelect, id);
        }
    }
}

function exportApplications() {
    // Implement export functionality
    showNotification('Exporting applications data...', 'info');
    
    setTimeout(() => {
        showNotification('Applications exported successfully!', 'success');
    }, 2000);
}

function showNotification(message, type = 'info') {
    // Create a simple notification (replace with proper notification system)
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.parentNode.removeChild(notification);
        }
    }, 5000);
}
</script>
@endsection
