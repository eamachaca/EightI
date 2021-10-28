<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookInformation extends Model
{
    use HasFactory;

    protected $fillable = ['book_id', 'copyright_id', 'media_type_id', 'download_count'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function copyright()
    {
        return $this->belongsTo(Copyright::class);
    }

    public function mediaType()
    {
        return $this->belongsTo(MediaType::class);
    }
}
