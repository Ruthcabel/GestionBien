<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'surface', 'rooms', 'bedrooms', 'floor','city', 'address', 'postal_code', 'sold'];

    public function options(){
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }
}
