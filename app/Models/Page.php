<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'tittle',
        'slug',
        'catagory_id',
        'body',
        'created_by',
        'updated_by'
        ];
}
