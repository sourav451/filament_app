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
        Schema::create('trainingweeks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('week_no');
            $table->string('status');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->json('lesson_ids')->nullable();
            // $table->bigInteger('subject_id');
            // $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainingweeks');
    }
};
