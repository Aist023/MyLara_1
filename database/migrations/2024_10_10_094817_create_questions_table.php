<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('header', 255);
            $table->text('question');
            $table->timestamp('datefinish');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
