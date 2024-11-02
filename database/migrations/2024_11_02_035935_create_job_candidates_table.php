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
        Schema::create('job_candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users')->onDelete('cascade');
            $table->string('resume')->nullable();
            $table->text('message')->nullable();
            $table->boolean('is_hired')->default(false);
            $table->foreignId('company_job_id')->constrained('company_jobs')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_candidates');
    }
};