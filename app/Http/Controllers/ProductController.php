<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index(){
        return view('welcome');   
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('/product/show', ['product' => $product]);
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $product = new Product;
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'brand' => 'required',
            'price' => 'required|numeric|min:0.5',
            'qty' => 'required|numeric|min:1',
            'description' => 'required|min:30|max:450',
            'discount' => 'required',
            'installment' => 'required',
            'food_category' => 'required',
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $file = $request->file('image');
            $extension = $file->extension();
            $imageName = md5($file->getClientOriginalName().strtotime('now')).'.'.$extension;
            $file->move(public_path('img/products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->installment = $request->installment;
        $product->food_category = $request->food_category;
        $product->save();

        return redirect('/admin/create')->with('msg', 'Produto adicionado com sucesso!');
    }

    public function products(){
        $products = Product::all();
        return view('admin.dashboard.products', ['products' => $products]);
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/admin/dashboard/products')->with('msg', 'Produto deletado com sucesso!');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.editProduct', ['product' => $product]);
    }

    public function update(Request $request){
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'image' => 'nullable',
            'brand' => 'required',
            'price' => 'required|numeric|min:0.5',
            'qty' => 'required|numeric|min:1',
            'description' => 'required|min:30|max:450',
            'discount' => 'required',
            'installment' => 'required',
            'food_category' => 'required',
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName().strtotime('now')).'.'.$extension;
            $requestImage->move(public_path('img/products'), $imageName);
            $data['image'] = $imageName;
        }

        Product::findOrFail($request->id)->update($data);
        return redirect('/admin/dashboard/products')->with('msg', 'Produto editado com sucesso!');
    }

    public function add_product_to_cart($id){
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $userSaves = $user->products->toArray();
        $hasSaved = false;
        
        if($userSaves){
            foreach($userSaves as $save){
                if(in_array($id, $save)){
                    $hasSaved = true;
                }
            }
        }

        if($hasSaved == false){
            $user->products()->attach($id);
            return redirect('/product/show/'.$id)->with('msg', 'Produto: '.$product->name.' salvo com sucesso!'); 
        }else{
            return redirect('/product/show/'.$id)->with('msg-error', 'Erro: esse produto já existe em seu carrinho!'); 
        }
    }

    public function cart(){
        $user = auth()->user();
        $products = $user->products;
        return view('user.cart', ['products' => $products]);
    }

    public function remove_product_from_cart($id){
        $user = auth()->user();
        $user->products()->detach($id);
        $product = Product::findOrFail($id);

        return redirect('/user/cart')->with('msg', 'Produto: '.$product->name.' removido com sucesso!');
    }
}
