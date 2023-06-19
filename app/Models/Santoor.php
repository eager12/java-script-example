<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santoor extends Model
{
    use HasFactory;
    public function galleries()
    {
        return $this->hasMany(SantoorGallery::class);
    }
}
