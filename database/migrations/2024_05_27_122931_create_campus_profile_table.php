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
        Schema::create('campus_profile', function (Blueprint $table) {
            $table->id();
            $table->string('campus_id');
            $table->string('email_id');
            $table->string('sms_format');
            $table->string('program_id');
            $table->foreign('campus_id')->references('campus_id')->on('campus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_profile');
    }
};
