@include('admin.header')
@include('admin.navbar')

<div class="container" style="max-width: 1100px; margin: 48px auto;">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="h5 mb-3">Account</h2>
            <dl class="row mb-0">
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $userProfile->email ?: 'Not provided' }}</dd>
                <dt class="col-sm-3">Show Password</dt>
                <dd class="col-sm-9">{{ $userProfile->show_password }}</dd>
            </dl>
        </div>
    </div>

    <h2 class="h4 mb-3">Tenant applications</h2>

    @forelse ($tenantApplications as $application)
        <div class="card mb-4">
            <div class="card-header">
                Application submitted {{ $application->created_at }}
            </div>
            <div class="card-body">
                @include('admin.partials.tenant_application_details', ['application' => $application])
            </div>
        </div>
    @empty
        <div class="alert alert-info" role="status">
            No tenant applications have been submitted for this account.
        </div>
    @endforelse
</div>

@include('admin.footer')
