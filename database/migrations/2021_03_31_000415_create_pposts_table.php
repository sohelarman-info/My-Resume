<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pposts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('pcat_id');
            $table->string('title')->nullable();
            $table->text('summary')->nullable();
            $table->text('post')->nullable();
            $table->string('link')->nullable();
            $table->string('client')->nullable();
            $table->string('company')->nullable();
            $table->string('slug');
            $table->string('photo')->nullable();
            $table->string('thumbnail')->nullable();
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
        Schema::dropIfExists('pposts');
    }
}
