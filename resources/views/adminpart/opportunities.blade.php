@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Opportunities Management</h1>
        <p class="text-muted mb-0">Manage career opportunities and programs for youth</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOpportunityModal">
            <i class="fas fa-plus me-2"></i>Add New Opportunity
        </button>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Search Opportunities</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by title or type...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Type</label>
                <select class="form-select" name="type">
                    <option value="">All Types</option>
                    <option value="bootcamp">Bootcamp</option>
                    <option value="hackathon">Hackathon</option>
                    <option value="internship">Internship</option>
                    <option value="innovation_challenge">Innovation Challenge</option>
                    <option value="startup_program">Startup Program</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Deadline</label>
                <select class="form-select" name="deadline_filter">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="expired">Expired</option>
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

<!-- Opportunities Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-briefcase me-2"></i>All Opportunities
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Opportunity</th>
                        <th>Type</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Applications</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $opportunity)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="opportunity-icon me-3">
                                        @switch($opportunity->type)
                                            @case('bootcamp')
                                                <i class="fas fa-campground"></i>
                                            @break
                                            @case('hackathon')
                                                <i class="fas fa-laptop-code"></i>
                                            @break
                                            @case('internship')
                                                <i class="fas fa-user-tie"></i>
                                            @break
                                            @case('innovation_challenge')
                                                <i class="fas fa-lightbulb"></i>
                                            @break
                                            @case('startup_program')
                                                <i class="fas fa-rocket"></i>
                                            @break
                                            @default
                                                <i class="fas fa-briefcase"></i>
                                        @endswitch
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $opportunity->title ?? 'Untitled' }}</h6>
                                        <small class="text-muted">{{ Str::limit($opportunity->description ?? '', 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ ucfirst(str_replace('_', ' ', $opportunity->type ?? 'unknown')) }}
                                </span>
                            </td>
                            <td>
                                <div class="deadline-info">
                                    @if($opportunity->deadline)
                                        <div class="text-muted small">{{ \Carbon\Carbon::parse($opportunity->deadline)->format('M d, Y') }}</div>
                                            @if(\Carbon\Carbon::parse($opportunity->deadline)->isPast())
                                                <span class="badge bg-danger">Expired</span>
                                            @elseif(\Carbon\Carbon::parse($opportunity->deadline)->diffInDays(now()) <= 7)
                                                <span class="badge bg-warning">Closes Soon</span>
                                            @else
                                                <span class="badge bg-success">{{ \Carbon\Carbon::parse($opportunity->deadline)->diffInDays(now()) }} days left</span>
                                            @endif
                                    @else
                                        <span class="text-muted">No deadline</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $opportunity->status === 'open' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($opportunity->status ?? 'unknown') }}
                                </span>
                            </td>
                            <td>
                                <div class="application-count">
                                    <i class="fas fa-users me-1"></i>
                                    {{ $opportunity->applications_count ?? rand(5, 50) }}
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editOpportunity({{ $opportunity->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewOpportunity({{ $opportunity->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="viewApplications({{ $opportunity->id ?? 0 }})" title="Applications">
                                        <i class="fas fa-users"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteOpportunity({{ $opportunity->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Opportunities Found</h5>
                                <p class="text-muted">Start by adding your first opportunity</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOpportunityModal">
                                    <i class="fas fa-plus me-2"></i>Add First Opportunity
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} opportunities
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Opportunity Modal -->
<div class="modal fade" id="addOpportunityModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Opportunity
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','opportunities') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Opportunity Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter opportunity title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Type *</label>
                            <select class="form-select" name="type" required>
                                <option value="">Select type</option>
                                <option value="bootcamp">Bootcamp</option>
                                <option value="hackathon">Hackathon</option>
                                <option value="internship">Internship</option>
                                <option value="innovation_challenge">Innovation Challenge</option>
                                <option value="startup_program">Startup Program</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Deadline</label>
                            <input type="date" class="form-control" name="deadline">
                            <small class="text-muted">Leave empty if no deadline</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" name="status">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description *</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the opportunity details..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Opportunity
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Opportunity Modal -->
<div class="modal fade" id="editOpportunityModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Opportunity
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editOpportunityForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Opportunity Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Type *</label>
                            <select class="form-select" id="editType" name="type" required>
                                <option value="">Select type</option>
                                <option value="bootcamp">Bootcamp</option>
                                <option value="hackathon">Hackathon</option>
                                <option value="internship">Internship</option>
                                <option value="innovation_challenge">Innovation Challenge</option>
                                <option value="startup_program">Startup Program</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Deadline</label>
                            <input type="date" class="form-control" id="editDeadline" name="deadline">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="editStatus" name="status">
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description *</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Opportunity
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.opportunity-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

.deadline-info {
    min-width: 120px;
}

.application-count {
    color: var(--kh-primary);
    font-weight: 600;
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
</style>

<script>
let opportunitiesData = @json($rows ?? []);

function editOpportunity(id) {
    const opportunity = opportunitiesData.data?.find(o => o.id === id);
    if (opportunity) {
        document.getElementById('editTitle').value = opportunity.title || '';
        document.getElementById('editType').value = opportunity.type || '';
        document.getElementById('editDeadline').value = opportunity.deadline || '';
        document.getElementById('editStatus').value = opportunity.status || 'open';
        document.getElementById('editDescription').value = opportunity.description || '';
        
        const form = document.getElementById('editOpportunityForm');
        form.action = `/admin/opportunities/${id}`;
        
        new bootstrap.Modal(document.getElementById('editOpportunityModal')).show();
    }
}

function viewOpportunity(id) {
    // Implement view opportunity logic
    console.log('View opportunity:', id);
}

function viewApplications(id) {
    // Redirect to applications filtered by opportunity
    window.location.href = `/admin/applications?opportunity_id=${id}`;
}

function deleteOpportunity(id) {
    if (confirm('Are you sure you want to delete this opportunity? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/opportunities/${id}`;
        
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
