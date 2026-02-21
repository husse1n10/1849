<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    public function getStudents(){
        return $this->hasMany(Student::class);
    }
}
