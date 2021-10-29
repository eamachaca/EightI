<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function bookInformations()
    {
        return $this->hasMany(BookInformation::class);
    }
}
