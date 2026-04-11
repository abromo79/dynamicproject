@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Innovation Projects</h1>
        <p class="text-muted mb-0">Manage and track youth innovation projects and startups</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInnovationModal">
            <i class="fas fa-plus me-2"></i>New Innovation
        </button>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Search Innovations</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by title or owner...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Sector</label>
                <select class="form-select" name="sector">
                    <option value="">All Sectors</option>
                    <option value="Technology">Technology</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="Education">Education</option>
                    <option value="Finance">Finance</option>
                    <option value="Energy">Energy</option>
                    <option value="Environment">Environment</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="Idea">Idea</option>
                    <option value="Development">Development</option>
                    <option value="Testing">Testing</option>
                    <option value="Launched">Launched</option>
                    <option value="Scaling">Scaling</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Stage</label>
                <select class="form-select" name="stage">
                    <option value="">All Stages</option>
                    <option value="Early">Early Stage</option>
                    <option value="Growth">Growth Stage</option>
                    <option value="Mature">Mature Stage</option>
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

<!-- Innovations Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-lightbulb me-2"></i>All Innovation Projects
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Owner</th>
                        <th>Sector</th>
                        <th>Status</th>
                        <th>Stage</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $innovation)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="innovation-icon me-3">
                                        @switch($innovation->sector)
                                            @case('Technology')
                                                <i class="fas fa-laptop-code"></i>
                                            @break
                                            @case('Agriculture')
                                                <i class="fas fa-seedling"></i>
                                            @break
                                            @case('Healthcare')
                                                <i class="fas fa-heartbeat"></i>
                                            @break
                                            @case('Education')
                                                <i class="fas fa-graduation-cap"></i>
                                            @break
                                            @case('Finance')
                                                <i class="fas fa-chart-line"></i>
                                            @break
                                            @case('Energy')
                                                <i class="fas fa-bolt"></i>
                                            @break
                                            @case('Environment')
                                                <i class="fas fa-leaf"></i>
                                            @break
                                            @default
                                                <i class="fas fa-lightbulb"></i>
                                        @endswitch
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $innovation->title ?? 'Untitled' }}</h6>
                                        <small class="text-muted">{{ Str::limit($innovation->description ?? '', 60) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="owner-info">
                                    <div class="fw-semibold">{{ $innovation->owner_name ?? 'Unknown' }}</div>
                                    <small class="text-muted">{{ $innovation->created_at?->format('M d, Y') ?? 'N/A' }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $innovation->sector ?? 'Other' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $innovation->status === 'Launched' ? 'success' : ($innovation->status === 'Development' ? 'primary' : ($innovation->status === 'Testing' ? 'warning' : 'secondary')) }}">
                                    {{ $innovation->status ?? 'Unknown' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $innovation->stage === 'Mature' ? 'success' : ($innovation->stage === 'Growth' ? 'info' : 'warning') }}">
                                    {{ $innovation->stage ?? 'Early' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editInnovation({{ $innovation->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewInnovation({{ $innovation->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="trackProgress({{ $innovation->id ?? 0 }})" title="Track Progress">
                                        <i class="fas fa-chart-line"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" onclick="featureInnovation({{ $innovation->id ?? 0 }})" title="Feature">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteInnovation({{ $innovation->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-lightbulb fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Innovation Projects Found</h5>
                                <p class="text-muted">Start by adding your first innovation project</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addInnovationModal">
                                    <i class="fas fa-plus me-2"></i>Add First Innovation
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} innovations
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Innovation Modal -->
<div class="modal fade" id="addInnovationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>New Innovation Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','innovations') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Project Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter project title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Owner Name *</label>
                            <input type="text" class="form-control" name="owner_name" placeholder="Project owner name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Sector *</label>
                            <select class="form-select" name="sector" required>
                                <option value="">Select sector</option>
                                <option value="Technology">Technology</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Education">Education</option>
                                <option value="Finance">Finance</option>
                                <option value="Energy">Energy</option>
                                <option value="Environment">Environment</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Status *</label>
                            <select class="form-select" name="status" required>
                                <option value="">Select status</option>
                                <option value="Idea">Idea</option>
                                <option value="Development">Development</option>
                                <option value="Testing">Testing</option>
                                <option value="Launched">Launched</option>
                                <option value="Scaling">Scaling</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Stage</label>
                            <select class="form-select" name="stage">
                                <option value="Early">Early Stage</option>
                                <option value="Growth">Growth Stage</option>
                                <option value="Mature">Mature Stage</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Funding Required</label>
                            <input type="number" class="form-control" name="funding_required" placeholder="Amount in USD" step="0.01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Team Size</label>
                            <input type="number" class="form-control" name="team_size" placeholder="Number of team members">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description *</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the innovation project..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Innovation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Innovation Modal -->
<div class="modal fade" id="editInnovationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Innovation Project
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editInnovationForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Project Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Owner Name *</label>
                            <input type="text" class="form-control" id="editOwnerName" name="owner_name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Sector *</label>
                            <select class="form-select" id="editSector" name="sector" required>
                                <option value="">Select sector</option>
                                <option value="Technology">Technology</option>
                                <option value="Agriculture">Agriculture</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Education">Education</option>
                                <option value="Finance">Finance</option>
                                <option value="Energy">Energy</option>
                                <option value="Environment">Environment</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Status *</label>
                            <select class="form-select" id="editStatus" name="status" required>
                                <option value="">Select status</option>
                                <option value="Idea">Idea</option>
                                <option value="Development">Development</option>
                                <option value="Testing">Testing</option>
                                <option value="Launched">Launched</option>
                                <option value="Scaling">Scaling</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Stage</label>
                            <select class="form-select" id="editStage" name="stage">
                                <option value="Early">Early Stage</option>
                                <option value="Growth">Growth Stage</option>
                                <option value="Mature">Mature Stage</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Funding Required</label>
                            <input type="number" class="form-control" id="editFundingRequired" name="funding_required" step="0.01">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Team Size</label>
                            <input type="number" class="form-control" id="editTeamSize" name="team_size">
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
                        <i class="fas fa-save me-2"></i>Update Innovation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.innovation-icon {
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

.owner-info {
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
</style>

<script>
let innovationsData = @json($rows ?? []);

function editInnovation(id) {
    const innovation = innovationsData.data?.find(i => i.id === id);
    if (innovation) {
        document.getElementById('editTitle').value = innovation.title || '';
        document.getElementById('editOwnerName').value = innovation.owner_name || '';
        document.getElementById('editSector').value = innovation.sector || '';
        document.getElementById('editStatus').value = innovation.status || '';
        document.getElementById('editStage').value = innovation.stage || 'Early';
        document.getElementById('editFundingRequired').value = innovation.funding_required || '';
        document.getElementById('editTeamSize').value = innovation.team_size || '';
        document.getElementById('editDescription').value = innovation.description || '';
        
        const form = document.getElementById('editInnovationForm');
        form.action = `/admin/innovations/${id}`;
        
        new bootstrap.Modal(document.getElementById('editInnovationModal')).show();
    }
}

function viewInnovation(id) {
    // Implement view innovation logic
    console.log('View innovation:', id);
}

function trackProgress(id) {
    // Implement progress tracking logic
    console.log('Track progress:', id);
}

function featureInnovation(id) {
    if (confirm('Are you sure you want to feature this innovation?')) {
        // Implement feature logic
        console.log('Feature innovation:', id);
    }
}

function deleteInnovation(id) {
    if (confirm('Are you sure you want to delete this innovation project? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/innovations/${id}`;
        
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
