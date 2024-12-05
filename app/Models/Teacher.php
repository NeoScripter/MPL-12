<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function supervisedCourse()
    {
        return $this->belongsTo(Course::class, 'supervised_course_id');
    }

}
