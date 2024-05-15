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
        Schema::create('email_contents', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('type'); // Type of email content (e.g., welcome, forgot_password)
            $table->string('subject'); // Subject line of the email
            $table->string('salutation'); // Salutation or greeting part of the email
            $table->text('body'); // Main body of the email
            $table->string('conclusion'); // Conclusion or closing part of the email
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_contents');
    }
};
