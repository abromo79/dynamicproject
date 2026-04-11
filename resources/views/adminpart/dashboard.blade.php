@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Dashboard Overview</h1>
        <p class="text-muted mb-0">Welcome back! Here's what's happening with your organization today.</p>
    </div>
    <div>
        <button class="btn btn-primary" onclick="refreshDashboard()">
            <i class="fas fa-sync-alt me-2"></i>Refresh
        </button>
    </div>
</div>

<!-- Stats Cards -->
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
                        <h6 class="text-muted mb-1">Total Users</h6>
                        <h3 class="mb-0">{{ $totals['users'] ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>12% from last month
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
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Applications</h6>
                        <h3 class="mb-0">{{ $totals['applications'] ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>8% from last month
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
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Active Programs</h6>
                        <h3 class="mb-0">{{ $totals['programs'] ?? 0 }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-minus me-1"></i>Same as last month
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
                            <i class="fas fa-calendar"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Upcoming Events</h6>
                        <h3 class="mb-0">{{ $totals['events'] ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>3 new this week
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity and Quick Actions -->
<div class="row g-4">
    <!-- Recent Applications -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-clock me-2"></i>Recent Applications
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Program</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentApplications ?? [] as $application)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar-sm me-2">
                                                {{ substr($application->full_name ?? 'Unknown', 0, 1) }}
                                            </div>
                                            {{ $application->full_name ?? 'Unknown' }}
                                        </div>
                                    </td>
                                    <td>{{ $application->email ?? 'N/A' }}</td>
                                    <td>{{ $application->program ?? 'Not specified' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $application->status === 'approved' ? 'success' : ($application->status === 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($application->status ?? 'unknown') }}
                                        </span>
                                    </td>
                                    <td>{{ $application->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" onclick="viewApplication({{ $application->id ?? 0 }})">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-success" onclick="approveApplication({{ $application->id ?? 0 }})">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i><br>
                                        No recent applications found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions & System Info -->
    <div class="col-lg-4">
        <!-- Quick Actions -->
        <div class="admin-card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-bolt me-2"></i>Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.module.index', 'applications') }}" class="btn btn-outline-primary">
                        <i class="fas fa-user-plus me-2"></i>Review Applications
                    </a>
                    <a href="{{ route('admin.module.index', 'events') }}" class="btn btn-outline-success">
                        <i class="fas fa-calendar-plus me-2"></i>Create Event
                    </a>
                    <a href="{{ route('admin.module.index', 'blog') }}" class="btn btn-outline-info">
                        <i class="fas fa-blog me-2"></i>Write Blog Post
                    </a>
                    <a href="{{ route('admin.module.index', 'newsletter') }}" class="btn btn-outline-warning">
                        <i class="fas fa-envelope me-2"></i>Send Newsletter
                    </a>
                </div>
            </div>
        </div>
        
        <!-- System Info -->
        <div class="admin-card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>System Information
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Server Status</span>
                        <span class="badge bg-success">Online</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Database</span>
                        <span class="badge bg-success">Connected</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted">Storage</span>
                        <span class="badge bg-warning">65% Used</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Last Backup</span>
                        <span class="badge bg-info">2 hours ago</span>
                    </div>
                </div>
                
                <div class="progress mb-3" style="height: 8px;">
                    <div class="progress-bar bg-success" style="width: 65%"></div>
                </div>
                
                <small class="text-muted">
                    <i class="fas fa-clock me-1"></i>
                    Last updated: {{ now()->format('M d, Y H:i') }}
                </small>
            </div>
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

.user-avatar-sm {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.8rem;
}

.bg-gradient {
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent)) !important;
}

.badge {
    padding: 0.4em 0.8em;
    font-weight: 500;
}

.table th {
    border-top: none;
    font-weight: 600;
    color: var(--kh-dark);
    background: var(--kh-light);
}

.btn-group-sm .btn {
    padding: 0.25rem 0.5rem;
}
</style>

<script>
function refreshDashboard() {
    location.reload();
}

function viewApplication(id) {
    // Implement view application logic
    console.log('View application:', id);
}

function approveApplication(id) {
    // Implement approve application logic
    console.log('Approve application:', id);
}
</script>
@endsection
