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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 2048);
            $table->string('slug', 2048)->unique();
            $table->string('thumbnail', 2048)->nullable();
            $table->longText('description');
            $table->string('company', 2048);
            $table->longText('qualifications');
            $table->longText('contact');
            $table->string('reason')->default("waitng for approval");
            $table->string('link', 2048);
            $table->boolean('active')->default(false);
            $table->datetime('published_at')->nullable();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
