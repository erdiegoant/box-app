<?php

use App\Enums\BoxStatus;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Customer::class);
            $table->foreignIdFor(Country::class, 'origin_id');
            $table->foreignIdFor(Country::class, 'destination_id');
            $table->string('status')->default(BoxStatus::DRAFT->value);
            $table->timestamps();
        });
    }
};
