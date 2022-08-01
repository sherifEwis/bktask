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
        Schema::create('students', function (Blueprint $table) {
		$table->id();
		$table->string('name');
		$table->unsignedBigInteger('school_id');
		$table->integer('order')->default(0);
		$table->timestamps();
		$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
		$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
