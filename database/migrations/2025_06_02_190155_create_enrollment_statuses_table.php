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
        Schema::create('enrollment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('lrn');
            $table->string('ip');
            $table->string('transferee');
            $table->string('status');
            $table->string('enrollment_type');
            $table->string('school_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_statuses');
    }
};
