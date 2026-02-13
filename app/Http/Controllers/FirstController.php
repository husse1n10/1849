<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FirstController extends Controller
{
    public function index(){
        return "Hello I am first controller and i am index function";
    }

    public function index2(){
        return 10+5;
    }

    public function index3(){
        $obj = [
            [
          'course-name'=>"Web Development 2",
          'teacher'=>"Ali Ibrahim"
        ],
            [
                'course-name'=>"Database Design",
                'teacher'=>"Ali Ibrahim"
            ]
        ];
        return response($obj);
    }

    // Create a response with status code
    public function index4(){
        $body = [
            'message'=>"Request has been processed"
        ];
        return response($body,201);
    }

    public function index5(){
        $body = [
            'message'=>"Request has been processed"
        ];
        return response($body,Response::HTTP_ACCEPTED);
    }

    public function index6(){
        $body = [
            'message'=>"Request has been processed"
        ];
        return response($body,404, [
           'secret1'=>"123",
           'secret2'=>"345"
        ]);

//        return response()->json($body,404);

    }

    public function index7(Request $request){
        $header1 = $request->header('password');
        error_log("==========================" . $header1);
        $body = [
            'message'=>"Request has been processed",
            'password'=>$header1
        ];
        return response($body);
    }

    public function index8(Request $request){
        $token = $request->header('token');

        if($token==123){
            $body = [
                'message'=>"Request has been processed"
            ];
            return response($body);
        }else{
            $body = [
                'message'=>"Access Denied"
            ];
            return response($body,Response::HTTP_UNAUTHORIZED);
        }
    }


    public function index9(Request $request){
        $fname = $request->firstName;
        $lname = $request->lastName;

        $fname2 = $request->input('firstName',"Joe");
        $lname2 = $request->input('lastName',"Doe");
        $fullName = $fname . " " . $lname;
        $fullName2 = $fname2 . " " . $lname2;
         $body = [
            'message'=>"Request has been processed",
             'fullName1'=>$fullName,
             'fullName2'=>$fullName2,
        ];
        return response($body);
    }

    public function index10(Request $request){
        $token = $request->token;
        if($token==123){
            $fname = $request->firstName;
            $lname = $request->lastName;
            $fullName = $fname . " " . $lname;
            $body = [
                'message'=>"Request has been processed",
                'fullName'=>$fullName
            ];
            return response($body);
        }else{
            $body = [
                'message'=>"Access Denied"
            ];
            return response($body,Response::HTTP_UNAUTHORIZED);
        }
    }

    public function index11($id){
        return "the id is:  " .$id;
    }

    public function index12(Request $request, $id){

            $body = [
                'message'=>"Request has been processed",
                'id'=>$id,
                'url'=>  $request->ip()
            ];
            return response($body);
    }

    public function index13($id, $name){
        $body = [
            'message'=>"Request has been processed",
            'id'=>$id,
            "name"=>$name
        ];
        return response($body);
    }


}
