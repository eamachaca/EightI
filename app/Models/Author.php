<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birth_year', 'death_year'];

    public function books()
    {
        return $this->belongsToMany(Book::class, AuthorBook::class);
    }
}
