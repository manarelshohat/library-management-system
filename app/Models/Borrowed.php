<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowed extends Model
{
    use HasFactory;
    protected $fillable = [
        'register_id',
        'book_id',
        'borrow_date',
        'actal_return_date',
        'deadline_date'

    ];
    protected $table = 'borrowed';

    public function Register()
    {
        return $this->belongsTo(Register::class, 'register_id', 'id');
    }

    public function Book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
