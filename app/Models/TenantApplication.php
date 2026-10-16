<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantApplication extends Model
{
    protected $fillable = [
        'user_id',
        'zip_code',
        'viewing_date',
        'viewing_time',
        'ampm',
        'target_date',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'street_address',
        'city',
        'state',
        'postal_code',
        'country',
        'annual_income',
        'smoke',
        'guarantor',
        'pet_info',
        'deposit',
        'tenancy_length',
        'payment_method',
        'agree_disclose',
        'no_contract',
        'agree_payment',
        'signature',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
