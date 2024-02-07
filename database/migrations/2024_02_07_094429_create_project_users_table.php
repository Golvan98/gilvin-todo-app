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
        Schema::create('project_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();



            $table->foreignIdFor(\App\Models\Project::class, 'project_id')->constrainted('projects')->nullable()
            ->references('id')
            ->on('projects')
            ->onDelete('cascade');

            $table->foreignIdFor(\App\Models\User::class, 'user_id')->constrained('users')->nullable()
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_users');
    }
};
