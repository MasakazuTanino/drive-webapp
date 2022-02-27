<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'add_id',
        'body',
    ];

    public function add()
    {
        return $this->belongTo(Add::class);
    }
}