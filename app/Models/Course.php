<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function supervisingTeacher()
    {
        return $this->hasOne(Teacher::class, 'supervised_course_id');
    }

    protected $casts = [
        'start_date' => 'datetime',
    ];
}
