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
        Schema::create('associates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('card');
            $table->string('document');
            $table->string('rg')->nullable();
            $table->enum('type', ['holder', 'dependent']);
            $table->boolean('pendency')->default(0)->nullable();
            $table->unsignedBigInteger('holder_id')->default(NULL)->nullable();
            $table->foreign('holder_id')->references('id')->on('associates');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associates');
    }
};
