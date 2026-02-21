<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
use App\Models\Course;
use App\Models\Credential;
use App\Models\Student;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        // SELECT * FROM STUDENT WHERE ID=?;
        $row = Student::find(1);
        $relatedCredential = $row->getCredential;
        $relatedAdivsor = $row->getAdvisor;
        $relatedCourses =  $row->getCourses;

//        return $relatedCourses;
//
//        $advisor = Advisor::find(2);
//        $relatedStudents = $advisor->getStudents;
//        return $relatedStudents;
//        $credential = Credential::find(1);
//        $relatedStudent = $credential->getStudent;
//        return $relatedStudent;

        $course= Course::find(1);
        $relatedStudents = $course->getStudents;
        return $relatedStudents;
    }
}
