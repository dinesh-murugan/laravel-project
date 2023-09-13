<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $products=product::latest();

    //     return view('Pindex',['product'=> $products]);
    // }
     
    public function index()
{
    $products = Product::orderBy('id','desc')->paginate(5);
    return view('Pindex', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,gif|max:10000', // Fixed mime types
        ]);

        $imageName=time().".".$request->image->extension();
        $request->image->move(public_path('product'),$imageName);

        $product=new Product;
        $product->image=$imageName;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->mrp=$request->mrp;
        $product->price=$request->price;
        $product->save();
        return back()->with('Success', 'Product was successfully added');       
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //       $product = Product::where('id',$id)->first();    
    //       return view('Pshow',['product' => $product]);
    // }
    public function show($id)
    {
        $product = Product::findOrFail($id); // Use findOrFail to handle case when product is not found
        return view('Pshow', ['product' => $product]);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pedit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mrp' => 'required|numeric',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,gif|max:10000',
        ]);
    
        $product = Product::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $imageName = time() . "." . $request->image->extension();
            $request->image->move(public_path('product'), $imageName);
            $product->image = $imageName;
        }
    
        // Update other fields here
        $product->name = $request->input('name');
        $product->mrp = $request->input('mrp');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
    
        $product->save();
    
        return back()->with('Success', 'Product was updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')
        ->withMessage ('Product was deleted successfully');
    }
  
}
