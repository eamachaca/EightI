<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copyright extends Model
{
    use HasFactory;

    protected $fillable = ['copy'];

    public function books()
    {
        return $this->belongsToMany(Book::class, CopyrightBook::class);
    }
}
