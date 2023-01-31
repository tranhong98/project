<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'course_type_id', 'price',
    ];

    public function courseType()
    {
        return $this->belongsTo(CourseType::class);
    }

    public function courseDetails()
    {
        return $this->hasMany(CourseDetail::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
