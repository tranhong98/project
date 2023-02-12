<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    protected $fillable = [
        'name', 'content', 'description', 'video', 'course_id',
    ];
}
