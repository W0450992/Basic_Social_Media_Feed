<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    function user(){//singular
        return $this->belongsTo(User::class); //One to many child
    }

    protected $fillable = [
        'title',
        'contents',
        'created_by',
    ];
}
