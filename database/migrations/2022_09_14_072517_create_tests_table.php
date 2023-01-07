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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 999);
            $table->date('expiration_at')->nullable();
            $table->boolean('active');
            $table->string('photo', 999)->nullable();
            $table->foreignId('course_id')->unique()->constrained('courses', 'id')->cascadeOnDelete();
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
        Schema::dropIfExists('tests');
    }
};
