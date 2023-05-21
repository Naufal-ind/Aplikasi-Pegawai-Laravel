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
        Schema::create('nisns', function (Blueprint $table) {
            $table->bigInteger('id_student')->unsigned()->primary('id_student');
            $table->string('nisn')->unique();
            $table->timestamps();

            $table->foreign('id_student')
            ->references('id')->on('students')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nisns');
    }
};
