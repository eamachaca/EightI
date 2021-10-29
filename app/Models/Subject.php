<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['subject'];

    public function books()
    {
        return $this->belongsToMany(Book::class, SubjectBook::class);
    }
}
