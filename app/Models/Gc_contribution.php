<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gc_contribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'description',
        'amount'
    ];
}
