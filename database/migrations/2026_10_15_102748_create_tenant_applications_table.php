<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tenant_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // ZIP & Viewing
            $table->string('zip_code', 20);
            $table->date('viewing_date');
            $table->time('viewing_time');
            $table->string('ampm', 2);
            $table->date('target_date');

            // Applicant Basic Info
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('email');
            $table->string('phone', 30);
            $table->date('dob');
            $table->string('street_address');
            $table->string('city', 100);
            $table->string('state', 100);
            $table->string('postal_code', 20);
            $table->string('country', 100);
            $table->string('annual_income', 50)->nullable();

            // General
            $table->string('smoke', 3);
            $table->string('guarantor', 3);
            $table->string('pet_info')->nullable();
            $table->string('deposit', 50);
            $table->string('tenancy_length', 100)->nullable();

            // Payment
            $table->string('payment_method');

            // Agreements
            $table->string('agree_disclose');
            $table->string('no_contract');
            $table->string('agree_payment');

            // Signature stored as base64 text
            $table->longText('signature')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('email');
            $table->index('viewing_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenant_applications');
    }
};