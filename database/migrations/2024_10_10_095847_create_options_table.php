<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionID')->constrained('questions')->onDelete('cascade');
            $table->text('option');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
}
