<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('video');
            $table->time('duration')->nullable();
            $table->boolean('status');
            $table->string('code')->nullable();
            $table->date('start_at');

            $table->foreignId('section_id')->constrained('sections', 'id')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses', 'id')->cascadeOnDelete();
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
        Schema::dropIfExists('lessons');
    }
};
