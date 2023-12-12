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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            $table->boolean('has_readen');
            $table->timestamps();
            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
