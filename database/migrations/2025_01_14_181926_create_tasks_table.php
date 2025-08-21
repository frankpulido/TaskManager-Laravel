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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')
                ->constrained('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('task_kind', ['FRONTOFFICE', 'BACKOFFICE', 'DATABASE']);
            $table->enum('task_status', ['PIPELINED', 'INIT', 'DELIVERED', 'RELEASED'])
                ->default('PIPELINED');
            $table->string('task_description');
            $table->foreignId('programmer_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->dateTime('date_deadline');
            $table->dateTime('date_init')->nullable();
            $table->dateTime('date_delivered')->nullable();
            $table->dateTime('date_approved')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
    
};
