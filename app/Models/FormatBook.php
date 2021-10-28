<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatBook extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'format_id'];
}
