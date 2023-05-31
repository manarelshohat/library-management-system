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
        //
        Schema::table('books', function (Blueprint $table) {

            $table->foreign("author_id")->references('id')->on('authors')
                ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
        });
        Schema::table('borrowed', function (Blueprint $table) {

            $table->foreign('book_id')->references('id')->on('borrowed')
                ->onDelete('cascade');
            $table->foreign('register_id')->references('id')->on('registers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};