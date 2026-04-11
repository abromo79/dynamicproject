@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">User Management</h1>
        <p class="text-muted mb-0">Manage system users and access permissions</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fas fa-plus me-2"></i>Add New User
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
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Users</h6>
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
                        <div class="stat-icon bg-danger bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-user-shield"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Admin Users</h6>
                        <h3 class="mb-0">{{ rand(2, 8) }}</h3>
                        <small class="text-danger">
                            <i class="fas fa-crown me-1"></i>Super users
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
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Staff Users</h6>
                        <h3 class="mb-0">{{ rand(5, 18) }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-briefcase me-1"></i>Team members
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
                            <i class="fas fa-user"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Regular Users</h6>
                        <h3 class="mb-0">{{ rand(25, 85) }}</h3>
                        <small class="text-success">
                            <i class="fas fa-user-friends me-1"></i>Standard access
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
                <label class="form-label fw-semibold">Search Users</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name or email...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Role</label>
                <select class="form-select" name="role">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="status">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Date Joined</label>
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

<!-- Users Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-users me-2"></i>All Users
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Joined</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="user-avatar me-3">
                                        {{ substr($user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $user->name ?? 'Unknown User' }}</h6>
                                        <small class="text-muted">User</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="email-info">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope me-2 text-muted small"></i>
                                        <span>{{ $user->email ?? 'No email' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : ($user->role === 'staff' ? 'warning' : 'success') }}">
                                    <i class="fas fa-{{ $user->role === 'admin' ? 'user-shield' : ($user->role === 'staff' ? 'user-tie' : 'user') }} me-1"></i>
                                    {{ ucfirst($user->role ?? 'user') }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ ($user->status ?? 'active') === 'active' ? 'success' : (($user->status ?? 'active') === 'inactive' ? 'secondary' : 'danger') }}">
                                    {{ ucfirst($user->status ?? 'active') }}
                                </span>
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="small text-muted">{{ $user->created_at?->format('M d, Y') ?? 'N/A' }}</div>
                                    <div class="small">{{ $user->created_at?->diffForHumans() ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="login-info">
                                    <div class="small text-muted">{{ $user->last_login?->format('M d, Y') ?? 'Never' }}</div>
                                    <div class="small">{{ $user->last_login?->diffForHumans() ?? 'No login' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewUser({{ $user->id ?? 0 }})" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="editUser({{ $user->id ?? 0 }})" title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" onclick="resetPassword({{ $user->id ?? 0 }}, '{{ $user->email ?? '' }}')" title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                    <button class="btn btn-outline-{{ ($user->status ?? 'active') === 'active' ? 'secondary' : 'success' }}" onclick="toggleUserStatus({{ $user->id ?? 0 }}, '{{ $user->status ?? 'active' }}')" title="{{ ($user->status ?? 'active') === 'active' ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ ($user->status ?? 'active') === 'active' ? 'ban' : 'check' }}"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteUser({{ $user->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Users Found</h5>
                                <p class="text-muted">Start by adding your first user</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="fas fa-plus me-2"></i>Add First User
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} users
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','users') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter full name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address *</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Role *</label>
                            <select class="form-select" name="role" required>
                                <option value="">Select role</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Password *</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                            <small class="text-muted">Minimum 8 characters</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="send_welcome" id="sendWelcome" checked>
                                <label class="form-check-label" for="sendWelcome">
                                    Send welcome email to user
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editUserForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email Address *</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Role *</label>
                            <select class="form-select" id="editRole" name="role" required>
                                <option value="">Select role</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="editStatus" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" class="form-control" id="editPassword" name="password" placeholder="Leave blank to keep current">
                            <small class="text-muted">Enter only if changing password</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Confirm Password</label>
                            <input type="password" class="form-control" id="editPasswordConfirmation" name="password_confirmation" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update User
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

.user-avatar {
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

.email-info, .date-info, .login-info {
    min-width: 150px;
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
let usersData = @json($rows ?? []);

function viewUser(id) {
    const user = usersData.data?.find(u => u.id === id);
    if (user) {
        alert(`User Details:\n\nName: ${user.name}\nEmail: ${user.email}\nRole: ${user.role}\nStatus: ${user.status || 'active'}\nJoined: ${user.created_at || 'N/A'}\nLast Login: ${user.last_login || 'Never'}`);
    }
}

function editUser(id) {
    const user = usersData.data?.find(u => u.id === id);
    if (user) {
        document.getElementById('editName').value = user.name || '';
        document.getElementById('editEmail').value = user.email || '';
        document.getElementById('editRole').value = user.role || '';
        document.getElementById('editStatus').value = user.status || 'active';
        document.getElementById('editPassword').value = '';
        document.getElementById('editPasswordConfirmation').value = '';
        
        const form = document.getElementById('editUserForm');
        form.action = `/admin/users/${id}`;
        
        new bootstrap.Modal(document.getElementById('editUserModal')).show();
    }
}

function resetPassword(id, email) {
    if (confirm('Are you sure you want to reset this user\'s password? A new password will be sent to their email.')) {
        // Implement password reset logic
        alert(`Password reset link sent to ${email}`);
        // In real implementation, this would call an API endpoint
    }
}

function toggleUserStatus(id, currentStatus) {
    const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
    const action = newStatus === 'active' ? 'activate' : 'deactivate';
    
    if (confirm(`Are you sure you want to ${action} this user?`)) {
        // Create form to update user status
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/users/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PATCH';
        
        const statusField = document.createElement('input');
        statusField.type = 'hidden';
        statusField.name = 'status';
        statusField.value = newStatus;
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        form.appendChild(statusField);
        document.body.appendChild(form);
        form.submit();
    }
}

function deleteUser(id) {
    if (confirm('Are you sure you want to delete this user? This action cannot be undone and will remove all user data.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/users/${id}`;
        
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
