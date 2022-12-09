<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    function createdBy(){//singular
        return $this->belongsTo(User::class,"created_by"); //One to many child
    }
    function updatedBy(){
        return $this->belongsTo(User::class, "updated_by");
    }

    protected $fillable = [
        'title',
        'contents',
        'created_by',
    ];
}
