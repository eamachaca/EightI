<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageBook extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'language_id'];
}
