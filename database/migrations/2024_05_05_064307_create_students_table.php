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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');           //foreign
            $table->string('email')->unique()->nullable(false);
            $table->string('student_name')->nullable(false);
            $table->string('program_id')->nullable(false)->default('-');
            $table->string('semester')->nullable(false)->default('-');
            $table->string('father_name')->nullable();
            $table->unsignedBigInteger('phone_number')->nullable(false);
            $table->string('campus')->nullable(false);
            $table->integer('type')->nullable()->default(0);
            $table->string('address')->nullable();
            $table->string('T1')->nullable();
            $table->string('T2')->nullable();
            $table->string('T3')->nullable();
            $table->string('T4')->nullable();
            $table->string('T5')->nullable();
            $table->string('T6')->nullable();
            $table->string('T7')->nullable();
            $table->string('T8')->nullable();
            $table->string('T9')->nullable();
            $table->string('T10')->nullable();
            $table->string('T11')->nullable();
            $table->string('T12')->nullable();
            $table->string('cgpa')->nullable();
            $table->timestamps();
            $table->foreign('student_id')->references('user_id')->on('logins')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
