<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaticPages extends Model
{
    protected $fillable = ['page_title', 'page_content'];
}
