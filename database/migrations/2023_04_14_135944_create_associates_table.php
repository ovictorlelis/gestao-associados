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
            $table->string('document')->unique();
            $table->string('rg')->nullable();
            $table->text('photo')->nullable();
            $table->enum('type', ['holder', 'dependent']);
            $table->boolean('pendency')->default(0)->nullable();
            $table->unsignedBigInteger('holder_id')->default(NULL)->nullable();
            $table->foreign('holder_id')->references('id')->on('associates')->onDelete('cascade');
            $table->string('zip')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('fu')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
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
