<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function information()
    {
        return $this->hasOne(BookInformation::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, AuthorBook::class);
    }

    public function bookshelves()
    {
        return $this->belongsToMany(Bookshelf::class, BookshelfBook::class);
    }

    public function copyrights()
    {
        return $this->belongsToMany(Copyright::class, CopyrightBook::class);
    }

    public function formats()
    {
        return $this->belongsToMany(Format::class, FormatBook::class)->withPivot('url');//Example to Pivot :D (The only one that I can found)
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, LanguageBook::class);
    }

    public function mediaTypes()
    {
        return $this->belongsToMany(MediaType::class, MediaTypeBook::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, SubjectBook::class);
    }

    public function translators()
    {
        return $this->belongsToMany(Translator::class, TranslatorBook::class);
    }
}
