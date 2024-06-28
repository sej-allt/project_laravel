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
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->string('event_id'); //foreign
            $table->string('marks10');
            $table->string('marks12');
            $table->string('cgpa');
            $table->string('program_id');
            $table->string('campus_id')->nullable(true);
            $table->foreign('campus_id')->references('campus_id')->on('campus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('event_id')->references('event_id')->on('events')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('program_id')->references('program_id')->on('programs')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criterias');
    }
};
