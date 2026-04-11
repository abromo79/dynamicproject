@extends('layout.admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Events Management</h1>
        <p class="text-muted mb-0">Manage and organize your organization events</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="fas fa-plus me-2"></i>Add New Event
        </button>
    </div>
</div>

<!-- Search and Filter -->
<div class="admin-card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Search Events</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search by title or location...">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Type</label>
                <select class="form-select" name="type">
                    <option value="">All Types</option>
                    <option value="webinar">Webinar</option>
                    <option value="workshop">Workshop</option>
                    <option value="bootcamp">Bootcamp</option>
                    <option value="community_event">Community Event</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Status</label>
                <select class="form-select" name="is_upcoming">
                    <option value="">All Events</option>
                    <option value="1">Upcoming</option>
                    <option value="0">Past</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label fw-semibold">Date Range</label>
                <select class="form-select" name="date_range">
                    <option value="">All Time</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="quarter">This Quarter</option>
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

<!-- Events Table -->
<div class="admin-card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-calendar me-2"></i>All Events
            <span class="badge bg-primary ms-2">{{ $rows->total() ?? 0 }} Total</span>
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date & Time</th>
                        <th>Location</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows ?? [] as $event)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="event-icon me-3">
                                        @switch($event->type)
                                            @case('webinar')
                                                <i class="fas fa-video"></i>
                                            @break
                                            @case('workshop')
                                                <i class="fas fa-tools"></i>
                                            @break
                                            @case('bootcamp')
                                                <i class="fas fa-campground"></i>
                                            @break
                                            @case('community_event')
                                                <i class="fas fa-users"></i>
                                            @break
                                            @default
                                                <i class="fas fa-calendar"></i>
                                        @endswitch
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">{{ $event->title ?? 'Untitled' }}</h6>
                                        <small class="text-muted">{{ Str::limit($event->description ?? '', 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="event-date">
                                    @if($event->event_date)
                                        <div class="fw-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</div>
                                        <div class="text-muted small">{{ \Carbon\Carbon::parse($event->event_date)->format('h:i A') }}</div>
                                        
                                        @if(\Carbon\Carbon::parse($event->event_date)->isPast())
                                            <span class="badge bg-secondary">Past</span>
                                        @elseif(\Carbon\Carbon::parse($event->event_date)->isToday())
                                            <span class="badge bg-warning">Today</span>
                                        @elseif(\Carbon\Carbon::parse($event->event_date)->diffInDays(now()) <= 7)
                                            <span class="badge bg-info">This Week</span>
                                        @else
                                            <span class="badge bg-success">{{ \Carbon\Carbon::parse($event->event_date)->diffInDays(now()) }} days</span>
                                        @endif
                                    @else
                                        <span class="text-muted">No date set</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="event-location">
                                    <i class="fas fa-map-marker-alt me-1 text-muted"></i>
                                    {{ $event->location ?? 'Online' }}
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-{{ $event->type === 'webinar' ? 'primary' : ($event->type === 'workshop' ? 'success' : ($event->type === 'bootcamp' ? 'warning' : 'info')) }}">
                                    {{ ucfirst(str_replace('_', ' ', $event->type ?? 'unknown')) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $event->is_upcoming ? 'success' : 'secondary' }}">
                                    {{ $event->is_upcoming ? 'Upcoming' : 'Past' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-outline-primary" onclick="editEvent({{ $event->id ?? 0 }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info" onclick="viewEvent({{ $event->id ?? 0 }})" title="View">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success" onclick="duplicateEvent({{ $event->id ?? 0 }})" title="Duplicate">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" onclick="deleteEvent({{ $event->id ?? 0 }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-calendar fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">No Events Found</h5>
                                <p class="text-muted">Start by adding your first event</p>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                                    <i class="fas fa-plus me-2"></i>Add First Event
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
                    Showing {{ $rows->firstItem() ?? 0 }} to {{ $rows->lastItem() ?? 0 }} of {{ $rows->total() ?? 0 }} events
                </div>
                <div>
                    {{ $rows->links() ?? '' }}
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2"></i>Add New Event
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.module.store','events') }}">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Event Title *</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter event title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Event location or 'Online'">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Event Date *</label>
                            <input type="date" class="form-control" name="event_date" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Event Time</label>
                            <input type="time" class="form-control" name="event_time">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Type *</label>
                            <select class="form-select" name="type" required>
                                <option value="">Select type</option>
                                <option value="webinar">Webinar</option>
                                <option value="workshop">Workshop</option>
                                <option value="bootcamp">Bootcamp</option>
                                <option value="community_event">Community Event</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" name="is_upcoming">
                                <option value="1">Upcoming</option>
                                <option value="0">Past</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Max Attendees</label>
                            <input type="number" class="form-control" name="max_attendees" placeholder="Leave empty for unlimited">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Description *</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the event details..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Add Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Event Modal -->
<div class="modal fade" id="editEventModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Edit Event
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editEventForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Event Title *</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Location</label>
                            <input type="text" class="form-control" id="editLocation" name="location">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Event Date *</label>
                            <input type="date" class="form-control" id="editEventDate" name="event_date" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Event Time</label>
                            <input type="time" class="form-control" id="editEventTime" name="event_time">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Type *</label>
                            <select class="form-select" id="editType" name="type" required>
                                <option value="">Select type</option>
                                <option value="webinar">Webinar</option>
                                <option value="workshop">Workshop</option>
                                <option value="bootcamp">Bootcamp</option>
                                <option value="community_event">Community Event</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="editStatus" name="is_upcoming">
                                <option value="1">Upcoming</option>
                                <option value="0">Past</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Max Attendees</label>
                            <input type="number" class="form-control" id="editMaxAttendees" name="max_attendees">
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
                        <i class="fas fa-save me-2"></i>Update Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.event-icon {
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

.event-date {
    min-width: 120px;
}

.event-location {
    color: var(--kh-primary);
    font-weight: 500;
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
let eventsData = @json($rows ?? []);

function editEvent(id) {
    const event = eventsData.data?.find(e => e.id === id);
    if (event) {
        document.getElementById('editTitle').value = event.title || '';
        document.getElementById('editLocation').value = event.location || '';
        document.getElementById('editEventDate').value = event.event_date || '';
        document.getElementById('editEventTime').value = event.event_time || '';
        document.getElementById('editType').value = event.type || '';
        document.getElementById('editStatus').value = event.is_upcoming ? '1' : '0';
        document.getElementById('editMaxAttendees').value = event.max_attendees || '';
        document.getElementById('editDescription').value = event.description || '';
        
        const form = document.getElementById('editEventForm');
        form.action = `/admin/events/${id}`;
        
        new bootstrap.Modal(document.getElementById('editEventModal')).show();
    }
}

function viewEvent(id) {
    // Implement view event logic
    console.log('View event:', id);
}

function duplicateEvent(id) {
    // Implement duplicate event logic
    console.log('Duplicate event:', id);
}

function deleteEvent(id) {
    if (confirm('Are you sure you want to delete this event? This action cannot be undone.')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/events/${id}`;
        
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
