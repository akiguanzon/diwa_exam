<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
    ];

    public function getBook(){
        return $this->belongsTo(Book::class, 'book_id');
    }
}
