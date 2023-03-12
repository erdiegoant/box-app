<?php

use App\Enums\BoxItemStatus;
use App\Models\Box;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Box::class);
            $table->string('name');
            $table->string('status')->default(BoxItemStatus::CREATED->value);
            $table->integer('quantity');
            $table->timestamps();
        });
    }
};
