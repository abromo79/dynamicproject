@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Success Stories</h1>
        <p class="text-muted mb-0">Manage program graduate testimonials and success stories</p>
    </div>
    <div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStoryModal">
            <i class="fas fa-plus me-2"></i>Add Success Story
        </button>
        <!-- Test button with direct JavaScript -->
        <button class="btn btn-primary ms-2" onclick="testModal()">
            <i class="fas fa-test"></i>Test Modal
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
                            <i class="fas fa-trophy"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Stories</h6>
                        <h3 class="mb-0">{{ $rows->total() ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ \App\Models\SuccessStory::whereDate('created_at', today())->count() }} today
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
                        <h6 class="text-muted mb-1">Featured Stories</h6>
                        <h3 class="mb-0">{{ \App\Models\SuccessStory::where('is_featured', true)->count() }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-star me-1"></i>Highlighted
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
                        <h6 class="text-muted mb-1">Active Stories</h6>
                        <h3 class="mb-0">{{ \App\Models\SuccessStory::where('status', true)->count() }}</h3>
                        <small class="text-success">
                            <i class="fas fa-eye me-1"></i>Visible
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
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Programs Covered</h6>
                        <h3 class="mb-0">{{ \App\Models\SuccessStory::distinct('program')->count('program') }}</h3>
                        <small class="text-info">
                            <i class="fas fa-graduation-cap me-1"></i>Different programs
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
                <label class="form-label fw-semibold">Search Stories</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name, program, or testimonial...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Program</label>
                <select class="form-select" name="program">
                    <option value="">All Programs</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Data Analytics">Data Analytics</option>
                    <option value="Entrepreneurship">Entrepreneurship</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="UI/UX Design">UI/UX Design</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Featured</label>
                <select class="form-select" name="is_featured">
                    <option value="">All Stories</option>
                    <option value="1">Featured</option>
                    <option value="0">Regular</option>
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

<!-- Success Stories Table -->
<div class="admin-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Story</th>
                        <th>Author</th>
                        <th>Program</th>
                        <th>Featured</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $story)
                        <tr>
                            <td>
                                <div class="story-content">
                                    <div class="story-text">
                                        {{ Str::limit($story->testimonial ?? '', 80) }}
                                    </div>
                                    <small class="text-muted">Added {{ $story->created_at?->diffForHumans() ?? 'N/A' }}</small>
                                </div>
                            </td>
                            <td>
                                <div class="author-info">
                                    <div class="d-flex align-items-center">
                                        @if($story->image)
                                            <img src="{{ asset($story->image) }}" alt="{{ $story->name }}" class="author-avatar-small me-2">
                                        @else
                                            <div class="author-avatar-small me-2">
                                                {{ substr($story->name ?? 'A', 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <h6 class="mb-0 fw-semibold">{{ $story->name ?? 'Unknown' }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $story->program ?? 'Unknown' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $story->is_featured ? 'bg-warning' : 'bg-secondary' }}">
                                    <i class="fas fa-star me-1"></i>
                                    {{ $story->is_featured ? 'Featured' : 'Regular' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $story->status ? 'bg-success' : 'bg-danger' }}">
                                    <i class="fas fa-{{ $story->status ? 'eye' : 'eye-slash' }} me-1"></i>
                                    {{ $story->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <div class="sort-order">
                                    <span class="badge bg-primary">{{ $story->sort_order ?? 0 }}</span>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewStory({{ $story->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editStory({{ $story->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" onclick="toggleFeatured({{ $story->id ?? 0 }}, {{ $story->is_featured ? 'false' : 'true' }})" title="Toggle Featured">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary" onclick="toggleStatus({{ $story->id ?? 0 }}, {{ $story->status ? 'false' : 'true' }})" title="Toggle Status">
                                        <i class="fas fa-{{ $story->status ? 'eye-slash' : 'eye' }}"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteStory({{ $story->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Success Stories Found</h5>
                                <p class="text-muted">No success stories have been added yet</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStoryModal">
                                    <i class="fas fa-plus me-2"></i>Add First Success Story
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} stories
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Success Story Modal -->
<div class="modal fade" id="addStoryModal" tabindex="-1" aria-labelledby="addStoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStoryModalLabel">
                    <i class="fas fa-plus me-2"></i>Add Success Story
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/admin/success-stories" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="addName" class="form-label fw-semibold">Author Name *</label>
                            <input type="text" class="form-control" id="addName" name="name" placeholder="Enter author name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="addProgram" class="form-label fw-semibold">Program *</label>
                            <select class="form-select" id="addProgram" name="program" required>
                                <option value="">Select Program</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Data Analytics">Data Analytics</option>
                                <option value="Entrepreneurship">Entrepreneurship</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Mobile Development">Mobile Development</option>
                                <option value="Cybersecurity">Cybersecurity</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="addTestimonial" class="form-label fw-semibold">Success Story *</label>
                            <textarea class="form-control" id="addTestimonial" name="testimonial" rows="4" placeholder="Share the success story..." required></textarea>
                            <small class="text-muted">Include the full testimonial or success story</small>
                        </div>
                        <div class="col-md-6">
                            <label for="addImage" class="form-label fw-semibold">Author Image</label>
                            <input type="file" class="form-control" id="addImage" name="image" accept="image/*">
                            <small class="text-muted">Upload author's image (optional)</small>
                        </div>
                        <div class="col-md-3">
                            <label for="addSortOrder" class="form-label fw-semibold">Sort Order</label>
                            <input type="number" class="form-control" id="addSortOrder" name="sort_order" value="0" min="0">
                            <small class="text-muted">Display order (0 = first)</small>
                        </div>
                        <div class="col-md-3">
                            <label for="addStatus" class="form-label fw-semibold">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="status" id="addStatus" checked>
                                <label class="form-check-label" for="addStatus">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="addFeatured">
                                <label class="form-check-label" for="addFeatured">
                                    <i class="fas fa-star me-1"></i>Featured Story
                                </label>
                            </div>
                            <small class="text-muted">Featured stories will be highlighted on website</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Success Story
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Success Story Modal -->
<div class="modal fade" id="editStoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Success Story
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editStoryForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Author Name *</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Program *</label>
                            <select class="form-select" name="program" id="editProgram" required>
                                <option value="">Select Program</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Data Analytics">Data Analytics</option>
                                <option value="Entrepreneurship">Entrepreneurship</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Mobile Development">Mobile Development</option>
                                <option value="Cybersecurity">Cybersecurity</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Success Story *</label>
                            <textarea class="form-control" name="testimonial" id="editTestimonial" rows="4" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Author Image</label>
                            <input type="file" class="form-control" name="image" id="editImage" accept="image/*">
                            <small class="text-muted">Upload new image (optional)</small>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Sort Order</label>
                            <input type="number" class="form-control" name="sort_order" id="editSortOrder" value="0" min="0">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="status" id="editStatus">
                                <label class="form-check-label" for="editStatus">
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="editFeatured">
                                <label class="form-check-label" for="editFeatured">
                                    <i class="fas fa-star me-1"></i>Featured Story
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Success Story
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

.story-content {
    min-width: 200px;
    max-width: 300px;
}

.story-text {
    font-size: 0.9rem;
    line-height: 1.4;
    margin-bottom: 5px;
}

.author-avatar-small {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent));
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 0.8rem;
}

.author-avatar-small img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
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
let storiesData = @json($rows ?? []);

function viewStory(id) {
    const story = storiesData.data?.find(s => s.id === id);
    if (story) {
        alert(`Success Story Details:\n\nAuthor: ${story.name}\nProgram: ${story.program}\nFeatured: ${story.is_featured ? 'Yes' : 'No'}\nStatus: ${story.status ? 'Active' : 'Inactive'}\nOrder: ${story.sort_order}\n\nStory:\n${story.testimonial}`);
    }
}

function editStory(id) {
    const story = storiesData.data?.find(s => s.id === id);
    if (story) {
        // Pre-fill edit form
        document.getElementById('editName').value = story.name || '';
        document.getElementById('editProgram').value = story.program || '';
        document.getElementById('editTestimonial').value = story.testimonial || '';
        document.getElementById('editImage').value = story.image || '';
        document.getElementById('editSortOrder').value = story.sort_order || 0;
        document.getElementById('editStatus').checked = story.status || false;
        document.getElementById('editFeatured').checked = story.is_featured || false;
        
        // Set form action
        document.getElementById('editStoryForm').action = `/admin/success-stories/${id}`;
        
        // Show modal
        new bootstrap.Modal(document.getElementById('editStoryModal')).show();
    }
}

function toggleFeatured(id, isFeatured) {
    const action = isFeatured ? 'feature' : 'unfeature';
    if (confirm(`Are you sure you want to ${action} this success story?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/success-stories/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PUT';
        
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

function toggleStatus(id, status) {
    const action = status ? 'activate' : 'deactivate';
    if (confirm(`Are you sure you want to ${action} this success story?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/success-stories/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PUT';
        
        const statusField = document.createElement('input');
        statusField.type = 'hidden';
        statusField.name = 'status';
        statusField.value = status ? '1' : '0';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        form.appendChild(statusField);
        document.body.appendChild(form);
        form.submit();
    }
}

function deleteStory(id) {
    if (confirm('Are you sure you want to delete this success story? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/success-stories/${id}`;
        
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

// Test function to debug modal
function testModal() {
    console.log('Testing modal...');
    const modal = new bootstrap.Modal(document.getElementById('addStoryModal'));
    console.log('Modal object:', modal);
    modal.show();
}
</script>
@endsection
