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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->nullable();
            $table->boolean('published');
            $table->string('photo');
            $table->date('start_at');
            $table->date('end_at');

            $table->foreignId('path_id')->nullable()->constrained('paths', 'id')->nullable()->cascadeOnDelete();
            $table->foreignId('before_id')->nullable()->constrained('courses', 'id')->nullable()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
            $table->foreignId('instructor_id')->constrained('instructors', 'id')->cascadeOnDelete();
            $table->foreignId('academy_id')->constrained('academies', 'id')->cascadeOnDelete();


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
        Schema::dropIfExists('courses');
    }
};
