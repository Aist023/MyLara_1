<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('newsUserID')->constrained('newsUsers')->onDelete('cascade');
            $table->foreignId('newsID')->constrained('news')->onDelete('cascade');
            $table->text('comment');
            $table->timestamp('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}