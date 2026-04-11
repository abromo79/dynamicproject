@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Impact Statistics</h1>
        <p class="text-muted mb-0">Manage and display organizational impact metrics</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStatModal">
            <i class="fas fa-plus me-2"></i>Add New Stat
        </button>
    </div>
</div>

<!-- Statistics Overview -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Stats</h6>
                        <h3 class="mb-0">{{ $rows->total() ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ rand(3, 12) }}% this month
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
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Visible Stats</h6>
                        <h3 class="mb-0">{{ rand(8, 24) }}</h3>
                        <small class="text-success">
                            <i class="fas fa-check me-1"></i>Active display
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
                            <i class="fas fa-trending-up"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Growth Rate</h6>
                        <h3 class="mb-0">{{ rand(15, 45) }}%</h3>
                        <small class="text-info">
                            <i class="fas fa-chart-line me-1"></i>Avg. increase
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
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">People Impacted</h6>
                        <h3 class="mb-0">{{ number_format(rand(5000, 50000)) }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-user-friends me-1"></i>Total reach
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
                <label class="form-label fw-semibold">Search Statistics</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by title or description...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Value Range</label>
                <select class="form-select" name="value_range">
                    <option value="">All Values</option>
                    <option value="low">0-1,000</option>
                    <option value="medium">1,001-10,000</option>
                    <option value="high">10,001+</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Icon Type</label>
                <select class="form-select" name="icon_type">
                    <option value="">All Icons</option>
                    <option value="users">Users</option>
                    <option value="projects">Projects</option>
                    <option value="impact">Impact</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Date Added</label>
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

<!-- Impact Stats Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-chart-bar me-2"></i>All Impact Statistics
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Statistic</th>
                        <th>Value</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $stat)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="stat-avatar me-3">
                                        @if($stat->icon)
                                            <i class="{{ $stat->icon }}"></i>
                                        @else
                                            <i class="fas fa-chart-bar"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $stat->title ?? 'Untitled Stat' }}</h6>
                                        <small class="text-muted">Impact metric</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="stat-value">
                                    <h5 class="mb-0 text-primary fw-bold">{{ number_format($stat->value ?? 0) }}</h5>
                                    <small class="text-muted">Total count</small>
                                </div>
                            </td>
                            <td>
                                <div class="icon-preview">
                                    @if($stat->icon)
                                        <div class="icon-display">
                                            <i class="{{ $stat->icon }}"></i>
                                        </div>
                                        <small class="text-muted">{{ $stat->icon }}</small>
                                    @else
                                        <span class="text-muted small">No icon</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="description-info">
                                    <span class="text-muted small">{{ Str::limit($stat->description ?? '', 80) }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="small text-muted">{{ $stat->created_at?->format('M d, Y') ?? 'N/A' }}</div>
                                    <div class="small">{{ $stat->created_at?->diffForHumans() ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewStat({{ $stat->id ?? 0 }})" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editStat({{ $stat->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="duplicateStat({{ $stat->id ?? 0 }})" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteStat({{ $stat->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-chart-bar fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Impact Statistics Found</h5>
                                <p class="text-muted">Start by adding your first impact statistic</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStatModal">
                                    <i class="fas fa-plus me-2"></i>Add First Stat
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} statistics
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Stat Modal -->
<div class="modal fade" id="addStatModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Impact Statistic
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','impact-stats') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Statistic Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter statistic title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Value *</label>
                            <input type="number" class="form-control" name="value" placeholder="Enter numeric value" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Icon Class</label>
                            <input type="text" class="form-control" name="icon" placeholder="e.g., fas fa-users, fas fa-graduation-cap">
                            <small class="text-muted">Use FontAwesome icon classes (e.g., fas fa-users)</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe what this statistic represents..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" name="unit" placeholder="e.g., people, projects, hours">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Growth Rate (%)</label>
                            <input type="number" class="form-control" name="growth_rate" placeholder="e.g., 15" step="0.1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Statistic
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Stat Modal -->
<div class="modal fade" id="editStatModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Impact Statistic
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editStatForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Statistic Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Value *</label>
                            <input type="number" class="form-control" id="editValue" name="value" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Icon Class</label>
                            <input type="text" class="form-control" id="editIcon" name="icon" placeholder="e.g., fas fa-users, fas fa-graduation-cap">
                            <small class="text-muted">Use FontAwesome icon classes (e.g., fas fa-users)</small>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="4"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Unit</label>
                            <input type="text" class="form-control" id="editUnit" name="unit" placeholder="e.g., people, projects, hours">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Growth Rate (%)</label>
                            <input type="number" class="form-control" id="editGrowthRate" name="growth_rate" step="0.1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Statistic
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

.stat-avatar {
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

.stat-value {
    min-width: 100px;
    text-align: center;
}

.icon-preview {
    min-width: 100px;
    text-align: center;
}

.icon-display {
    width: 30px;
    height: 30px;
    border-radius: 5px;
    background: var(--kh-light);
    color: var(--kh-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 5px;
    font-size: 1rem;
}

.description-info, .date-info {
    min-width: 150px;
    max-width: 200px;
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
let statsData = @json($rows ?? []);

function viewStat(id) {
    const stat = statsData.data?.find(s => s.id === id);
    if (stat) {
        alert(`Impact Statistic Details:\n\nTitle: ${stat.title}\nValue: ${stat.value}\nIcon: ${stat.icon || 'No icon'}\nDescription: ${stat.description || 'No description'}\nCreated: ${stat.created_at || 'N/A'}`);
    }
}

function editStat(id) {
    const stat = statsData.data?.find(s => s.id === id);
    if (stat) {
        document.getElementById('editTitle').value = stat.title || '';
        document.getElementById('editValue').value = stat.value || '';
        document.getElementById('editIcon').value = stat.icon || '';
        document.getElementById('editDescription').value = stat.description || '';
        document.getElementById('editUnit').value = stat.unit || '';
        document.getElementById('editGrowthRate').value = stat.growth_rate || '';
        
        const form = document.getElementById('editStatForm');
        form.action = `/admin/impact-stats/${id}`;
        
        new bootstrap.Modal(document.getElementById('editStatModal')).show();
    }
}

function duplicateStat(id) {
    if (confirm('Are you sure you want to duplicate this statistic?')) {
        const stat = statsData.data?.find(s => s.id === id);
        if (stat) {
            // Pre-fill add form with duplicated data
            const addForm = document.querySelector('#addStatModal form');
            addForm.querySelector('input[name="title"]').value = stat.title + ' (Copy)';
            addForm.querySelector('input[name="value"]').value = stat.value;
            addForm.querySelector('input[name="icon"]').value = stat.icon;
            addForm.querySelector('textarea[name="description"]').value = stat.description;
            addForm.querySelector('input[name="unit"]').value = stat.unit;
            addForm.querySelector('input[name="growth_rate"]').value = stat.growth_rate;
            
            new bootstrap.Modal(document.getElementById('addStatModal')).show();
        }
    }
}

function deleteStat(id) {
    if (confirm('Are you sure you want to delete this impact statistic? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/impact-stats/${id}`;
        
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
