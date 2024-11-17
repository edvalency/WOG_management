<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'role_id',
        'name',
        'mask',
    ];

}
