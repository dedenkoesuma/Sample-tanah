<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sampel_tanahs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedInteger('weight');
            $table->json('images');
            $table->foreignIdFor(\App\Models\Client::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Type::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Unit::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Objectivity::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampel_tanahs');
    }
};
