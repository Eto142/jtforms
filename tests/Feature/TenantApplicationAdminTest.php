<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\TenantApplication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantApplicationAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_list_and_view_full_tenant_application_details(): void
    {
        $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);
        $user = User::factory()->create();
        $application = TenantApplication::create([
            'user_id' => $user->id,
            'zip_code' => '90210',
            'viewing_date' => '2026-11-01',
            'viewing_time' => '10:30',
            'ampm' => 'AM',
            'target_date' => '2026-12-01',
            'first_name' => 'Taylor',
            'middle_name' => 'A',
            'last_name' => 'Applicant',
            'email' => 'taylor@example.com',
            'phone' => '555-0100',
            'dob' => '1990-01-15',
            'street_address' => '12 Main Street',
            'city' => 'Beverly Hills',
            'state' => 'California',
            'postal_code' => '90210',
            'country' => 'United States',
            'annual_income' => '85000',
            'smoke' => 'No',
            'guarantor' => 'Yes',
            'pet_info' => 'One cat',
            'deposit' => '5000',
            'tenancy_length' => '12 months',
            'payment_method' => 'Zelle',
            'agree_disclose' => 'agree',
            'no_contract' => 'understand',
            'agree_payment' => 'agree100',
            'signature' => 'data:image/png;base64,c2lnbmF0dXJl',
        ]);

        $this->actingAs($admin, 'admin')
            ->get(route('admin.applications'))
            ->assertOk()
            ->assertSee('Tenant Applications')
            ->assertSee('Taylor Applicant')
            ->assertSee(route('admin.applications.show', $application));

        $this->actingAs($admin, 'admin')
            ->get(route('admin.applications.show', $application))
            ->assertOk()
            ->assertSee('Taylor Applicant')
            ->assertSee('12 Main Street')
            ->assertSee('One cat')
            ->assertSee('12 months')
            ->assertSee('Applicant signature');
    }

    public function test_tenant_application_pages_require_admin_authentication(): void
    {
        $this->get(route('admin.applications'))
            ->assertRedirect(route('admin.login'));
    }
}
