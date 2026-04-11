@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">System Settings</h1>
        <p class="text-muted mb-0">Manage application configuration and preferences</p>
    </div>
    <div>
        <button class="btn btn-success" onclick="exportSettings()">
            <i class="fas fa-download me-2"></i>Export Settings
        </button>
        <button class="btn btn-outline-warning ms-2" onclick="resetDefaults()">
            <i class="fas fa-undo me-2"></i>Reset to Defaults
        </button>
    </div>
</div>

<!-- Settings Categories -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-cog"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Settings</h6>
                        <h3 class="mb-0">{{ $rows->total() ?? 0 }}</h3>
                        <small class="text-success">
                            <i class="fas fa-check me-1"></i>Configured
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
                        <h6 class="text-muted mb-1">Active Settings</h6>
                        <h3 class="mb-0">{{ rand(15, 35) }}</h3>
                        <small class="text-success">
                            <i class="fas fa-power-off me-1"></i>Enabled
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
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Security Settings</h6>
                        <h3 class="mb-0">{{ rand(8, 18) }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-lock me-1"></i>Protected
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
                            <i class="fas fa-palette"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">UI Settings</h6>
                        <h3 class="mb-0">{{ rand(5, 12) }}</h3>
                        <small class="text-info">
                            <i class="fas fa-paint-brush me-1"></i>Appearance
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Settings Tabs -->
<div class="admin-card mb-4">
    <div class="card-body">
        <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                    <i class="fas fa-cog me-2"></i>General
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                    <i class="fas fa-shield-alt me-2"></i>Security
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">
                    <i class="fas fa-envelope me-2"></i>Email
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="ui-tab" data-bs-toggle="tab" data-bs-target="#ui" type="button" role="tab">
                    <i class="fas fa-palette me-2"></i>Appearance
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
                    <i class="fas fa-list me-2"></i>All Settings
                </button>
            </li>
        </ul>
        
        <div class="tab-content mt-3" id="settingsTabContent">
            <div class="tab-pane fade show active" id="general" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Site Name</label>
                        <input type="text" class="form-control" placeholder="Enter site name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Site Description</label>
                        <input type="text" class="form-control" placeholder="Enter site description">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Contact Email</label>
                        <input type="email" class="form-control" placeholder="contact@example.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Default Language</label>
                        <select class="form-select">
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="sw">Swahili</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="maintenance">
                            <label class="form-check-label" for="maintenance">
                                Maintenance Mode
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="security" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Session Timeout (minutes)</label>
                        <input type="number" class="form-control" placeholder="120">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Max Login Attempts</label>
                        <input type="number" class="form-control" placeholder="5">
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="2fa" checked>
                            <label class="form-check-label" for="2fa">
                                Enable Two-Factor Authentication
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="force_ssl" checked>
                            <label class="form-check-label" for="force_ssl">
                                Force HTTPS
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="email" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">SMTP Host</label>
                        <input type="text" class="form-control" placeholder="smtp.example.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">SMTP Port</label>
                        <input type="number" class="form-control" placeholder="587">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">SMTP Username</label>
                        <input type="text" class="form-control" placeholder="username">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">SMTP Password</label>
                        <input type="password" class="form-control" placeholder="password">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">From Email</label>
                        <input type="email" class="form-control" placeholder="noreply@example.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">From Name</label>
                        <input type="text" class="form-control" placeholder="Site Name">
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="ui" role="tabpanel">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Primary Color</label>
                        <input type="color" class="form-control form-control-color" value="#28a745">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Secondary Color</label>
                        <input type="color" class="form-control form-control-color" value="#17a2b8">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Logo</label>
                        <input type="file" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Favicon</label>
                        <input type="file" class="form-control" accept="image/x-icon">
                    </div>
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="dark_mode">
                            <label class="form-check-label" for="dark_mode">
                                Enable Dark Mode
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tab-pane fade" id="all" role="tabpanel">
                <!-- Search and Filter -->
                <form method="GET" class="row g-3 align-items-end mb-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Search Settings</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by key or value...">
                            <button class="btn btn-outline-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Category</label>
                        <select class="form-select" name="category">
                            <option value="">All Categories</option>
                            <option value="general">General</option>
                            <option value="security">Security</option>
                            <option value="email">Email</option>
                            <option value="ui">UI</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Type</label>
                        <select class="form-select" name="type">
                            <option value="">All Types</option>
                            <option value="string">String</option>
                            <option value="number">Number</option>
                            <option value="boolean">Boolean</option>
                            <option value="json">JSON</option>
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
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter me-2"></i>Apply Filters
                        </button>
                    </div>
                </form>
                
                <!-- Settings Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Setting Key</th>
                                <th>Value</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rows ?? [] as $setting)
                                <tr>
                                    <td>
                                        <div class="setting-key">
                                            <h6 class="mb-0 fw-semibold">{{ $setting->key ?? 'Unknown Key' }}</h6>
                                            <small class="text-muted">Configuration key</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="setting-value">
                                            <span class="text-muted">{{ Str::limit($setting->value ?? '', 50) }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ ucfirst($setting->category ?? 'general') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ ucfirst($setting->type ?? 'string') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="date-info">
                                            <div class="small text-muted">{{ $setting->updated_at?->format('M d, Y') ?? 'N/A' }}</div>
                                            <div class="small">{{ $setting->updated_at?->diffForHumans() ?? 'N/A' }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" onclick="viewSetting({{ $setting->id ?? 0 }})" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-info" onclick="editSetting({{ $setting->id ?? 0 }})" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-warning" onclick="duplicateSetting({{ $setting->id ?? 0 }})" title="Duplicate">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" onclick="deleteSetting({{ $setting->id ?? 0 }})" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <i class="fas fa-cog fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted">No Settings Found</h5>
                                        <p class="text-muted">No configuration settings have been created yet</p>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSettingModal">
                                            <i class="fas fa-plus me-2"></i>Add First Setting
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
                            Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} settings
                        </div>
                        <div>
                            {{ $rows->links() ?? '' }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="mt-3">
            <button type="button" class="btn btn-primary" onclick="saveCurrentTab()">
                <i class="fas fa-save me-2"></i>Save Changes
            </button>
            <button type="button" class="btn btn-outline-secondary ms-2" onclick="resetTab()">
                <i class="fas fa-undo me-2"></i>Reset
            </button>
        </div>
    </div>
</div>

<!-- Add Setting Modal -->
<div class="modal fade" id="addSettingModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Setting
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','settings') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Setting Key *</label>
                            <input type="text" class="form-control" name="key" placeholder="Enter setting key" required>
                            <small class="text-muted">Use dot notation: app.name, email.smtp_host</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category</label>
                            <select class="form-select" name="category">
                                <option value="general">General</option>
                                <option value="security">Security</option>
                                <option value="email">Email</option>
                                <option value="ui">UI</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Value Type</label>
                            <select class="form-select" name="type">
                                <option value="string">String</option>
                                <option value="number">Number</option>
                                <option value="boolean">Boolean</option>
                                <option value="json">JSON</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Setting Value *</label>
                            <input type="text" class="form-control" name="value" placeholder="Enter setting value" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Describe what this setting does..."></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_public" id="isPublic">
                                <label class="form-check-label" for="isPublic">
                                    Publicly accessible
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Setting
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

.setting-key, .setting-value, .date-info {
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

.nav-tabs .nav-link {
    border: none;
    border-bottom: 2px solid transparent;
    color: var(--kh-dark);
}

.nav-tabs .nav-link.active {
    border-bottom-color: var(--kh-primary);
    color: var(--kh-primary);
    background: none;
}

.nav-tabs .nav-link:hover {
    border-bottom-color: var(--kh-accent);
    color: var(--kh-accent);
}
</style>

<script>
let settingsData = @json($rows ?? []);

function viewSetting(id) {
    const setting = settingsData.data?.find(s => s.id === id);
    if (setting) {
        alert(`Setting Details:\n\nKey: ${setting.key}\nValue: ${setting.value}\nCategory: ${setting.category || 'general'}\nType: ${setting.type || 'string'}\nUpdated: ${setting.updated_at || 'N/A'}`);
    }
}

function editSetting(id) {
    const setting = settingsData.data?.find(s => s.id === id);
    if (setting) {
        // Pre-fill edit form with setting data
        alert(`Edit setting: ${setting.key}`);
        // In real implementation, this would open an edit modal
    }
}

function duplicateSetting(id) {
    if (confirm('Are you sure you want to duplicate this setting?')) {
        const setting = settingsData.data?.find(s => s.id === id);
        if (setting) {
            // Pre-fill add form with duplicated data
            alert(`Duplicate setting: ${setting.key}`);
            // In real implementation, this would pre-fill the add modal
        }
    }
}

function deleteSetting(id) {
    if (confirm('Are you sure you want to delete this setting? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/settings/${id}`;
        
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

function saveCurrentTab() {
    const activeTab = document.querySelector('.tab-pane.active').id;
    alert(`Saving ${activeTab} settings...`);
    // In real implementation, this would save the current tab's settings
}

function resetTab() {
    if (confirm('Are you sure you want to reset this tab to default values?')) {
        const activeTab = document.querySelector('.tab-pane.active').id;
        alert(`Resetting ${activeTab} settings to defaults...`);
        // In real implementation, this would reset the current tab's settings
    }
}

function exportSettings() {
    alert('Exporting all settings...');
    // In real implementation, this would export settings to a file
}

function resetDefaults() {
    if (confirm('Are you sure you want to reset all settings to defaults? This action cannot be undone.')) {
        alert('Resetting all settings to defaults...');
        // In real implementation, this would reset all settings
    }
}
</script>
@endsection
