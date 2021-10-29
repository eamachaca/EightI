<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookshelfBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookshelf_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->references('id')->on('books');
            $table->foreignId('bookshelf_id')->references('id')->on('bookshelves');
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
        Schema::dropIfExists('bookshelve_books');
    }
}
