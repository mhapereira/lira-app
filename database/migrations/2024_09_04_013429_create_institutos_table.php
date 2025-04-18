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
        Schema::create('institutos', function (Blueprint $table) {
            $table->id();
            $table->text('sobre')->nullable();
            $table->json('ata')->nullable();
            $table->json('instituto')->nullable();
            $table->json('docs')->nullable();
            $table->json('financeiro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutos');
    }
};
