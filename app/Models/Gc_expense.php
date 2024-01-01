<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gc_expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'amount'
    ];
}
