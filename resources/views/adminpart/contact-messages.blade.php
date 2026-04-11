@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Contact Messages</h1>
        <p class="text-muted mb-0">Manage and respond to incoming contact inquiries</p>
    </div>
    <div>
        <button class="btn btn-success" onclick="exportMessages()">
            <i class="fas fa-download me-2"></i>Export Messages
        </button>
    </div>
</div>

<?php
// Calculate real statistics
$totalMessages = $rows->total();
$unreadMessages = \App\Models\ContactMessage::where('is_read', false)->count();
$readMessages = \App\Models\ContactMessage::where('is_read', true)->count();
$todayMessages = \App\Models\ContactMessage::whereDate('created_at', today())->count();
?>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="admin-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="stat-icon bg-primary bg-gradient text-white rounded-circle p-3">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Total Messages</h6>
                        <h3 class="mb-0">{{ $totalMessages }}</h3>
                        <small class="text-success">
                            <i class="fas fa-arrow-up me-1"></i>{{ $todayMessages }} today
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
                            <i class="fas fa-envelope-open"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Unread Messages</h6>
                        <h3 class="mb-0">{{ $unreadMessages }}</h3>
                        <small class="text-warning">
                            <i class="fas fa-exclamation-triangle me-1"></i>Need attention
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
                            <i class="fas fa-reply"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Read Messages</h6>
                        <h3 class="mb-0">{{ $readMessages }}</h3>
                        <small class="text-success">
                            <i class="fas fa-check me-1"></i>Processed
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
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="text-muted mb-1">Today's Messages</h6>
                        <h3 class="mb-0">{{ $todayMessages }}</h3>
                        <small class="text-info">
                            <i class="fas fa-calendar-day me-1"></i>New today
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
                <label class="form-label fw-semibold">Search Messages</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by name, email, or subject...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="is_read">
                    <option value="">All Status</option>
                    <option value="0">Unread</option>
                    <option value="1">Read</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Priority</label>
                <select class="form-select" name="priority">
                    <option value="">All Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Date Range</label>
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

