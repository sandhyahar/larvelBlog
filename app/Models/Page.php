<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [ 
        'id',
        'name', 
        'slug',
        'body',
        'feature_image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status'
    ];
}
