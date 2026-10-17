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
@if (filled($application->signature) && str_starts_with($application->signature, 'data:image/png;base64,'))
    <img src="{{ $application->signature }}" alt="Applicant signature" style="max-width: 100%; max-height: 180px;">
@elseif (filled($application->signature))
    <p class="mb-0">Signature submitted</p>
@else
    <p class="mb-0">No signature stored</p>
@endif
