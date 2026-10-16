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
                @php
                    $applicationSections = [
                        'Property and viewing' => [
                            'zip_code' => 'Property ZIP code',
                            'viewing_date' => 'Preferred viewing date',
                            'viewing_time' => 'Preferred viewing time',
                            'ampm' => 'AM/PM',
                            'target_date' => 'Target move-in date',
                        ],
                        'Applicant information' => [
                            'first_name' => 'First name',
                            'middle_name' => 'Middle name',
                            'last_name' => 'Last name',
                            'email' => 'Email',
                            'phone' => 'Phone',
                            'dob' => 'Date of birth',
                            'street_address' => 'Street address',
                            'city' => 'City',
                            'state' => 'State / Province',
                            'postal_code' => 'Postal / ZIP code',
                            'country' => 'Country',
                            'annual_income' => 'Annual income',
                        ],
                        'General' => [
                            'smoke' => 'Smokes',
                            'guarantor' => 'Has a guarantor',
                            'pet_info' => 'Pet information',
                            'deposit' => 'Available deposit',
                            'tenancy_length' => 'Desired tenancy length',
                        ],
                        'Payment and agreements' => [
                            'payment_method' => 'Payment method',
                            'agree_disclose' => 'Disclosure agreement',
                            'no_contract' => 'No-contract acknowledgment',
                            'agree_payment' => 'Payment agreement',
                        ],
                    ];
                @endphp

                @foreach ($applicationSections as $sectionTitle => $fields)
                    <h3 class="h6 mt-3">{{ $sectionTitle }}</h3>
                    <dl class="row">
                        @foreach ($fields as $field => $label)
                            @php($value = $application->{$field})
                            <dt class="col-sm-4">{{ $label }}</dt>
                            <dd class="col-sm-8">{{ filled($value) ? $value : 'Not provided' }}</dd>
                        @endforeach
                    </dl>
                @endforeach

                <h3 class="h6 mt-3">Signature</h3>
                <p class="mb-0">{{ filled($application->signature) ? 'Signature submitted' : 'No signature stored' }}</p>
            </div>
        </div>
    @empty
        <div class="alert alert-info" role="status">
            No tenant applications have been submitted for this account.
        </div>
    @endforelse
</div>

@include('admin.footer')
