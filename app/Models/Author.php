<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'brief'
    ];
    protected $table = 'authors';

    public function Book()
    {
        return $this->hasMany(Book::class, 'book_id', 'id');
    }
}
