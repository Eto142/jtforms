<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TenantApplication;

class TenantApplicationController extends Controller
{
   public function submitForm(Request $request)
{
    $validated = $request->validate([
        'zipCode'         => 'required|string|max:20',
        'viewingDate'     => 'required|date',
        'viewingTime'     => 'required',
        'ampm'            => 'required|in:AM,PM',
        'targetDate'      => 'required|date',

        'firstName'       => 'required|string|max:100',
        'middleName'      => 'nullable|string|max:100',
        'lastName'        => 'required|string|max:100',
        'email'           => 'required|email|max:255',
        'phone'           => 'required|string|max:30',
        'dob'             => 'required|date',
        'streetAddress'   => 'required|string|max:255',
        'city'            => 'required|string|max:100',
        'state'           => 'required|string|max:100',
        'postalCode'      => 'required|string|max:20',
        'country'         => 'required|string|max:100',
        'annualIncome'    => 'nullable|string|max:50',

        'smoke'           => 'required|in:Yes,No',
        'guarantor'       => 'required|in:Yes,No',
        'petInfo'         => 'nullable|string|max:255',
        'deposit'         => 'required|string|max:50',
        'tenancyLength'   => 'nullable|string|max:100',

        'paymentMethod'   => 'required|in:Apple pay,Chime,Zelle,Cash App',

        'agreeDisclose'   => 'required|in:agree',
        'noContract'      => 'required|in:understand',
        'agreePayment'    => 'required|in:agree100',

        'signature'       => 'required|string',
    ]);

    try {
        TenantApplication::create([
            'user_id'         => Auth::id(),
            'zip_code'        => $validated['zipCode'],
            'viewing_date'    => $validated['viewingDate'],
            'viewing_time'    => $validated['viewingTime'],
            'ampm'            => $validated['ampm'],
            'target_date'     => $validated['targetDate'],

            'first_name'      => $validated['firstName'],
            'middle_name'     => $validated['middleName'] ?? null,
            'last_name'       => $validated['lastName'],
            'email'           => Auth::user()->email, // tied to login email
            'phone'           => $validated['phone'],
            'dob'             => $validated['dob'],
            'street_address'  => $validated['streetAddress'],
            'city'            => $validated['city'],
            'state'           => $validated['state'],
            'postal_code'     => $validated['postalCode'],
            'country'         => $validated['country'],
            'annual_income'   => $validated['annualIncome'] ?? null,

            'smoke'           => $validated['smoke'],
            'guarantor'       => $validated['guarantor'],
            'pet_info'        => $validated['petInfo'] ?? null,
            'deposit'         => $validated['deposit'],
            'tenancy_length'  => $validated['tenancyLength'] ?? null,

            'payment_method'  => $validated['paymentMethod'],

            'agree_disclose'  => $validated['agreeDisclose'],
            'no_contract'     => $validated['noContract'],
            'agree_payment'   => $validated['agreePayment'],

            'signature'       => $validated['signature'], // base64 PNG string
        ]);
    } catch (\Throwable $e) {
        \Log::error('Tenant application failed: ' . $e->getMessage(), [
            'user_id' => Auth::id(),
            'trace'   => $e->getTraceAsString(),
        ]);

        return back()
            ->withInput()
            ->withErrors(['error' => 'Submission failed. Please try again.']);
    }

    return redirect()->route('thankyou')->with('success', 'Application submitted successfully!');
}
}