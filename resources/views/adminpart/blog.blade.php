@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Blog Management</h1>
        <p class="text-muted mb-0">Manage and publish blog posts and articles</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
            <i class="fas fa-plus me-2"></i>New Blog Post
        </button>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Search Posts</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by title or content...">
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
                    <option value="Education">Education</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Author</label>
                <select class="form-select" name="author">
                    <option value="">All Authors</option>
                    <option value="Admin">Admin</option>
                    <option value="Editor">Editor</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="is_published">
                    <option value="">All Status</option>
                    <option value="1">Published</option>
                    <option value="0">Draft</option>
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

<!-- Blog Posts Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-blog me-2"></i>All Blog Posts
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Post</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $post)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="post-icon me-3">
                                        <i class="fas fa-blog"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $post->title ?? 'Untitled' }}</h6>
                                        <small class="text-muted">{{ Str::limit(strip_tags($post->content ?? ''), 80) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    {{ $post->category ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td>
                                <div class="author-info">
                                    <div class="fw-semibold">{{ $post->author ?? 'Unknown' }}</div>
                                    <small class="text-muted">{{ $post->created_at?->format('M d, Y') ?? 'N/A' }}</small>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $post->is_published ? 'success' : 'warning' }}">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td>
                                <div class="post-date">
                                    @if($post->published_at)
                                        <div class="small text-muted">{{ \Carbon\Carbon::parse($post->published_at)->format('M d, Y') }}</div>
                                        <div class="small">{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</div>
                                    @else
                                        <span class="text-muted">Not published</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editPost({{ $post->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewPost({{ $post->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="duplicatePost({{ $post->id ?? 0 }})" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    @if($post->is_published)
                                        <button class="btn btn-outline-warning" onclick="unpublishPost({{ $post->id ?? 0 }})" title="Unpublish">
                                            <i class="fas fa-eye-slash"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-outline-success" onclick="publishPost({{ $post->id ?? 0 }})" title="Publish">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    @endif
                                    <button class="btn btn-outline-danger" onclick="deletePost({{ $post->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-blog fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Blog Posts Found</h5>
                                <p class="text-muted">Start by writing your first blog post</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">
                                    <i class="fas fa-plus me-2"></i>Write First Post
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} posts
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Post Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>New Blog Post
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','blog') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Post Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter post title" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category *</label>
                            <select class="form-select" name="category" required>
                                <option value="">Select category</option>
                                <option value="Technology">Technology</option>
                                <option value="Business">Business</option>
                                <option value="Leadership">Leadership</option>
                                <option value="Innovation">Innovation</option>
                                <option value="Education">Education</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Author</label>
                            <input type="text" class="form-control" name="author" placeholder="Author name" value="{{ auth()->user()->name ?? 'Admin' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" name="is_published">
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Content *</label>
                            <textarea class="form-control" name="content" rows="12" placeholder="Write your blog post content..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Post Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Blog Post
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editPostForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Post Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category *</label>
                            <select class="form-select" id="editCategory" name="category" required>
                                <option value="">Select category</option>
                                <option value="Technology">Technology</option>
                                <option value="Business">Business</option>
                                <option value="Leadership">Leadership</option>
                                <option value="Innovation">Innovation</option>
                                <option value="Education">Education</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Author</label>
                            <input type="text" class="form-control" id="editAuthor" name="author">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="editStatus" name="is_published">
                                <option value="0">Draft</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Content *</label>
                            <textarea class="form-control" id="editContent" name="content" rows="12" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.post-icon {
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

.author-info {
    min-width: 120px;
}

.post-date {
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

.modal-xl .modal-dialog {
    max-width: 90%;
}

textarea.form-control {
    font-family: 'Courier New', monospace;
    line-height: 1.5;
}
</style>

<script>
let postsData = @json($rows ?? []);

function editPost(id) {
    const post = postsData.data?.find(p => p.id === id);
    if (post) {
        document.getElementById('editTitle').value = post.title || '';
        document.getElementById('editCategory').value = post.category || '';
        document.getElementById('editAuthor').value = post.author || '';
        document.getElementById('editStatus').value = post.is_published ? '1' : '0';
        document.getElementById('editContent').value = post.content || '';
        
        const form = document.getElementById('editPostForm');
        form.action = `/admin/blog/${id}`;
        
        new bootstrap.Modal(document.getElementById('editPostModal')).show();
    }
}

function viewPost(id) {
    // Implement view post logic
    console.log('View post:', id);
}

function duplicatePost(id) {
    // Implement duplicate post logic
    console.log('Duplicate post:', id);
}

function publishPost(id) {
    if (confirm('Are you sure you want to publish this post?')) {
        // Implement publish logic
        console.log('Publish post:', id);
    }
}

function unpublishPost(id) {
    if (confirm('Are you sure you want to unpublish this post?')) {
        // Implement unpublish logic
        console.log('Unpublish post:', id);
    }
}

function deletePost(id) {
    if (confirm('Are you sure you want to delete this blog post? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/blog/${id}`;
        
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
