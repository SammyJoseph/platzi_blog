<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ // campos que se pueden llenar
        'title',
        'slug',
        'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
