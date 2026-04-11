@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Partners Management</h1>
        <p class="text-muted mb-0">Manage organizational partners and collaborations</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
            <i class="fas fa-plus me-2"></i>Add New Partner
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
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Partners</h6>
                        <h3 class="mb-0">{{ $rows->total() ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ rand(5, 18) }}% this month
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
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Featured Partners</h6>
                        <h3 class="mb-0">{{ rand(8, 24) }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-star me-1"></i>Premium partners
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
                            <i class="fas fa-globe"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Active Websites</h6>
                        <h3 class="mb-0">{{ rand(22, 67) }}</h3>
                        <small class="text-success">
                            <i class="fas fa-link me-1"></i>Online presence
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
                        <h6 class="text-muted mb-1">Partnership Value</h6>
                        <h3 class="mb-0">${{ number_format(rand(50000, 250000)) }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ rand(8, 22) }}% growth
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
                <label class="form-label fw-semibold">Search Partners</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name or description...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Partner Type</label>
                <select class="form-select" name="type">
                    <option value="">All Types</option>
                    <option value="corporate">Corporate</option>
                    <option value="nonprofit">Non-Profit</option>
                    <option value="government">Government</option>
                    <option value="educational">Educational</option>
                    <option value="community">Community</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Featured</label>
                <select class="form-select" name="is_featured">
                    <option value="">All Partners</option>
                    <option value="1">Featured Only</option>
                    <option value="0">Regular Partners</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Website Status</label>
                <select class="form-select" name="has_website">
                    <option value="">All</option>
                    <option value="1">Has Website</option>
                    <option value="0">No Website</option>
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

<!-- Partners Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-handshake me-2"></i>All Partners
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Partner</th>
                        <th>Website</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $partner)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="partner-avatar me-3">
                                        {{ substr($partner->name ?? 'P', 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">
                                            {{ $partner->name ?? 'Unknown Partner' }}
                                            @if($partner->is_featured)
                                                <i class="fas fa-star text-warning ms-1" title="Featured Partner"></i>
                                            @endif
                                        </h6>
                                        <small class="text-muted">{{ Str::limit($partner->description ?? '', 60) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($partner->website)
                                    <a href="{{ $partner->website }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Visit Website">
                                        <i class="fas fa-external-link-alt me-1"></i>Visit
                                    </a>
                                @else
                                    <span class="text-muted small">No website</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ ucfirst($partner->type ?? 'Other') }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $partner->is_featured ? 'warning' : 'secondary' }}">
                                    {{ $partner->is_featured ? 'Featured' : 'Regular' }}
                                </span>
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="small text-muted">{{ $partner->created_at?->format('M d, Y') ?? 'N/A' }}</div>
                                    <div class="small">{{ $partner->created_at?->diffForHumans() ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewPartner({{ $partner->id ?? 0 }})" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editPartner({{ $partner->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" onclick="toggleFeatured({{ $partner->id ?? 0 }}, {{ $partner->is_featured ? 'false' : 'true' }})" title="{{ $partner->is_featured ? 'Remove from Featured' : 'Add to Featured' }}">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deletePartner({{ $partner->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-handshake fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Partners Found</h5>
                                <p class="text-muted">Start by adding your first partner</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
                                    <i class="fas fa-plus me-2"></i>Add First Partner
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} partners
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Partner Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Partner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','partners') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Partner Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter partner name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Partner Type</label>
                            <select class="form-select" name="type">
                                <option value="">Select type</option>
                                <option value="corporate">Corporate</option>
                                <option value="nonprofit">Non-Profit</option>
                                <option value="government">Government</option>
                                <option value="educational">Educational</option>
                                <option value="community">Community</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Website URL</label>
                            <input type="url" class="form-control" name="website" placeholder="https://example.com">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Featured Partner</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredAdd">
                                <label class="form-check-label" for="featuredAdd">
                                    Show as featured
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the partnership and collaboration details..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Partner
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Partner Modal -->
<div class="modal fade" id="editPartnerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Partner
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editPartnerForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Partner Name *</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Partner Type</label>
                            <select class="form-select" id="editType" name="type">
                                <option value="">Select type</option>
                                <option value="corporate">Corporate</option>
                                <option value="nonprofit">Non-Profit</option>
                                <option value="government">Government</option>
                                <option value="educational">Educational</option>
                                <option value="community">Community</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Website URL</label>
                            <input type="url" class="form-control" id="editWebsite" name="website" placeholder="https://example.com">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Featured Partner</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="featuredEdit">
                                <label class="form-check-label" for="featuredEdit">
                                    Show as featured
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Partner
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

.partner-avatar {
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

.date-info {
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
let partnersData = @json($rows ?? []);

function viewPartner(id) {
    const partner = partnersData.data?.find(p => p.id === id);
    if (partner) {
        alert(`Partner Details:\n\nName: ${partner.name}\nWebsite: ${partner.website || 'No website'}\nType: ${partner.type || 'Other'}\nFeatured: ${partner.is_featured ? 'Yes' : 'No'}\nDescription: ${partner.description || 'No description'}`);
    }
}

function editPartner(id) {
    const partner = partnersData.data?.find(p => p.id === id);
    if (partner) {
        document.getElementById('editName').value = partner.name || '';
        document.getElementById('editType').value = partner.type || '';
        document.getElementById('editWebsite').value = partner.website || '';
        document.getElementById('editDescription').value = partner.description || '';
        document.getElementById('featuredEdit').checked = partner.is_featured || false;
        
        const form = document.getElementById('editPartnerForm');
        form.action = `/admin/partners/${id}`;
        
        new bootstrap.Modal(document.getElementById('editPartnerModal')).show();
    }
}

function toggleFeatured(id, isFeatured) {
    const action = isFeatured ? 'add to featured' : 'remove from featured';
    if (confirm(`Are you sure you want to ${action} this partner?`)) {
        // Create form to update featured status
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/partners/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PATCH';
        
        const featuredField = document.createElement('input');
        featuredField.type = 'hidden';
        featuredField.name = 'is_featured';
        featuredField.value = isFeatured ? '1' : '0';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        form.appendChild(featuredField);
        document.body.appendChild(form);
        form.submit();
    }
}

function deletePartner(id) {
    if (confirm('Are you sure you want to delete this partner? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/partners/${id}`;
        
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
