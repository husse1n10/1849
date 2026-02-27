<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{

    // C Create R Read U Update D Delete
    public function create1(){
        $row = new Item();
        $row->title = "Item 1";
        $row->description = "Item 1 description";
        $row->price = 500;
        $row->save();
        return response(["message"=>"Row created Successfully"],Response::HTTP_CREATED);
    }

    public function create2(){
        Item::create(
            [
           'title' => "Item 2",
           'description' => "Item 2 description",
           'price' => 1000,
        ]
        );
        return response(["message"=>"Row created Successfully"],Response::HTTP_CREATED);
    }

    public function create3(){
        DB::table("items")->insert([
           'title' => "Item 3",
           'description' => "Item 3 description",
           'price' => 2000,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return response(["message"=>"Row created Successfully"],Response::HTTP_CREATED);
    }


    public function create4(Request $request){
        $data = new Item();
        $data->title = $request->body_title;
        $data->description = $request->body_description;
        $data->price = $request->body_price;
        $data->save();
        Item::create([
            'title' => $request->body_title,
            'description'=>$request->body_description,
            'price'=>$request->body_price
        ]);
        return response(["message"=>"2 Rows were created Successfully"],Response::HTTP_CREATED);
    }

    public function create5(Request $request){
//        return $request->only(["title"]);
        $row = Item::create($request->all());
        return response(["message"=>"Row created Successfully"],Response::HTTP_CREATED);
    }


    // R Read
    public function getById($id){

            // SELECT * FROM ITEMS WHERE ID=?

//        $row = Item::find($id);
        $row = Item::findOrFail($id);
//        $row = Item::findOr($id,function(){
//            return "item not found";
//        });
        return $row;

    }

    public function getAllItems()
    {
        // SELECT * FROM ITEMS;
        $items= Item::all();
        return $items;
    }

    public function getIemByCondition()
    {
        // SELECT * FROM ITEMS WHERE PRICE = 100
//        $items = Item::where('price',500)

        /// SELECT * FROM ITEMS WHERE PRICE > 100

        $items = Item::where('price','<=',500)

            // will return single object
//            ->first();
            // will return array
            ->get();

        return $items;

    }

    public function getItemByMultipleCondition(){
        $items = Item::where("price","<=",5000)
            ->where('title','like','%title%')
            ->get();
        return $items;
    }

    public function getItemOr()
    {
        $items = Item::where("price","<=",5000)
            ->Orwhere('title','like','%title%')
            ->get();
        return $items;

    }

    public function getWhereIn()
    {
        // select * from items where id in (1,2,3)
        $items = Item::whereIn('id',[1,2,3])->get();
        $items = Item::whereNotIn('id',[1,2,3])->get();
        return $items;

    }

    public function getBetween()
    {
        // select * from items where price between 1 and 1000;
        $items = Item::whereBetween('price',[100,5000])
            ->get();
        return $items;

    }

}
