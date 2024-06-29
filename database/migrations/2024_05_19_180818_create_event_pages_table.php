<?php
// database/migrations/yyyy_mm_dd_create_event_pages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPagesTable extends Migration
{
    public function up()
    {
        Schema::create('event_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->timestamps();
        });
    }

    

public function down()
    {
        Schema::dropIfExists('event_pages');
    }
}