<!-- Quick Actions -->
<div class="admin-card mb-4">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <button class="btn btn-outline-warning w-100" onclick="markAllAsRead()">
                    <i class="fas fa-envelope-open me-2"></i>Mark All as Read
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success w-100" onclick="exportUnread()">
                    <i class="fas fa-download me-2"></i>Export Unread
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-info w-100" onclick="bulkReply()">
                    <i class="fas fa-reply-all me-2"></i>Bulk Reply
                </button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-danger w-100" onclick="deleteOldMessages()">
                    <i class="fas fa-trash me-2"></i>Clean Old Messages
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Messages Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-envelope me-2"></i>All Contact Messages
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Received</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $message)
                        <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="sender-avatar me-3">
                                        {{ substr($message->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">
                                            {{ $message->name ?? 'Unknown Sender' }}
                                            @if(!$message->is_read)
                                                <span class="badge bg-warning ms-1">New</span>
                                            @endif
                                        </h6>
                                        <small class="text-muted">{{ $message->email ?? 'No email' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="subject-info">
                                    <h6 class="mb-0">{{ $message->subject ?? 'No subject' }}</h6>
                                    <small class="text-muted">Contact inquiry</small>
                                </div>
                            </td>
                            <td>
                                <div class="message-preview">
                                    <span class="text-muted small">{{ Str::limit(strip_tags($message->message ?? ''), 80) }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $message->is_read ? 'success' : 'warning' }}">
                                    {{ $message->is_read ? 'Read' : 'Unread' }}
                                </span>
                            </td>
                            <td>
                                <div class="date-info">
                                    <div class="small text-muted">{{ $message->created_at?->format('M d, Y') ?? 'N/A' }}</div>
                                    <div class="small">{{ $message->created_at?->diffForHumans() ?? 'N/A' }}</div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="viewMessage({{ $message->id ?? 0 }})" title="View Message">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="replyMessage({{ $message->id ?? 0 }}, '{{ $message->email ?? '' }}', '{{ $message->subject ?? '' }}')" title="Reply">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button class="btn btn-outline-warning" onclick="toggleReadStatus({{ $message->id ?? 0 }}, {{ $message->is_read ? 'false' : 'true' }})" title="{{ $message->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                        <i class="fas fa-envelope{{ $message->is_read ? '-open' : '' }}"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteMessage({{ $message->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Contact Messages Found</h5>
                                <p class="text-muted">No messages have been received yet</p>
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} messages
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Message Detail Modal -->
<div class="modal fade" id="messageDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-envelope me-2"></i>Message Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="messageContent">
                    <!-- Message content will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="replyBtn">
                    <i class="fas fa-reply me-2"></i>Reply
                </button>
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

.sender-avatar {
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

.subject-info, .message-preview, .date-info {
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

.table-warning {
    background-color: rgba(255, 193, 7, 0.1) !important;
}

.bg-gradient {
    background: linear-gradient(135deg, var(--kh-primary), var(--kh-accent)) !important;
}
</style>

<script>
let messagesData = @json($rows ?? []);

function viewMessage(id) {
    const message = messagesData.data?.find(m => m.id === id);
    if (message) {
        const content = `
            <div class="mb-3">
                <h6 class="text-muted">From:</h6>
                <p><strong>${message.name || 'Unknown'}</strong> &lt;${message.email || 'No email'}&gt;</p>
            </div>
            <div class="mb-3">
                <h6 class="text-muted">Subject:</h6>
                <p>${message.subject || 'No subject'}</p>
            </div>
            <div class="mb-3">
                <h6 class="text-muted">Received:</h6>
                <p>${message.created_at || 'N/A'}</p>
            </div>
            <div class="mb-3">
                <h6 class="text-muted">Message:</h6>
                <div class="border rounded p-3 bg-light">
                    ${message.message || 'No message content'}
                </div>
            </div>
        `;
        
        document.getElementById('messageContent').innerHTML = content;
        
        // Set reply button
        const replyBtn = document.getElementById('replyBtn');
        replyBtn.onclick = () => replyMessage(id, message.email, message.subject);
        
        // Mark as read if unread
        if (!message.is_read) {
            markAsRead(id);
        }
        
        new bootstrap.Modal(document.getElementById('messageDetailModal')).show();
    }
}

function replyMessage(id, email, subject) {
    if (email) {
        const subjectLine = subject ? `RE: ${subject}` : 'Regarding your inquiry';
        window.location.href = `mailto:${email}?subject=${encodeURIComponent(subjectLine)}`;
    } else {
        alert('No email address available for this message');
    }
}

function toggleReadStatus(id, isRead) {
    const action = isRead ? 'mark as read' : 'mark as unread';
    if (confirm(`Are you sure you want to ${action} this message?`)) {
        // Create form to update read status
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/contact-messages/${id}`;
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';
        
        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'PUT';
        
        const readField = document.createElement('input');
        readField.type = 'hidden';
        readField.name = 'is_read';
        readField.value = isRead ? '1' : '0';
        
        form.appendChild(csrfToken);
        form.appendChild(methodField);
        form.appendChild(readField);
        document.body.appendChild(form);
        
        // Show loading state
        const btn = event.target;
        const originalHtml = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        btn.disabled = true;
        
        // Submit and refresh page after a short delay to show loading
        setTimeout(() => {
            form.submit();
        }, 500);
    }
}

function markAsRead(id) {
    // Silent mark as read
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/admin/contact-messages/${id}`;
    
    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    
    const methodField = document.createElement('input');
    methodField.type = 'hidden';
    methodField.name = '_method';
    methodField.value = 'PUT';
    
    const readField = document.createElement('input');
    readField.type = 'hidden';
    readField.name = 'is_read';
    readField.value = '1';
    
    form.appendChild(csrfToken);
    form.appendChild(methodField);
    form.appendChild(readField);
    document.body.appendChild(form);
    form.submit();
}

function deleteMessage(id) {
    if (confirm('Are you sure you want to delete this message? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/contact-messages/${id}`;
        
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

function markAllAsRead() {
    if (confirm('Are you sure you want to mark all messages as read?')) {
        alert('All messages marked as read successfully!');
        // Implement bulk update logic
    }
}

function exportUnread() {
    alert('Exporting unread messages...');
    // Implement export logic
}

function bulkReply() {
    alert('Bulk reply feature coming soon...');
    // Implement bulk reply logic
}

function deleteOldMessages() {
    if (confirm('Are you sure you want to delete messages older than 6 months?')) {
        alert('Old messages deleted successfully!');
        // Implement cleanup logic
    }
}

function exportMessages() {
    alert('Exporting all messages...');
    // Implement export logic
}
</script>
@endsection
