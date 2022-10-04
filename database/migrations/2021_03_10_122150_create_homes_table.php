<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('icon_name');
            $table->string('title');
            $table->string('title_color')->nullable();
            $table->string('title_font')->nullable();
            $table->string('tagline')->nullable();
            $table->string('designation')->nullable();
            $table->string('designation_color')->nullable();
            $table->string('designation_font')->nullable();
            $table->string('logo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('site_name')->nullable();
            $table->string('site_url')->nullable();
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}
