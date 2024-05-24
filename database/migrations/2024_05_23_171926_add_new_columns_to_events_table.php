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
        Schema::table('events', function (Blueprint $table) {
            $table->string('campus');
            $table->string('company');
            $table->string('role');
            $table->text('responsibility');
            $table->text('eligibility');
            $table->date('registration_date');
            $table->date('last_date_of_registration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('campus');
            $table->dropColumn('company');
            $table->dropColumn('role');
            $table->dropColumn('responsibility');
            $table->dropColumn('eligibility');
            $table->dropColumn('registration_date');
            $table->dropColumn('last_date_of_registration');
        });
    }
};
