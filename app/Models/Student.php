<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function getCredential()
    {
        return $this->hasOne(Credential::class);
    }

    public function getAdvisor(){
        return $this->belongsTo(Advisor::class,'advisor_id','id');
    }

    public function  getCourses()
    {
        return $this->belongsToMany(Course::class,
        'course_students',
            'student_id',
            'course_id'
        );
    }
}
