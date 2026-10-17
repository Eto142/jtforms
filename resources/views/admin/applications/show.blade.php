@include('admin.header')
@include('admin.navbar')

<div class="page-header">
    <div>
        <nav class="breadcrumb">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="separator">/</span>
            <a href="{{ route('admin.applications') }}">Tenant Applications</a>
            <span class="separator">/</span>
            <span class="current">Application Details</span>
        </nav>
        <h1 class="page-title">Tenant Application</h1>
        <p class="page-subtitle">Submitted {{ $application->created_at->format('M j, Y g:i A') }}</p>
    </div>
    <div class="page-header-actions">
        <a href="{{ route('admin.applications') }}" class="btn-admin btn-admin-secondary">
            <i class="bi bi-arrow-left"></i>
            Back to Applications
        </a>
    </div>
</div>

<div class="admin-card mb-4">
    <div class="admin-card-header">
        <h2 class="admin-card-title"><i class="bi bi-person-fill"></i> Account</h2>
    </div>
    <div class="admin-card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Account name</dt>
            <dd class="col-sm-9">{{ $application->user?->name ?? 'Account no longer available' }}</dd>
            <dt class="col-sm-3">Account email</dt>
            <dd class="col-sm-9">{{ $application->user?->email ?? 'Not available' }}</dd>
        </dl>
    </div>
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2 class="admin-card-title"><i class="bi bi-file-earmark-text-fill"></i> Form Details</h2>
    </div>
    <div class="admin-card-body">
        @include('admin.partials.tenant_application_details', ['application' => $application])
    </div>
</div>

@include('admin.footer')
