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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('director_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            $table->boolean('has_seen');
            $table->timestamps();
            $table->foreign('director_id')
                ->references('id')
                ->on('directors')
                ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
