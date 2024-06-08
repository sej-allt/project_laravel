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
            $table->string('name');
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->time('starttime');
            $table->time('endtime');
            $table->string('marks10');
            $table->string('marks12');
            $table->string('cgpa');
            $table->string('campus');
            $table->string('company');
            $table->string('role');
            $table->string('responsibity');
            $table->string('eligibility');
            $table->date('registration_date');
            $table->date('last_date_of_registration ')->nullable();
            $table->timestamps();
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
