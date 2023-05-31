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
        Schema::create('borrowed', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('book_id')->unsigned();
            $table->integer('register_id')->unsigned();
            $table->timestamp('issue_date');
            $table->timestamp('return_date')->nullable();
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
        Schema::dropIfExists('borrowed');
    }
};
