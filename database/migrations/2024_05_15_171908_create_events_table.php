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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_id')->unique();
            $table->string('name');
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->time('starttime');
            $table->time('endtime');
            $table->string('marks10');
            $table->string('marks12');
            $table->string('cgpa');
            $table->string('campus_id')->nullable(true);
            $table->string('company');
            $table->string('role');
            $table->text('responsibility');
            $table->string('program_id');
            $table->date('registration_date');
            $table->date('last_date_of_registration');
            $table->timestamps();
            $table->foreign('campus_id')->references('campus_id')->on('campus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};