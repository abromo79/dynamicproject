@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Programs Management</h1>
        <p class="text-muted mb-0">Manage and organize your educational programs</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProgramModal">
            <i class="fas fa-plus me-2"></i>Add New Program
        </button>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Search Programs</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by title or category...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Category</label>
                <select class="form-select" name="category">
                    <option value="">All Categories</option>
                    <option value="Technology">Technology</option>
                    <option value="Business">Business</option>
                    <option value="Leadership">Leadership</option>
                    <option value="Innovation">Innovation</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Sort By</label>
                <select class="form-select" name="sort">
                    <option value="title">Title</option>
                    <option value="created_at">Created Date</option>
                    <option value="status">Status</option>
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

<!-- Programs Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-graduation-cap me-2"></i>All Programs
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $program)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="program-icon me-3">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $program->title ?? 'Untitled' }}</h6>
                                        <small class="text-muted">{{ Str::limit($program->description ?? '', 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark">{{ $program->category ?? 'N/A' }}</span>
                            </td>
                            <td>{{ $program->duration ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $program->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($program->status ?? 'unknown') }}
                                </span>
                            </td>
                            <td>{{ $program->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editProgram({{ $program->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewProgram({{ $program->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteProgram({{ $program->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Programs Found</h5>
                                <p class="text-muted">Start by adding your first program</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProgramModal">
                                    <i class="fas fa-plus me-2"></i>Add First Program
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} programs
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Program Modal -->
<div class="modal fade" id="addProgramModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Program
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','programs') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Program Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter program title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category *</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select category</option>
                                <option value="Technology">Technology</option>
                                <option value="Business">Business</option>
                                <option value="Leadership">Leadership</option>
                                <option value="Innovation">Innovation</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Duration</label>
                            <input type="text" class="form-control" name="duration" placeholder="e.g., 3 months, 6 weeks">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description *</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the program details..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Program
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Program Modal -->
<div class="modal fade" id="editProgramModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Program
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editProgramForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Program Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category *</label>
                            <select class="form-select" id="editCategory" name="category" required>
                                <option value="">Select category</option>
                                <option value="Technology">Technology</option>
                                <option value="Business">Business</option>
                                <option value="Leadership">Leadership</option>
                                <option value="Innovation">Innovation</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Duration</label>
                            <input type="text" class="form-control" id="editDuration" name="duration">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="editStatus" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
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
                        <i class="fas fa-save me-2"></i>Update Program
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.program-icon {
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
let programsData = @json($rows ?? []);

function editProgram(id) {
    const program = programsData.data?.find(p => p.id === id);
    if (program) {
        document.getElementById('editTitle').value = program.title || '';
        document.getElementById('editCategory').value = program.category || '';
        document.getElementById('editDuration').value = program.duration || '';
        document.getElementById('editStatus').value = program.status || 'active';
        document.getElementById('editDescription').value = program.description || '';
        
        const form = document.getElementById('editProgramForm');
        form.action = `/admin/programs/${id}`;
        
        new bootstrap.Modal(document.getElementById('editProgramModal')).show();
    }
}

function viewProgram(id) {
    // Implement view program logic
    console.log('View program:', id);
}

function deleteProgram(id) {
    if (confirm('Are you sure you want to delete this program? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/programs/${id}`;
        
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
