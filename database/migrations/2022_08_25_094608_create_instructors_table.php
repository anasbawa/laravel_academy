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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', '100');
            $table->string('last_name', '100');
            $table->string('about', 999);
            $table->string('email', '255');
            $table->string('specialization', '255');
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('photo');

            $table->foreignId('academy_id')->constrained('academies', 'id')->cascadeOnDelete();
            $table->foreignId('specialization_id')->constrained('specializations')->cascadeOnDelete();
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
        Schema::dropIfExists('instructors');
    }
};
