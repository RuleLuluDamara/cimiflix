<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('genre_id');
            $table->foreignId('rating_umur_id');
            $table->foreignId('status_id');
            $table->string('name')->nullable(false);
            $table->string('slug');
            $table->date('rilis');
            $table->string('resolusi');
            $table->string('durasi');
            $table->string('director');
            $table->string('studio_production');
            $table->string('image')->nullable();
            $table->text('body');
            $table->text('excerpt');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};