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
        Schema::create('update_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stu_id');
            // $table->string('update_type');
            // $table->string('marks10')->nullable();
            // $table->string('marks12')->nullable();
            // $table->string('sem1')->nullable();
            // $table->string('sem2')->nullable();
            // $table->string('sem3')->nullable();
            // $table->string('sem4')->nullable();
            // $table->string('sem5')->nullable();
            // $table->string('sem6')->nullable();
            // $table->string('sem7')->nullable();
            // $table->string('sem8')->nullable();
            // $table->string('sem9')->nullable();
            // $table->string('sem10')->nullable();
            $table->string('grade_id');
            $table->string('updates');
            $table->string('filepath');
            $table->integer('delete')->default(0);
            $table->integer('approve/disapprove')->nullable();
            $table->foreign('stu_id')->references('student_id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('grade_id')->references('grade_id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_approvals');
    }
};
