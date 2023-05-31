<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'code',
        'phone',
        'birtday',
        'gender',
        'address'
    ];
    protected $table = 'registers';

    public function Book()
    {
        return $this->hasMany(Book::class, 'book_id', 'id');
    }
}
