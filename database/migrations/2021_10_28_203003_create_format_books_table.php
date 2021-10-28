<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_books', function (Blueprint $table) {
            $table->id();
            $table->string('url');//Why do you use string type and not text type? I remember that without length, the default is 255, and I am sure that it is the limit to urls
            $table->foreignId('book_id')->references('id')->on('books');
            $table->foreignId('format_id')->references('id')->on('formats');
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
        Schema::dropIfExists('format_books');
    }
}
