<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    protected $fillable = [
        "place_name",
        "img_url",
        "pref",
        "start_time",
        "end_time",
        "parking",
        "lat",
        "lng",
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
