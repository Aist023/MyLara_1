<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsUsersTable extends Migration
{
    public function up()
    {
        Schema::create('newsUsers', function (Blueprint $table) {
            $table->id();
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsUsers');
    }
}