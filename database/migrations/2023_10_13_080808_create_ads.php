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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 64);
            $table->string('category');
            $table->text('description');
            $table->float('price');
            $table->string('place');
            $table->text('image')->nullable;
            $table->string('state');
            $table->string('brand')->nullable;
            $table->integer('year')->nullable;
            $table->string('dimensions')->nullable;
            $table->date('expiration_date')->nullable;
            $table->string('devlivery');
            $table->text('garanties')->nullable;
            $table->boolean('open_to_discussion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
