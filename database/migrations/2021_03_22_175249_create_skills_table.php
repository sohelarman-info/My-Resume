<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title')->nullable();
            $table->text('skill')->nullable();
            $table->string('html')->nullable();
            $table->string('css')->nullable();
            $table->string('bootstrap')->nullable();
            $table->string('javascript')->nullable();
            $table->string('jquery')->nullable();
            $table->string('php')->nullable();
            $table->string('laravel')->nullable();
            $table->string('wordpress')->nullable();
            $table->string('photoshop')->nullable();
            $table->string('editing')->nullable();
            $table->string('others')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
