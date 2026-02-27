<?php

namespace App\Http\Controllers;

use App\Models\Advisor;
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

    public function getItemsOrdered()
    {

        $data = Item::where('price','>',100)->orderBy('price','asc')->get();

        $data = Item::where('price','>',100)->orderBy('price','desc')->get();


        return $data;

    }

    public function statistics(){
        $maxPrice = Item::max('price');
        $minPrice = Item::min("price");
        $avgPrice = Item::avg('price');
        $countId = Item::count('id');
        $sumPrice = Item::sum('price');
        return response([
            'maxPrice'=>$maxPrice,
            'minPrice'=>$minPrice,
            'avgPrice'=>$avgPrice,
            'countId'=>$countId,
            'sumPrice'=>$sumPrice,
        ]);
    }

    public function AdvisorJoin()
    {

        $data = Advisor::join('students','advisors.id','students.advisor_id')
            ->get();
        return $data;
    }

    public function selectAttr()
    {
        // Select title, description from items;
        $data =Item::where('price','>',1000)
            ->select(['title','description'])->get();
        return $data;
    }


    public function update1()
    {
        $row = Item::find(1);
        $row->title = "Updated Title";
        $row->description = "Updated Description";
        $row->price = 10;
        $row->save();
        return response(['message'=>'Row updated Successfully'],Response::HTTP_OK);
    }

    public function massUpdate()
    {
        Item::where('price','>',1000)
            ->update(['title'=>'High level product']);
        return response(['message'=>'Row updated Successfully'],Response::HTTP_OK);
    }

    public function update2(Request $request, $id)
    {
        $data = Item::findOrFail($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->save();
        return "done";
    }

    public function update3(Request $request, $id){
        $data = Item::findOrFail($id);
        $data->fill($request->all());
        if($data->isClean()){
            return "no data updated";
        }
        $data->save();
        return "done";
    }

    public function createOrUpdate()
    {
        Item::updateOrCreate(
            [
                'id'=>1
            ],
            [
                'title'=>'title',
                'description'=>'description',
                'price'=>0,
            ]
        );
        return "done";
    }


    public function delete($id)
    {
        $row = Item::findOrFail($id);
        $row->delete();
        return "done";

    }

    public function massDelete()
    {
        Item::where('price','>',1000)->delete();
        return "done";
    }

}
