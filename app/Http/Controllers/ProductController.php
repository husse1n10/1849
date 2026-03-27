<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // CRUD C:create, R:Read, U: update D:delete
    public function list(){
        $data = Product::all();
        return view('product.list',compact('data'));
    }

    public function add(){
        $categories = Category::all();
        return view('product.create',compact('categories'));
    }

    public function save(Request $request){
        $request->validate([
           'body_title'=> 'required|unique:products,title',
            'body_description'=>'required|min:20',
//            'body_price'=>'required|same:body_price2',
               'body_price' => 'required|confirmed',
            'body_category'=>'required',
        ],
        [
            'required' => 'The :attribute field is mandatory.',
//            'body_title.required'=>'This field is required',
        ]);
        $title = $request->body_title;
        $description = $request->body_description;
        $price = $request->body_price;
        $category_id = $request->body_category;

        $product = new Product();
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->save();
        return redirect()->route('listProducts');
    }

    public function view($id){
        $product = Product::findOrFail($id);
        return view('product.view',compact('product'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit',compact('product','categories'));
    }

    public function update(Request $request,$id){
        $title = $request->body_title;
        $description = $request->body_description;
        $price = $request->body_price;
        $category_id = $request->body_category;

        $product = Product::findOrFail($id);
        $product->title = $title;
        $product->description = $description;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->save();
        return redirect()->route('listProducts');
    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('listProducts');
    }
}
