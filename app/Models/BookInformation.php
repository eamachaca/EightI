<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInformation extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'copyright_id', 'media_type_id', 'download_count'];
}
