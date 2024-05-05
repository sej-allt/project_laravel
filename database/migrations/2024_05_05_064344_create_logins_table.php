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
        Schema::create('logins', function (Blueprint $table) {
            $table->unsignedBigInteger('uid');
            $table->unsignedBigInteger('stu_id');
            $table->string('password');
            $table->integer('type');
            $table->boolean('TTL');
            $table->foreign('uid')->references('id')->on('emails')->onUpdate('cascade');
            $table->foreign('stu_id')->references('student_id')->on('students')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
