<?php

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
            $table->foreignIdFor(Country::class);
            $table->string('status');
            $table->timestamps();
        });
    }
};