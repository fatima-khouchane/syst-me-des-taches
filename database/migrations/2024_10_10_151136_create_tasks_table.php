<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->date('start_date');
            $table->date('due_date');
            $table->string('status')->default('new');
            $table->foreignId('user_created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_assigned_to')
                ->nullable()
                ->constrained('users')->cascadeOnDelete();
            ;

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
