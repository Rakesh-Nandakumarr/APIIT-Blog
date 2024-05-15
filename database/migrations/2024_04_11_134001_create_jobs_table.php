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
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('thumbnail', 255)->nullable();
            $table->longText('description');
            $table->string('company', 255);
            $table->longText('qualifications');
            $table->longText('contact');
            $table->string('faculty');
            $table->string('reason')->default("waitng for approval");
            $table->string('link', 255);
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
