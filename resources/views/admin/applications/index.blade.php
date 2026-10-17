@include('admin.header')
@include('admin.navbar')

<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <span class="current">Tenant Applications</span>
        </nav>
        <h1 class="page-title">Tenant Applications</h1>
        <p class="page-subtitle">Review submitted tenant forms and their details.</p>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title">
            <i class="bi bi-file-earmark-text-fill"></i>
            Submitted Forms
        </h2>
        <span style="color: var(--admin-text-muted); font-size: 14px;">{{ $applications->total() }} applications</span>
    </div>

    <div class="admin-card-body" style="padding: 0;">
        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Preferred Viewing</th>
                        <th>Submitted</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $application)
                        <tr>
                            <td>{{ $application->first_name }} {{ $application->middle_name }} {{ $application->last_name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->phone }}</td>
                            <td>{{ $application->viewing_date }} {{ $application->viewing_time }} {{ $application->ampm }}</td>
                            <td>{{ $application->created_at->format('M j, Y g:i A') }}</td>
                            <td>
                                <a href="{{ route('admin.applications.show', $application) }}" class="action-btn view" title="View application details" aria-label="View application details">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-state-icon"><i class="bi bi-file-earmark-text"></i></div>
                                    <div class="empty-state-title">No tenant applications yet</div>
                                    <div class="empty-state-text">Submitted forms will appear here.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($applications->hasPages())
        <div class="admin-card-footer">{{ $applications->links() }}</div>
    @endif
</div>

@include('admin.footer')
